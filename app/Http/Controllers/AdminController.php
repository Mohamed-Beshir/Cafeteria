<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function listOrders(Request $request)
    {
        // Start with a base query including relationships
        $query = Order::with(['user', 'items.product']);

        // Check and apply filters
        if ($request->filled('from_datetime')) {
            $query->where('created_at', '>=', $request->input('from_datetime'));
        }

        if ($request->filled('to_datetime')) {
            $query->where('created_at', '<=', $request->input('to_datetime'));
        }

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('order_id')) {
            $query->where('id', $request->input('order_id'));
        }

        // Order the results to show newest orders first
        $query->orderBy('created_at', 'desc');

        // Get the filtered orders
        $orders = $query->paginate(3);

        return view('admin.orders', compact('orders'));
    }


    public function updateStatus(Request $request, Order $order)
    {
        // Validate the new status to prevent unauthorized changes
        $allowedStatuses = ['processing', 'out_for_delivery', 'delivered', 'cancelled'];
        $request->validate([
            'newStatus' => 'required|in:' . implode(',', $allowedStatuses),
        ]);

        $newStatus = $request->input('newStatus');
        $order->update(['status' => $newStatus]);

        return redirect()->route('admin.orders')->with('status', 'Order status updated successfully.');
    }

    public function checks(Request $request)
    {
        // Get all users for the dropdown
        $users = User::where('role', 'user')->get();
    
        // Get the selected user ID and date range from the request
        $selectedUserId = $request->input('user_id');
        $fromDate = $request->input('from_date');
        $toDate = $request->input('to_date');
    
        // Start with a base query including relationships
        $query = User::where('role', 'user')->withSum('orders', 'total_amount');
    
        // Apply user filter if selected
        if ($selectedUserId) {
            $query->where('id', $selectedUserId);
        }
    
        // Check and apply date range filter
        if ($fromDate && $toDate) {
            $query->whereHas('orders', function ($orderQuery) use ($fromDate, $toDate) {
                $orderQuery->whereBetween('created_at', [$fromDate, $toDate]);
            });
        } else {
            // If only one of fromDate or toDate is set, apply individual filters
            if ($fromDate) {
                $query->whereHas('orders', function ($orderQuery) use ($fromDate) {
                    $orderQuery->where('created_at', '>=', $fromDate);
                });
            }

            if ($toDate) {
                $query->whereHas('orders', function ($orderQuery) use ($toDate) {
                    $orderQuery->where('created_at', '<=', $toDate);
                });
            }
        }
    
        // Get the filtered users with their filtered orders
        $usersWithFilteredOrders = $query->with(['orders' => function ($orderQuery) use ($fromDate, $toDate) {
            // Apply date range filter for orders
            if ($fromDate) {
                $orderQuery->where('created_at', '>=', $fromDate);
            }
    
            if ($toDate) {
                $orderQuery->where('created_at', '<=', $toDate);
            }
    
            // Include items and product information for each order
            $orderQuery->with(['items.product']);
        }])->paginate(3);
    
        // Calculate total amount for each user based on filtered orders
        foreach ($usersWithFilteredOrders as $user) {
            $user->orders_sum_total_amount = $user->orders->sum('total_amount');
        }
    
        return view('admin.checks', compact('usersWithFilteredOrders', 'users'));
    }
    
}
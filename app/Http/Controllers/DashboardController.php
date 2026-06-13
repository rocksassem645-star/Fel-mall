<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;  // ← Add this
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user(); 
        
        // Get recent orders
        $recentOrders = Order::where('user_id', $user->id)
            ->latest()
            ->limit(5)
            ->get();
        
        // Get order statistics
        $totalOrders = Order::where('user_id', $user->id)->count();
        
        $totalSpent = Order::where('user_id', $user->id)
            ->where('status', 'completed')
            ->sum('total_price');
        
        return view('my-account.dashboard', compact('recentOrders', 'totalOrders', 'totalSpent'));
    }
}
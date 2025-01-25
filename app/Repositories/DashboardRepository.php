<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class DashboardRepository
{
    // Get total revenue
    public function getTotalRevenue()
    {
        return DB::table('orders')->sum('total_price');
    }

    // Get top products by total sales
    public function getTopProducts()
    {
        return DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(orders.total_price) as total_sales'))
            ->groupBy('products.name')
            ->orderByDesc('total_sales')
            ->take(5)
            ->get();
    }

    // Get revenue changes in the last 1 minute
    public function getRevenueChanges()
    {
        $oneMinuteAgo = now()->subMinute();
        return DB::table('orders')
            ->where('created_at', '>', $oneMinuteAgo)
            ->sum('total_price');
    }

    // Get order count in the last 1 minute
    public function getOrderCount()
    {
        $oneMinuteAgo = now()->subMinute();
        return DB::table('orders')
            ->where('created_at', '>', $oneMinuteAgo)
            ->count();
    }
}


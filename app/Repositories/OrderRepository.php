<?php
namespace App\Repositories;

use Illuminate\Support\Facades\DB;

class OrderRepository {
    public function createOrder(array $data) {
        return DB::table('orders')->insert($data);
    }

    public function getAllOrders() {
        return DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->select('orders.*', 'products.name as product_name', 'products.description')
            ->get();
    }

    public function deleteOrder($id) {
        return DB::table('orders')->where('id', $id)->delete();
    }


    public function getSalesData()
    {
        return DB::table('orders')
            ->select('product_id', DB::raw('SUM(total_price) as total_sales'))
            ->groupBy('product_id')
            ->orderByDesc('total_sales')
            ->get();
    }

}

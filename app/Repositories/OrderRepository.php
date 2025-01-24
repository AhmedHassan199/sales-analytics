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

}

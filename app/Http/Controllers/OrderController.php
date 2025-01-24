<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller {
    protected $orderService;

    public function __construct(OrderService $orderService) {
        $this->orderService = $orderService;
    }

    public function index() {
        $orders = $this->orderService->getOrders();
        return view('admin.orders.index', compact('orders'));
    }

    public function create() {
        $products = DB::table('products')->get();
        return view('admin.orders.create', compact('products'));
    }

    public function store(OrderRequest $request) {
        $product = DB::table('products')->find($request->product_id);
        $data = [
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'total_price' => $product->price * $request->quantity,
        ];

        $this->orderService->createOrder($data);

        return redirect('/orders')->with('success', 'Order created successfully');
    }

    public function destroy($id) {
        $this->orderService->deleteOrder($id);
        return redirect('/orders')->with('success', 'Order deleted successfully');
    }

}

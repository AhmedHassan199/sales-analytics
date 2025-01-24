<?php
namespace App\Services;

use App\Repositories\OrderRepository;

class OrderService {
    protected $orderRepository;

    public function __construct(OrderRepository $orderRepository) {
        $this->orderRepository = $orderRepository;
    }

    public function createOrder(array $data) {
        $data['total_price'] = $data['quantity'] * $data['price'];
        unset($data['price']);
        return $this->orderRepository->createOrder($data);
    }

    public function getOrders() {
        return $this->orderRepository->getAllOrders();
    }

    public function deleteOrder($id) {
        return $this->orderRepository->deleteOrder($id);
    }

}


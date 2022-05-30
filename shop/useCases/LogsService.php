<?php

namespace shop\useCases;

use shop\entities\Logs;
use shop\repositories\Shop\ProductRepository;
use shop\repositories\UserRepository;

class LogsService
{
    private $users;
    private $products;

    public function __construct(Logs, $logs)
    {
        $this->logs = $logs;
    }

    public function add($cat_id, $post_id, $token, $count): void
    {
        $user->addToWishList($product->id);
        $this->users->save($user);
    }

    public function remove($userId, $productId): void
    {
        $user = $this->users->get($userId);
        $product = $this->products->get($productId);
        $user->removeFromWishList($product->id);
        $this->users->save($user);
    }
}
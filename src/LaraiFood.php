<?php

namespace BeeDelivery\LaravelIfood;

use BeeDelivery\LaravelIfood\Functions\Auth;
use BeeDelivery\LaravelIfood\Functions\Merchant;
use BeeDelivery\LaravelIfood\Functions\Order;

class LaravelIfood
{
    public static function auth() {
        return new Auth();
    }

    public static function merchant($accessToken)
    {
        return new Merchant($accessToken);
    }

    public static function order($accessToken)
    {
        return new Order($accessToken);
    }
}

<?php namespace Sunil\Payments\Facades;

use Illuminate\Support\Facades\Facade;

class Ggpay extends Facade {

    protected static function getFacadeAccessor() { return 'indipay'; }

}
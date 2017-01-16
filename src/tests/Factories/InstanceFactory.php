<?php

namespace jamesvweston\Shopify\tests\Factories;


use jamesvweston\Shopify\ShopifyClient;

class InstanceFactory
{

    /**
     * @return ShopifyClient
     */
    public static function getFromEnv ()
    {
        return new ShopifyClient('./');
    }

}
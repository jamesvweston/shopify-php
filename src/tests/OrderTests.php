<?php

namespace jamesvweston\Shopify\tests;


use jamesvweston\Shopify\tests\Factories\InstanceFactory;

class OrderTests extends \PHPUnit_Framework_TestCase
{


    public function testGet ()
    {
        $client                     = InstanceFactory::getFromEnv();
        $results                    = $client->orderApi->get();
        print_r($results);
    }
}
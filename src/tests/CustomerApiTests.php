<?php

namespace jamesvweston\Shopify\tests;


use jamesvweston\Shopify\tests\Factories\InstanceFactory;

class CustomerApiTests extends \PHPUnit_Framework_TestCase
{

    public function testGet ()
    {
        $client                     = InstanceFactory::getFromEnv();
        $results                    = $client->customerApi->get();
    }

    public function testCount ()
    {
        $client                     = InstanceFactory::getFromEnv();
        $results                    = $client->customerApi->count();
    }

}
<?php

namespace jamesvweston\Shopify\tests;


use jamesvweston\Shopify\tests\Factories\InstanceFactory;

class WebHookTests extends \PHPUnit_Framework_TestCase
{

    public function testGet ()
    {
        $client                     = InstanceFactory::getFromEnv();
        $result                     = $client->webHookApi->get();
    }
}
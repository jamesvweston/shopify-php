<?php

namespace jamesvweston\Shopify\Api;


use jamesvweston\Shopify\Models\Requests\GetShopifyCustomers;
use jamesvweston\Shopify\Models\Requests\GetShopifyCustomersCount;
use jamesvweston\Shopify\Models\Responses\ShopifyCustomer;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CustomerApi extends BaseApi
{

    /**
     * @see     https://help.shopify.com/api/reference/customer#index
     * @param   GetShopifyCustomers|array   $request
     * @return  ShopifyCustomer[]
     */
    public function get ($request = [])
    {
        $request                        = ($request instanceof GetShopifyCustomers) ? $request->jsonSerialize() : $request;
        $response                       = parent::makeHttpRequest('get', '/customers.json', $request);
        $items                          = AU::get($response['customers'], []);

        $result                         = [];
        foreach ($items AS $customer)
        {
            $result[]                   = new ShopifyCustomer($customer);
        }

        return $result;
    }

    /**
     * @see     https://help.shopify.com/api/reference/customer#count
     * @param   GetShopifyCustomersCount|array    $request
     * @return  int
     */
    public function count ($request = [])
    {
        $request                        = ($request instanceof GetShopifyCustomersCount) ? $request->jsonSerialize() : $request;
        $response                       = parent::makeHttpRequest('get', '/customers/count.json', $request);
        return $response['count'];
    }

}
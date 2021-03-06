<?php

namespace jamesvweston\Shopify\Api;


use jamesvweston\Shopify\Models\Requests\CancelShopifyOrder;
use jamesvweston\Shopify\Models\Requests\GetShopifyOrderCount;
use jamesvweston\Shopify\Models\Requests\GetShopifyOrders;
use jamesvweston\Shopify\Models\Responses\ShopifyOrder;
use jamesvweston\Utilities\ArrayUtil AS AU;

class OrderApi extends BaseApi
{

    /**
     * @see     https://help.shopify.com/api/reference/order#index
     * @param   GetShopifyOrders|array        $request
     * @return  ShopifyOrder[]|string
     */
    public function get ($request = [])
    {
        $request                        = $request instanceof GetShopifyOrders ? $request : new GetShopifyOrders($request);
        $response                       = parent::makeHttpRequest('get', '/orders.json', $request);
        $items                          = AU::get($response['orders'], []);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        $result                         = [];
        foreach ($items AS $order)
        {
            $result[]                   = new ShopifyOrder($order);
        }

        return $result;
    }

    /**
     * @see     https://help.shopify.com/api/reference/order#show
     * @param   int         $id
     * @return  ShopifyOrder|string
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', '/orders/' . $id . '.json');
        $items                          = AU::get($response['order']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return is_null($items) ? null : new ShopifyOrder($items);
    }

    /**
     * @see     https://help.shopify.com/api/reference/order#count
     * @param   GetShopifyOrderCount|array    $request
     * @return  int
     */
    public function count ($request = [])
    {
        $request                        = $request instanceof GetShopifyOrderCount ? $request : new GetShopifyOrderCount($request);
        $response                       = parent::makeHttpRequest('get', '/orders/count.json', $request);
        return $response['count'];
    }

    /**
     * @see     https://help.shopify.com/api/reference/order#close
     * @param   int         $id
     * @return  ShopifyOrder|string
     */
    public function close ($id)
    {
        $response                       = parent::makeHttpRequest('post', '/orders/' . $id . '/close.json');
        $items                          = AU::get($response['order']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return is_null($items) ? null : new ShopifyOrder($items);
    }

    /**
     * @see     https://help.shopify.com/api/reference/order#open
     * @param   int         $id
     * @return  ShopifyOrder|string
     */
    public function open ($id)
    {
        $response                       = parent::makeHttpRequest('post', '/orders/' . $id . '/open.json');
        $items                          = AU::get($response['order']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return is_null($items) ? null : new ShopifyOrder($items);
    }

    /**
     * @see     https://help.shopify.com/api/reference/order#cancel
     * @param   int         $id
     * @param   CancelShopifyOrder  $request
     * @return  ShopifyOrder|string
     */
    public function cancel ($id, $request)
    {
        $request                        = $request instanceof GetShopifyOrders ? $request : new GetShopifyOrders($request);
        $response                       = parent::makeHttpRequest('post', '/orders/' . $id . '/cancel.json', $request);
        $items                          = AU::get($response['order']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return is_null($items) ? null : new ShopifyOrder($items);
    }


}
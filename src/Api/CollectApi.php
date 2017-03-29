<?php

namespace jamesvweston\Shopify\Api;


use jamesvweston\Shopify\Models\Requests\CreateShopifyCollect;
use jamesvweston\Shopify\Models\Requests\GetShopifyCollects;
use jamesvweston\Shopify\Models\Responses\ShopifyCollect;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CollectApi extends BaseApi
{

    /**
     * @see     https://help.shopify.com/api/reference/collect#index
     * @param   GetShopifyCollects|array        $request
     * @return  ShopifyCollect[]|string
     */
    public function get ($request = [])
    {
        $request                        = $request instanceof GetShopifyCollects ? $request : new GetShopifyCollects($request);
        $response                       = parent::makeHttpRequest('get', '/collects.json', $request);
        $items                          = AU::get($response['collects'], []);

        if ($this->config->isJsonOnly())
            return $items;

        $result                         = [];
        foreach ($items AS $collect)
        {
            $result[]                   = new ShopifyCollect($collect);
        }

        return $result;
    }

    /**
     * @see     https://help.shopify.com/api/reference/collect#count
     * @param   GetShopifyCollects|array    $request
     * @return  int
     */
    public function count ($request = [])
    {
        $request                        = $request instanceof GetShopifyCollects ? $request : new GetShopifyCollects($request);
        $response                       = parent::makeHttpRequest('get', '/collects/count.json', $request);
        return $response['count'];
    }

    /**
     * @see     https://help.shopify.com/api/reference/collect#create
     * @param   CreateShopifyCollect|array       $request
     * @return  ShopifyCollect|string
     */
    public function create ($request = [])
    {
        $request                        = $request instanceof CreateShopifyCollect ? $request : new CreateShopifyCollect($request);
        $response                       = parent::makeHttpRequest('post', '/collects.json', ['collect' => $request->jsonSerialize()]);

        if ($this->config->isJsonOnly())
            return $response;

        return new ShopifyCollect($response['collect']);
    }

    /**
     * @see     https://help.shopify.com/api/reference/collect#destroy
     * @param   int         $id
     * @return  bool
     */
    public function delete ($id)
    {
        $response                       = parent::makeHttpRequest('delete', '/collects/' . $id . '.json');
        return true;
    }

}
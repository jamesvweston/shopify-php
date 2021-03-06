<?php

namespace jamesvweston\Shopify\Api;


use jamesvweston\Shopify\Models\Requests\CreateShopifyWebHook;
use jamesvweston\Shopify\Models\Requests\GetShopifyWebHooks;
use jamesvweston\Shopify\Models\Responses\ShopifyWebHook;
use jamesvweston\Utilities\ArrayUtil AS AU;

class WebHookApi extends BaseApi
{

    /**
     * @see     https://help.shopify.com/api/reference/webhook#index
     * @param   GetShopifyWebHooks|array        $request
     * @return  ShopifyWebHook[]|string
     */
    public function get ($request = [])
    {
        $request                        = $request instanceof GetShopifyWebHooks ? $request : new GetShopifyWebHooks($request);
        $response                       = parent::makeHttpRequest('get', '/webhooks.json', $request);
        $items                          = AU::get($response['webhooks'], []);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        $result                         = [];
        foreach ($items AS $webHook)
        {
            $result[]                   = new ShopifyWebHook($webHook);
        }

        return $result;
    }

    /**
     * @see     https://help.shopify.com/api/reference/webhook#show
     * @param   int         $id
     * @return  ShopifyWebHook|string
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', '/webhooks/' . $id . '.json');
        $items                          = AU::get($response['webhook']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return is_null($items) ? null : new ShopifyWebHook($items);
    }

    /**
     * @see     https://help.shopify.com/api/reference/webhook#create
     * @param   CreateShopifyWebHook|array       $request
     * @return  ShopifyWebHook|string
     */
    public function create ($request = [])
    {
        $request                        = $request instanceof CreateShopifyWebHook ? $request : new CreateShopifyWebHook($request);
        $response                       = parent::makeHttpRequest('post', '/webhooks.json', ['webhook' => $request->jsonSerialize()]);
        $items                          = AU::get($response['webhook']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return new ShopifyWebHook($items);
    }


    public function delete ($id)
    {
        $response                       = parent::makeHttpRequest('delete', '/webhooks/' . $id . '.json');
        return true;
    }


}
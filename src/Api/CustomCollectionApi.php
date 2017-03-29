<?php

namespace jamesvweston\Shopify\Api;


use jamesvweston\Shopify\Models\Requests\CreateShopifyCustomCollection;
use jamesvweston\Shopify\Models\Requests\GetShopifyCustomCollections;
use jamesvweston\Shopify\Models\Responses\ShopifyCustomCollection;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CustomCollectionApi extends BaseApi
{

    /**
     * @see     https://help.shopify.com/api/reference/customcollection#index
     * @param   GetShopifyCustomCollections|array        $request
     * @return  ShopifyCustomCollection[]|string
     */
    public function get ($request = [])
    {
        $request                        = $request instanceof GetShopifyCustomCollections ? $request : new GetShopifyCustomCollections($request);
        $response                       = parent::makeHttpRequest('get', '/custom_collections.json', $request);
        $items                          = AU::get($response['custom_collections'], []);

        if ($this->config->isJsonOnly())
            return $items;

        $result                         = [];
        foreach ($items AS $collect)
        {
            $result[]                   = new ShopifyCustomCollection($collect);
        }

        return $result;
    }

    /**
     * @see     https://help.shopify.com/api/reference/customcollection#create
     * @param   CreateShopifyCustomCollection|array       $request
     * @return  ShopifyCustomCollection|string
     */
    public function create ($request = [])
    {
        $request                        = $request instanceof CreateShopifyCustomCollection ? $request : new CreateShopifyCustomCollection($request);
        $response                       = parent::makeHttpRequest('post', '/custom_collections.json', ['collect' => $request->jsonSerialize()]);

        if ($this->config->isJsonOnly())
            return $response;

        return new ShopifyCustomCollection($response['custom_collection']);
    }

    /**
     * @see     https://help.shopify.com/api/reference/customcollection#update
     * @param   ShopifyCustomCollection|array       $request
     * @return  ShopifyCustomCollection|string
     */
    public function update ($request = [])
    {
        $request                        = $request instanceof ShopifyCustomCollection ? $request : new ShopifyCustomCollection($request);
        $response                       = parent::makeHttpRequest('put', '/custom_collections/' . $request->getId() . '.json', ['custom_collection' => $request->jsonSerialize()]);
        $items                          = AU::get($response['custom_collection']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return new ShopifyCustomCollection($items);
    }

    /**
     * @see     https://help.shopify.com/api/reference/customcollection#destroy
     * @param   int         $id
     * @return  bool
     */
    public function delete ($id)
    {
        $response                       = parent::makeHttpRequest('delete', '/custom_collections/' . $id . '.json');
        return true;
    }

}
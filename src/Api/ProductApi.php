<?php

namespace jamesvweston\Shopify\Api;


use jamesvweston\Shopify\Models\Requests\CreateShopifyProduct;
use jamesvweston\Shopify\Models\Requests\GetShopifyProductCount;
use jamesvweston\Shopify\Models\Requests\GetShopifyProducts;
use jamesvweston\Shopify\Models\Responses\ShopifyMetaField;
use jamesvweston\Shopify\Models\Responses\ShopifyProduct;
use jamesvweston\Shopify\Models\Responses\ShopifyVariant;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ProductApi extends BaseApi
{

    /**
     * @see     https://help.shopify.com/api/reference/product#index
     * @param   GetShopifyProducts|array        $request
     * @return  ShopifyProduct[]|string
     */
    public function get ($request = [])
    {
        $request                        = $request instanceof GetShopifyProducts ? $request : new GetShopifyProducts($request);
        $response                       = parent::makeHttpRequest('get', '/products.json', $request);
        $items                          = AU::get($response['products'], []);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        $result                         = [];
        foreach ($items AS $product)
        {
            $result[]                   = new ShopifyProduct($product);
        }

        return $result;
    }

    /**
     * @see     https://help.shopify.com/api/reference/product#show
     * @param   int         $id
     * @return  ShopifyProduct|string
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', '/products/' . $id . '.json');
        $items                          = AU::get($response['product']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return is_null($items) ? null : new ShopifyProduct($items);
    }

    /**
     * @see     https://help.shopify.com/api/reference/product#count
     * @param   GetShopifyProductCount|array    $request
     * @return  int
     */
    public function count ($request = [])
    {
        $request                        = $request instanceof GetShopifyProductCount ? $request : new GetShopifyProductCount($request);
        $response                       = parent::makeHttpRequest('get', '/products/count.json', $request);
        return $response['count'];
    }

    /**
     * @see     https://help.shopify.com/api/reference/product#create
     * @param   CreateShopifyProduct|array       $request
     * @return  ShopifyProduct|string
     */
    public function create ($request = [])
    {
        $request                        = $request instanceof CreateShopifyProduct ? $request : new CreateShopifyProduct($request);
        $response                       = parent::makeHttpRequest('post', '/products.json', ['product' => $request->jsonSerialize()]);
        $items                          = AU::get($response['product']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return new ShopifyProduct($items);
    }

    /**
     * @see     https://help.shopify.com/api/reference/product#update
     * @param   ShopifyProduct|array       $request
     * @return  ShopifyProduct|string
     */
    public function update ($request = [])
    {
        $request                        = $request instanceof ShopifyProduct ? $request : new ShopifyProduct($request);
        $response                       = parent::makeHttpRequest('put', '/products/' . $request->getId() . '.json', ['product' => $request->jsonSerialize()]);
        $items                          = AU::get($response['product']);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        return new ShopifyProduct($items);
    }

    /**
     * @see     https://help.shopify.com/api/reference/product#destroy
     * @param   int         $id
     * @return  bool
     */
    public function delete ($id)
    {
        $response                       = parent::makeHttpRequest('delete', '/products/' . $id . '.json');
        return true;
    }

    /**
     * @see     https://help.shopify.com/api/reference/product_variant#index
     * @param   int         $id
     * @return  ShopifyVariant[]|string
     */
    public function getVariants ($id)
    {
        $response                       = parent::makeHttpRequest('get', '/products/' . $id . '/variants.json');
        $items                          = AU::get($response['variants'], []);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        $result                         = [];
        foreach ($items AS $variant)
        {
            $result[]                   = new ShopifyVariant($variant);
        }

        return $result;
    }

    /**
     * @param   int         $id
     * @return  ShopifyMetaField[]|string
     */
    public function getMetaFields ($id)
    {
        $response                       = parent::makeHttpRequest('get', '/products/' . $id . '/metafields.json');
        $items                          = AU::get($response['metafields'], []);

        if ($this->config->isJsonOnly())
            return json_encode($items);

        $result                         = [];
        foreach ($items AS $metafield)
        {
            $result[]                   = new ShopifyMetaField($metafield);
        }

        return $result;
    }

}
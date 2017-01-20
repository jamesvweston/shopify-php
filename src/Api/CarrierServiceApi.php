<?php

namespace jamesvweston\Shopify\Api;


use jamesvweston\Shopify\Models\Responses\ShopifyCarrierService;
use jamesvweston\Utilities\ArrayUtil AS AU;

class CarrierServiceApi extends BaseApi
{

    /**
     * @see     https://help.shopify.com/api/reference/carrierservice#index
     * @return  ShopifyCarrierService[]|string
     */
    public function get ()
    {
        $response                       = parent::makeHttpRequest('get', '/carrier_services.json');
        $items                          = AU::get($response['carrier_services'], []);
        if ($this->config->isJsonOnly())
            return json_encode($items);

        $result                         = [];
        foreach ($items AS $collect)
        {
            $result[]                   = new ShopifyCarrierService($collect);
        }

        return $result;
    }

    /**
     * @see     https://help.shopify.com/api/reference/carrierservice#show
     * @param   int         $id
     * @return  ShopifyCarrierService|string
     */
    public function show ($id)
    {
        $response                       = parent::makeHttpRequest('get', '/carrier_services/' . $id . '.json');
        $items                          = AU::get($response['carrier_service']);
        if ($this->config->isJsonOnly())
            return json_encode($items);

        return is_null($items) ? null : new ShopifyCarrierService($items);
    }

}
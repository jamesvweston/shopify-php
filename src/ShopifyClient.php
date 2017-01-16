<?php

namespace jamesvweston\Shopify;


use jamesvweston\Shopify\Api\CarrierServiceApi;
use jamesvweston\Shopify\Api\CollectApi;
use jamesvweston\Shopify\Api\OrderApi;
use jamesvweston\Shopify\Api\ProductApi;
use jamesvweston\Shopify\Api\WebHookApi;

class ShopifyClient
{

    /**
     * @var ShopifyConfiguration
     */
    protected $shopifyConfiguration;

    /**
     * @var CarrierServiceApi
     */
    public $carrierServiceApi;

    /**
     * @var CollectApi
     */
    public $collectApi;

    /**
     * @var OrderApi
     */
    public $orderApi;

    /**
     * @var ProductApi
     */
    public $productApi;

    /**
     * @var WebHookApi
     */
    public $webHookApi;

    /**
     * ShopifyIntegration constructor.
     * @param ShopifyConfiguration $shopifyConfiguration
     */
    public function __construct(ShopifyConfiguration $shopifyConfiguration)
    {
        $this->shopifyConfiguration     = $shopifyConfiguration;

        $this->carrierServiceApi        = new CarrierServiceApi($this->shopifyConfiguration);
        $this->collectApi               = new CollectApi($this->shopifyConfiguration);
        $this->productApi               = new ProductApi($this->shopifyConfiguration);
        $this->orderApi                 = new OrderApi($this->shopifyConfiguration);
        $this->webHookApi               = new WebHookApi($this->shopifyConfiguration);
    }



}
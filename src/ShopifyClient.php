<?php

namespace jamesvweston\Shopify;


use Dotenv\Dotenv;
use jamesvweston\Shopify\Api\CarrierServiceApi;
use jamesvweston\Shopify\Api\CollectApi;
use jamesvweston\Shopify\Api\OrderApi;
use jamesvweston\Shopify\Api\ProductApi;
use jamesvweston\Shopify\Api\WebHookApi;
use jamesvweston\Utilities\ArrayUtil AS AU;

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
     * @param ShopifyConfiguration|string|array   $config
     */
    public function __construct($config)
    {
        if ($config instanceof ShopifyConfiguration)
            $this->config               = $config;
        else if (is_array($config))
        {
            $data                       = [
                'apiKey'                => AU::get($config['apiKey']),
                'password'              => AU::get($config['password']),
                'hostName'              => AU::get($config['hostName']),
            ];
            $this->config               = new ShopifyConfiguration($data);
        }
        else if (is_string($config))
        {
            if (!is_dir($config))
                throw new \InvalidArgumentException('A configuration must be provided');

            $dotEnv                         = new Dotenv($config);
            $dotEnv->load();

            $data = [
                'apiKey'                => getenv('SHOPIFY_API_KEY'),
                'password'              => getenv('SHOPIFY_PASSWORD'),
                'hostName'              => getenv('SHOPIFY_HOST_NAME'),
            ];
            $this->config               = new ShopifyConfiguration($data);
        }
        else
            throw new \InvalidArgumentException('A configuration must be provided');

        $this->carrierServiceApi        = new CarrierServiceApi($this->shopifyConfiguration);
        $this->collectApi               = new CollectApi($this->shopifyConfiguration);
        $this->productApi               = new ProductApi($this->shopifyConfiguration);
        $this->orderApi                 = new OrderApi($this->shopifyConfiguration);
        $this->webHookApi               = new WebHookApi($this->shopifyConfiguration);
    }



}
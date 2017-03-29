<?php

namespace jamesvweston\Shopify;


use Dotenv\Dotenv;
use jamesvweston\Shopify\Api\CarrierServiceApi;
use jamesvweston\Shopify\Api\CollectApi;
use jamesvweston\Shopify\Api\CustomCollectionApi;
use jamesvweston\Shopify\Api\CustomerApi;
use jamesvweston\Shopify\Api\OrderApi;
use jamesvweston\Shopify\Api\ProductApi;
use jamesvweston\Shopify\Api\WebHookApi;
use jamesvweston\Utilities\ArrayUtil AS AU;

class ShopifyClient
{

    /**
     * @var ShopifyConfiguration
     */
    protected $config;

    /**
     * @var CarrierServiceApi
     */
    public $carrierServiceApi;

    /**
     * @var CollectApi
     */
    public $collectApi;

    /**
     * @var CustomerApi
     */
    public $customerApi;

    /**
     * @var CustomCollectionApi
     */
    public $customCollectionApi;

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
                'sharedSecret'          => AU::get($config['sharedSecret']),
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
                'sharedSecret'          => getenv('SHOPIFY_SHARED_SECRET'),
            ];
            $this->config               = new ShopifyConfiguration($data);
        }
        else
            throw new \InvalidArgumentException('A configuration must be provided');

        $this->carrierServiceApi        = new CarrierServiceApi($this->config);
        $this->collectApi               = new CollectApi($this->config);
        $this->customerApi              = new CustomerApi($this->config);
        $this->customCollectionApi      = new CustomCollectionApi($this->config);
        $this->productApi               = new ProductApi($this->config);
        $this->orderApi                 = new OrderApi($this->config);
        $this->webHookApi               = new WebHookApi($this->config);
    }

    /**
     * @return ShopifyConfiguration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * @param ShopifyConfiguration $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

}
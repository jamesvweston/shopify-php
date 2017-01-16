<?php

namespace jamesvweston\Shopify;


use jamesvweston\Utilities\ArrayUtil AS AU;

class ShopifyConfiguration
{

    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $hostName;

    /**
     * @var string
     */
    protected $sharedSecret;


    /**
     * @var string
     */
    protected $url;


    public function __construct($data = [])
    {
        $this->apiKey                   = AU::get($data['apiKey']);
        $this->password                 = AU::get($data['password']);
        $this->hostName                 = AU::get($data['hostName']);
        $this->sharedSecret             = AU::get($data['sharedSecret']);

        $this->setUrl();
    }

    /**
     * Validates if Shopify is sending the WebHook
     * @param   string  $input
     * @param   string  $hMac
     * @return  bool
     */
    public function authenticateWebHook ($input, $hMac)
    {
        $hmac_header                    = $hMac;
        $calculated_hmac                = base64_encode(hash_hmac('sha256', $input, $this->sharedSecret, true));

        return ($hmac_header == $calculated_hmac);
    }

    private function setUrl ()
    {
        if (is_null($this->apiKey) || is_null($this->password) || is_null($this->hostName))
            return;

        $this->url                      = 'https://' . $this->apiKey . ':' . $this->password . '@' . $this->hostName . '.myshopify.com/admin';
    }

    /**
     * @return string
     */
    public function getApiKey()
    {
        return $this->apiKey;
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getHostName()
    {
        return $this->hostName;
    }

    /**
     * @param string $hostName
     */
    public function setHostName($hostName)
    {
        $this->hostName = $hostName;
        $this->setUrl();
    }

    /**
     * @return string
     */
    public function getUrl ()
    {
        return $this->url;
    }

}
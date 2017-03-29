<?php

namespace jamesvweston\Shopify\Models\Responses;


use jamesvweston\Utilities\ArrayUtil AS AU;

class ShopifyCustomCollectionImage implements \JsonSerializable
{

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $src;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {

        $this->created_at               = AU::get($data['created_at']);
        $this->src                      = AU::get($data['src']);
    }

    /**
     * @return  array
     */
    public function jsonSerialize()
    {
        $object['created_at']           = $this->created_at;
        $object['src']                  = $this->src;

        return $object;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @param string $src
     */
    public function setSrc($src)
    {
        $this->src = $src;
    }

}
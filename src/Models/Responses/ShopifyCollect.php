<?php

namespace jamesvweston\Shopify\Models\Responses;


use jamesvweston\Utilities\ArrayUtil AS AU;

class ShopifyCollect implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;


    /**
     * @var int
     */
    protected $collection_id;

    /**
     * @var int
     */
    protected $product_id;

    /**
     * @var bool
     */
    protected $featured;

    /**
     * @var int
     */
    protected $position;

    /**
     * @var string
     */
    protected $sort_value;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;

    /**
     * Collect constructor.
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->collection_id            = AU::get($data['collection_id']);
        $this->featured                 = AU::get($data['featured']);
        $this->position                 = AU::get($data['position']);
        $this->product_id               = AU::get($data['product_id']);
        $this->sort_value               = AU::get($data['sort_value']);
        $this->created_at               = AU::get($data['created_at']);
        $this->updated_at               = AU::get($data['updated_at']);
    }

    /**
     * @return  array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['collection_id']        = $this->collection_id;
        $object['featured']             = $this->featured;
        $object['position']             = $this->position;
        $object['product_id']           = $this->product_id;
        $object['sort_value']           = $this->sort_value;
        $object['created_at']           = $this->created_at;
        $object['updated_at']           = $this->updated_at;

        return $object;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getCollectionId()
    {
        return $this->collection_id;
    }

    /**
     * @param int $collection_id
     */
    public function setCollectionId($collection_id)
    {
        $this->collection_id = $collection_id;
    }

    /**
     * @return int
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * @param int $product_id
     */
    public function setProductId($product_id)
    {
        $this->product_id = $product_id;
    }

    /**
     * @return bool
     */
    public function isFeatured()
    {
        return $this->featured;
    }

    /**
     * @param bool $featured
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;
    }

    /**
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param int $position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getSortValue()
    {
        return $this->sort_value;
    }

    /**
     * @param string $sort_value
     */
    public function setSortValue($sort_value)
    {
        $this->sort_value = $sort_value;
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
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

}
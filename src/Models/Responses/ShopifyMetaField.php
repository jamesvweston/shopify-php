<?php

namespace jamesvweston\Shopify\Models\Responses;


use jamesvweston\Utilities\ArrayUtil AS AU;

class ShopifyMetaField implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $namespace;

    /**
     * Identifier for the metafield (maximum of 30 characters).
     * @var string
     */
    protected $key;

    /**
     * Information to be stored as metadata.
     * @var string
     */
    protected $value;

    /**
     * States whether the information in the value is stored as a 'string' or 'integer.'
     * @var string
     */
    protected $value_type;

    /**
     * Additional information about the metafield.
     * @var string|null
     */
    protected $description;

    /**
     * @var int
     */
    protected $owner_id;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;

    /**
     * @var string
     */
    protected $owner_resource;


    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->namespace                = AU::get($data['namespace']);
        $this->key                      = AU::get($data['key']);
        $this->value                    = AU::get($data['value']);
        $this->value_type               = AU::get($data['value_type']);
        $this->description              = AU::get($data['description']);
        $this->owner_id                 = AU::get($data['owner_id']);
        $this->created_at               = AU::get($data['created_at']);
        $this->updated_at               = AU::get($data['updated_at']);
        $this->owner_resource           = AU::get($data['owner_resource']);
    }

    /**
     * @return  array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['namespace']            = $this->namespace;
        $object['key']                  = $this->key;
        $object['value']                = $this->value;
        $object['value_type']           = $this->value_type;
        $object['description']          = $this->description;
        $object['owner_id']             = $this->owner_id;
        $object['created_at']           = $this->created_at;
        $object['updated_at']           = $this->updated_at;
        $object['owner_resource']       = $this->owner_resource;

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
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @param string $namespace
     */
    public function setNamespace($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValueType()
    {
        return $this->value_type;
    }

    /**
     * @param string $value_type
     */
    public function setValueType($value_type)
    {
        $this->value_type = $value_type;
    }

    /**
     * @return null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param null|string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getOwnerId()
    {
        return $this->owner_id;
    }

    /**
     * @param int $owner_id
     */
    public function setOwnerId($owner_id)
    {
        $this->owner_id = $owner_id;
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

    /**
     * @return string
     */
    public function getOwnerResource()
    {
        return $this->owner_resource;
    }

    /**
     * @param string $owner_resource
     */
    public function setOwnerResource($owner_resource)
    {
        $this->owner_resource = $owner_resource;
    }

}
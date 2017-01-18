<?php

namespace jamesvweston\Shopify\Models\Requests;


use jamesvweston\Utilities\ArrayUtil AS AU;

class GetShopifyCustomersCount
{

    /**
     * @var string|null
     */
    protected $ids;

    /**
     * (default: 50) (maximum: 250)
     * @var int
     */
    protected $limit;

    /**
     * (default: 1)
     * @var int
     */
    protected $page;

    /**
     * Restrict results to after the specified ID
     * @var int|null
     */
    protected $since_id;

    /**
     * @var string|null
     */
    protected $created_at_min;

    /**
     * @var string|null
     */
    protected $created_at_max;

    /**
     * @var string|null
     */
    protected $updated_at_min;

    /**
     * @var string|null
     */
    protected $updated_at_max;


    public function __construct($data = [])
    {
        $this->ids                      = AU::get($data['ids']);
        $this->limit                    = AU::get($data['limit'], 50);
        $this->page                     = AU::get($data['page'], 1);
        $this->since_id                 = AU::get($data['since_id']);
        $this->created_at_min           = AU::get($data['created_at_min']);
        $this->created_at_max           = AU::get($data['created_at_max']);
        $this->updated_at_min           = AU::get($data['updated_at_min']);
        $this->updated_at_max           = AU::get($data['updated_at_max']);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        $object['ids']                  = $this->ids;
        $object['limit']                = $this->limit;
        $object['page']                 = $this->page;
        $object['since_id']             = $this->since_id;
        $object['created_at_min']       = $this->created_at_min;
        $object['created_at_max']       = $this->created_at_max;
        $object['updated_at_min']       = $this->updated_at_min;
        $object['updated_at_max']       = $this->updated_at_max;

        return $object;
    }

    /**
     * @return null|string
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param null|string $ids
     */
    public function setIds($ids)
    {
        $this->ids = $ids;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param int $limit
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $page
     */
    public function setPage($page)
    {
        $this->page = $page;
    }

    /**
     * @return int|null
     */
    public function getSinceId()
    {
        return $this->since_id;
    }

    /**
     * @param int|null $since_id
     */
    public function setSinceId($since_id)
    {
        $this->since_id = $since_id;
    }

    /**
     * @return null|string
     */
    public function getCreatedAtMin()
    {
        return $this->created_at_min;
    }

    /**
     * @param null|string $created_at_min
     */
    public function setCreatedAtMin($created_at_min)
    {
        $this->created_at_min = $created_at_min;
    }

    /**
     * @return null|string
     */
    public function getCreatedAtMax()
    {
        return $this->created_at_max;
    }

    /**
     * @param null|string $created_at_max
     */
    public function setCreatedAtMax($created_at_max)
    {
        $this->created_at_max = $created_at_max;
    }

    /**
     * @return null|string
     */
    public function getUpdatedAtMin()
    {
        return $this->updated_at_min;
    }

    /**
     * @param null|string $updated_at_min
     */
    public function setUpdatedAtMin($updated_at_min)
    {
        $this->updated_at_min = $updated_at_min;
    }

    /**
     * @return null|string
     */
    public function getUpdatedAtMax()
    {
        return $this->updated_at_max;
    }

    /**
     * @param null|string $updated_at_max
     */
    public function setUpdatedAtMax($updated_at_max)
    {
        $this->updated_at_max = $updated_at_max;
    }

}
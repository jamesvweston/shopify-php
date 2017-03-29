<?php

namespace jamesvweston\Shopify\Models\Requests;


use jamesvweston\Utilities\ArrayUtil AS AU;

class CreateShopifyCustomCollection implements \JsonSerializable
{

    /**
     * Required
     * @var string
     */
    protected $title;

    /**
     * Mapped to image => src in jsonSerialize if not null
     * @var string|null
     */
    protected $imageSrc;

    /**
     * Mapped to image => attachment in jsonSerialize if not null
     * @var string|null
     */
    protected $imageAttachment;

    /**
     * Mapped to array of product_id => VALUE in jsonSerialize if not null
     * @var array
     */
    protected $collects;

    /**
     * @var array
     */
    protected $metafields;

    /**
     * @var bool|null
     */
    protected $published;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->title                    = AU::get($data['title']);
        $this->imageSrc                 = AU::get($data['imageSrc']);
        $this->imageAttachment          = AU::get($data['imageAttachment']);
        $this->collects                 = AU::get($data['collects'], []);
        $this->metafields               = AU::get($data['metafields']);
    }

    /**
     * @return  array
     */
    public function jsonSerialize()
    {
        $object['title']                = $this->title;

        if (!is_null($this->imageSrc))
        {
            $object['image']            = [
                'src'                   => $this->imageSrc,
            ];
        }

        if (!is_null($this->imageAttachment))
        {
            $object['image']            = [
                'attachment'            => $this->imageAttachment,
            ];
        }

        if (!empty($this->collects))
        {
            $object['collects']         = [];
            foreach ($this->collects AS $item)
            {
                $object['collects'][]   = [
                    'product_id'        => $item,
                ];
            }
        }

        $object['metafields']           = $this->metafields;
        $object['published']            = $this->published;

        return $object;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getImageSrc()
    {
        return $this->imageSrc;
    }

    /**
     * @param null|string $imageSrc
     */
    public function setImageSrc($imageSrc)
    {
        $this->imageSrc = $imageSrc;
    }

    /**
     * @return null|string
     */
    public function getImageAttachment()
    {
        return $this->imageAttachment;
    }

    /**
     * @param null|string $imageAttachment
     */
    public function setImageAttachment($imageAttachment)
    {
        $this->imageAttachment = $imageAttachment;
    }

    /**
     * @return array
     */
    public function getCollects()
    {
        return $this->collects;
    }

    /**
     * @param array $collects
     */
    public function setCollects($collects)
    {
        $this->collects = $collects;
    }

    /**
     * @return array
     */
    public function getMetafields()
    {
        return $this->metafields;
    }

    /**
     * @param array $metafields
     */
    public function setMetafields($metafields)
    {
        $this->metafields = $metafields;
    }

    /**
     * @return bool|null
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * @param bool|null $published
     */
    public function setPublished($published)
    {
        $this->published = $published;
    }

}
<?php

namespace jamesvweston\Shopify\Models\Responses;


use jamesvweston\Utilities\ArrayUtil AS AU;

class ShopifyCustomCollection implements \JsonSerializable
{

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $handle;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $body_html;

    /**
     * @var string|null
     */
    protected $published_at;

    /**
     * @var string
     */
    protected $sort_order;

    /**
     * @var string|null
     */
    protected $template_suffix;

    /**
     * @var string
     */
    protected $published_scope;

    /**
     * @var ShopifyCustomCollectionImage|null
     */
    protected $image;

    /**
     * @var string
     */
    protected $updated_at;


    /**
     * @param array $data
     */
    public function __construct($data = [])
    {
        $this->id                       = AU::get($data['id']);
        $this->handle                   = AU::get($data['handle']);
        $this->title                    = AU::get($data['title']);
        $this->body_html                = AU::get($data['body_html']);
        $this->published_at             = AU::get($data['published_at']);
        $this->sort_order               = AU::get($data['sort_order']);
        $this->template_suffix          = AU::get($data['template_suffix']);

        $this->image                    = AU::get($data['image']);
        if (is_array($this->image))
            $this->image                = new ShopifyCustomCollectionImage($this->image);

        $this->updated_at               = AU::get($data['updated_at']);
    }

    /**
     * @return  array
     */
    public function jsonSerialize()
    {
        $object['id']                   = $this->id;
        $object['handle']               = $this->handle;
        $object['title']                = $this->title;
        $object['body_html']            = $this->body_html;
        $object['published_at']         = $this->published_at;
        $object['sort_order']           = $this->sort_order;
        $object['template_suffix']      = $this->template_suffix;
        $object['image']                = $this->image->jsonSerialize();
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
     * @return string
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param string $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
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
     * @return string
     */
    public function getBodyHtml()
    {
        return $this->body_html;
    }

    /**
     * @param string $body_html
     */
    public function setBodyHtml($body_html)
    {
        $this->body_html = $body_html;
    }

    /**
     * @return null|string
     */
    public function getPublishedAt()
    {
        return $this->published_at;
    }

    /**
     * @param null|string $published_at
     */
    public function setPublishedAt($published_at)
    {
        $this->published_at = $published_at;
    }

    /**
     * @return string
     */
    public function getSortOrder()
    {
        return $this->sort_order;
    }

    /**
     * @param string $sort_order
     */
    public function setSortOrder($sort_order)
    {
        $this->sort_order = $sort_order;
    }

    /**
     * @return null|string
     */
    public function getTemplateSuffix()
    {
        return $this->template_suffix;
    }

    /**
     * @param null|string $template_suffix
     */
    public function setTemplateSuffix($template_suffix)
    {
        $this->template_suffix = $template_suffix;
    }

    /**
     * @return string
     */
    public function getPublishedScope()
    {
        return $this->published_scope;
    }

    /**
     * @param string $published_scope
     */
    public function setPublishedScope($published_scope)
    {
        $this->published_scope = $published_scope;
    }

    /**
     * @return ShopifyCustomCollectionImage|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param ShopifyCustomCollectionImage|null $image
     */
    public function setImage($image)
    {
        $this->image = $image;
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
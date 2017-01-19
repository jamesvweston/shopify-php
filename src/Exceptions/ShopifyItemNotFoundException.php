<?php

namespace jamesvweston\Shopify\Exceptions;


class ShopifyItemNotFoundException extends ShopifyApiException
{

    public function __construct($message = 'Item Not Found', $code = 404, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
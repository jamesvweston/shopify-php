<?php

namespace jamesvweston\Shopify\Exceptions;


class ShopifyInvalidCredentialsException extends ShopifyApiException
{

    public function __construct($message = 'Invalid shopify credentials', $code = 403, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}

//  ShopifyInvalidCredentialsException
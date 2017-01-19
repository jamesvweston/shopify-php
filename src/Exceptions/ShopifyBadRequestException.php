<?php

namespace jamesvweston\Shopify\Exceptions;


class ShopifyBadRequestException extends ShopifyApiException
{

    public function __construct($message = 'Required parameter missing or invalid', $code = 400, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
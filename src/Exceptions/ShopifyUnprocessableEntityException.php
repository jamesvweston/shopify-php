<?php

namespace jamesvweston\Shopify\Exceptions;


class ShopifyUnprocessableEntityException extends ShopifyApiException
{

    public function __construct($message, $code = 422, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}
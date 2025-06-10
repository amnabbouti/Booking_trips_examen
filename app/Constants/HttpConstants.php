<?php

namespace App\Constants;

class HttpConstants
{
    // success 
    const SUCCESS = 200;
    const CREATED = 201;
    const ACCEPTED = 202;
    
    // error codes
    const BAD_REQUEST = 400;
    const UNAUTHORIZED = 401;
    const FORBIDDEN = 403;
    const NOT_FOUND = 404;
    const UNPROCESSABLE_ENTITY = 422;
    
    // server errors
    const INTERNAL_SERVER_ERROR = 500;
}

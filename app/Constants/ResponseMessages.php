<?php

namespace App\Constants;

class ResponseMessages
{
    // success messages
    const BOOKING_CREATED = 'Booking created successfully';
    const DATA_RETRIEVED = 'Data retrieved successfully';

    // error messages
    const TOKEN_REQUIRED = 'Authentication token is required';
    const TOKEN_INVALID = 'Invalid authentication token';
    const TRIP_NOT_FOUND = 'This trip does not exist';
    const VALIDATION_FAILED = 'Validation failed';
    const INTERNAL_ERROR = 'Something went wrong';
    
    // booking specific
    const MIN_PEOPLE = 'You need at least 1 person for the booking';
}

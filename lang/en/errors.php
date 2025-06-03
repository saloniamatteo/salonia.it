<?php

// English dict file for errors
return [
    // Page title
    'title' => 'Error',
    'desc' => 'An error has occurred. Please try again later.',

    // Admin contact
    'persist' => 'If this error persists, please contact the :admin.',
    'admin' => 'site admin',

    '401' => [
        'title' => 'Error 401: Unauthorized',
        'desc' => "You're not allowed to view this content.",
    ],

    '402' => [
        'title' => 'Error 402: Payment required',
        'desc' => 'Payment is required to view this content.',
    ],

    '403' => [
        'title' => 'Error 403: Forbidden',
        'desc' => "You're not allowed to view this content.",
    ],

    '404' => [
        'title' => 'Error 404: Page not found',
        'desc' => "The page you're looking for may have been moved, "
                  . 'or does not exist.',
    ],

    '419' => [
        'title' => 'Error 419: Page expired',
        'desc' => 'Sorry, your session has expired. Please refresh and try again.',
    ],

    '429' => [
        'title' => 'Error 429: Too many requests',
        'desc' => 'Please try again later.',
    ],

    '500' => [
        'title' => 'Error 500: Server error',
        'desc' => 'Please try again later.',
    ],

    '500' => [
        'title' => 'Error 503: Service unavailable',
        'desc' => 'The service is currently not available. Please try again later.',
    ],
];

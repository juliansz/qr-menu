<?php

return [
    /* This value is used to determine the size of the random generated slugs */
    'random-slug-size' => env('RANDOM_SLUG_SIZE', 4),

    /* This is the path of the logo to use inside the QR */
    'qr-logo-path' => env('QR_LOGO_PATH', 'img/fast-food.png'),

    /* These are the sizes for the generated QR */
    'qr-small-size' => env('QR_SMALL_SIZE', 250),
    'qr-medium-size' => env('QR_MEDIUM_SIZE', 500),
    'qr-large-size' => env('QR_LARGE_SIZE', 700),

    /* This value, if completed, prints the Google Analytics tracking code in all landing pages */
    'google-analytics-ua-code' => env('GOOGLE_ANALYTICS_UA_CODE', ''),

    /* This value, if completed, must be the slug of the landing to be shown on the base url */
    'base-landing-slug' => env('BASE_LANDING_SLUG', ''),

    /* This value, if completed, overwrites the css background color */
    'background-color' => env('BACKGROUND_COLOR', ''),

    /* Enable or disable the whatsapp sharing button */
    'enable-whatsapp-sharing' => env('ENABLE_WHATSAPP_SHARING', true),
];

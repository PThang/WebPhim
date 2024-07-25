<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode' => env('PAYPAL_MODE', 'sandbox'),
    // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID', 'AfaGWA35hFQgGc6L7PybDkhc0d-0Px75-9GgcK7shyM1Qi5JSgEVibLcU-6JUgpU5Uy9H0Hu9-E4LlV2'),
        'client_secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'EMyE7y4rZoWm431iwWrIy4QVnJUbQL51So0TD9e_Eob1Z8ArOGAK0R5-I4JtqCDPe7lWczhUU0-PnL9S'),
        'app_id' => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id' => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret' => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id' => env('PAYPAL_LIVE_APP_ID', ''),
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'),
    // Can only be 'Sale', 'Authorization' or 'Order'
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url' => env('PAYPAL_NOTIFY_URL', ''),
    // Change this accordingly for your application.
    'locale' => env('PAYPAL_LOCALE', 'en_US'),
    // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl' => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
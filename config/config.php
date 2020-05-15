<?php

return [
    'client_id' => env('WAVE_CLIENT_ID'),

    'client_secret' => env('WAVE_CLIENT_SECRET'),

    'graphql_auth_uri' => env('WAVE_GRAPHQL_AUTH_URI', 'https://api.waveapps.com/oauth2/token/'),

    'graphql_uri' => env('WAVE_GRAPHQL_URI', 'https://gql.waveapps.com/graphql/public'),

    'business_id' => env('WAVE_BUSINESS_ID', null),

    'access_token' => null,

    'refresh_token' => null

];

<?php

return [
    'driver' => env('MAP_DRIVER', 'leaflet'),
    'leaflet' => [
        'tile_provider' => 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        'attribution' => '',
        'default_center' => [51.505, -0.09],
        'default_zoom' => 13,
        'max_zoom' => 18,
    ],
    'google' => [
        'api_key' => env('GOOGLE_MAPS_API_KEY'),
        'default_center' => [37.7749, -122.4194],
        'default_zoom' => 13,
        'max_zoom' => 18,
        'map_type' => 'roadmap',
        'fit_to_bounds' => false,
        'center_to_bounds_center' => false,
    ],
    'mapbox' => [
        'access_token' => env('MAPBOX_ACCESS_TOKEN'),
        'style' => 'mapbox/streets-v11',
        'default_center' => [40.7128, -74.0060],
        'default_zoom' => 12,
    ],
];
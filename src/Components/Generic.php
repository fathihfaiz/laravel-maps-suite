<?php

namespace FathihFaiz\MapsSuite\Components;

use Illuminate\View\Component;

class Generic extends Component
{
    public function __construct(
        public array $markers = [],
        public $zoomLevel = null,
        public $centerPoint = null,
        public $maxZoomLevel = null,
        public $popupOptions = [],
        public $popupContent = null,
        public $popupLatLng = null,
        public $tileHost = null,
        public $mapId = null,
        public $enableClustering = false,
        public $polylines = [],
        public $polygons = []
    ) {}

    public function render()
    {
        $driver = config('mapsuite.driver');

        return match ($driver) {
            'google' => view('maps-suite::components.google', get_object_vars($this)),
            'mapbox' => view('maps-suite::components.mapbox', get_object_vars($this)),
            default => view('maps-suite::components.leaflet', get_object_vars($this)),
        };
    }
}

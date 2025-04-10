<?php

namespace FathihFaiz\MapsSuite\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Leaflet extends Component
{
    public function __construct(
        public array $centerPoint = [0, 0],
        public array $markers = [],
        public int $zoomLevel = 13,
        public int $maxZoomLevel = 18,
        public string $tileHost = 'openstreetmap',
        public string $mapId = "M",
        public string $attribution = 'Map data &copy; OpenStreetMap contributors',
        public string $leafletVersion = '1.7.1',
        public array $popupOptions = [],
        public ?string $popupContent = null,
        public ?array $popupLatLng = null,
        public bool $enableClustering = false,
        public array $polylines = [],
        public array $polygons = []
    ) {
        $this->mapId = $mapId ?? 'map_' . Str::random(6);
    }

    public function render()
    {
        return view('maps::components.leaflet', get_object_vars($this));
    }
}

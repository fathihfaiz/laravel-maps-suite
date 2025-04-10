<?php

namespace FathihFaiz\MapsSuite\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Mapbox extends Component
{
    public function __construct(
        public array $centerPoint = [0, 0],
        public array $markers = [],
        public int $zoomLevel = 12,
        public int $maxZoomLevel = 18,
        public string $style = 'mapbox/streets-v11',
        public string $mapId = ""
    ) {
        $this->mapId = $mapId ?? 'map_' . Str::random(6);
    }

    public function render()
    {
        return view('maps-suite::components.mapbox', get_object_vars($this));
    }
}

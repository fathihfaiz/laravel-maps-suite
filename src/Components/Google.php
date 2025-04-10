<?php

namespace FathihFaiz\MapsSuite\Components;

use Illuminate\Support\Str;
use Illuminate\View\Component;

class Google extends Component
{
    public function __construct(
        public array $centerPoint = [0, 0],
        public array $markers = [],
        public int $zoomLevel = 13,
        public int $maxZoomLevel = 18,
        public string $mapType = 'roadmap',
        public bool $fitToBounds = false,
        public bool $centerToBoundsCenter = false,
        public string $mapId = ""
    ) {
        $this->mapId = $mapId ?? 'map_' . Str::random(6);
    }

    public function render()
    {
        return view('maps-suite::components.google', get_object_vars($this));
    }
}

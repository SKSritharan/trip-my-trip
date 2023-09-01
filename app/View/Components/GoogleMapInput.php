<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class GoogleMapInput extends Component
{
    const DEFAULTMAPID = "defaultMapId";

    static $mapHasBeenLoadedBefore = false;

    public int $zoomLevel;

    public int $maxZoomLevel;

    public array $centerPoint;

    public array $markers;

    public $tileHost;

    public $mapId;

    public function __construct(
        $centerPoint = [0, 0],
        $markers = [],
        $zoomLevel = 13,
        $maxZoomLevel = 18,
        $tileHost = 'openstreetmap',
        $id = self::DEFAULTMAPID
    ) {
        $this->centerPoint = $centerPoint;
        $this->zoomLevel = $zoomLevel;
        $this->maxZoomLevel = $maxZoomLevel;
        $this->markers = $markers;
        $this->tileHost = $tileHost;
        $this->mapId = $id === self::DEFAULTMAPID ? Str::random() : $id;
    }

    public function render(): \Illuminate\View\View
    {
        $markerArray = [];

        foreach ($this->markers as $marker) {
            $markerArray[] = [implode(",", $marker)];
        }

        $shouldIncludeMapJS = !self::$mapHasBeenLoadedBefore;
        self::$mapHasBeenLoadedBefore = true;

        return view('components.google-map-input', [
            'centerPoint' => $this->centerPoint,
            'zoomLevel' => $this->zoomLevel,
            'maxZoomLevel' => $this->maxZoomLevel,
            'markers' => $this->markers,
            'markerArray' => $markerArray,
            'tileHost' => $this->tileHost,
            'mapId' => $this->mapId,
            'mapHasBeenLoadedBefore' => $shouldIncludeMapJS,
        ]);
    }
}

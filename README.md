# Laravel Maps Suite 🗺️

A Laravel Blade component library for embedding **Leaflet**, **Google Maps**, and **Mapbox** maps via Blade components, designed for simplicity and power.

---

## 📦 Installation

```bash
composer require fathihfaiz/laravel-maps-suite
```

### Publish Configuration and Views

```bash
php artisan vendor:publish --tag=maps-config
php artisan vendor:publish --tag=maps-views
```

---

## ⚙️ Configuration

Edit your `.env` file:

```
MAP_DRIVER=leaflet  # or google / mapbox
GOOGLE_MAPS_API_KEY=your_google_key
MAPBOX_ACCESS_TOKEN=your_mapbox_token
```

You can edit default map behavior via `config/mapsuite.php`.

---

## 🌍 Supported Drivers

| Driver   | Props/Features              | Notes |
|----------|-----------------------------|-------|
| **Leaflet**  | `clustering`, `popupOptions`, `polylines`, `polygons` | Open-source, offline-friendly |
| **Google**   | `mapType`, `fitToBounds`, `centerToBoundsCenter` | API key required |
| **Mapbox**   | `style`, `accessToken` | Requires Mapbox token |

---

## 🧰 Blade Component Usage

### 🧭 Generic auto-resolving map

```blade
<x-maps.generic :markers="[[ 'lat' => 51.5, 'lng' => -0.09, 'info' => 'London!' ]]" />
```

### 🍃 Leaflet Example

```blade
<x-maps-leaflet
  :markers="[
    ['lat'=>51.5, 'lng'=>-0.09, 'info'=>'A', 'icon'=>'/icon.png', 'open'=>true]
  ]"
  :zoom-level="12"
  :enable-clustering="true"
  :polylines="[[[51.5, -0.09], [51.51, -0.1]]]"
  :popup-options="['maxWidth' => 300]"
  :popup-content="'Standalone popup here'"
  :popup-lat-lng="[51.49, -0.08]"
/>
```

### 🛰 Google Maps Example

```blade
<x-maps-google
  :center-point="[37.7749, -122.4194]"
  :zoom-level="10"
  :map-type="'roadmap'"
  :markers="[ ['lat'=>37.77,'lng'=>-122.42, 'info'=>'San Francisco'] ]"
  :fit-to-bounds="true"
  :center-to-bounds-center="true"
/>
```

### 🗺 Mapbox Example

```blade
<x-maps-mapbox
  :center-point="[40.71, -74.0]"
  :zoom-level="13"
  :style="'mapbox/streets-v11'"
  :markers="[ ['lat'=>40.71, 'lng'=>-74.0, 'info'=>'Hello NYC'] ]"
/>
```

---

## 📍 Marker Schema

Each marker is an array with:

| Prop         | Type    | Description |
|--------------|---------|-------------|
| `lat`, `lng` | float   | Coordinates |
| `info`       | string  | Popup HTML/text |
| `open`       | bool    | Call `.openPopup()` |
| `label`      | string  | Tooltip/marker title |
| `icon`       | string  | URL to icon image |
| `iconSizeX`  | int     | Icon width |
| `iconSizeY`  | int     | Icon height |
| `draggable`  | bool    | Allow marker dragging |

---

## 🧪 Testing

To run a preview:

```bash
php artisan serve
```

Then test Blade calls from a view or Tinker.

Test cases should include:

- Basic render
- Popups
- Polyline and polygon display
- Dynamic clustering

---

## 🤝 Contributing

Pull requests welcome! To contribute:

- Fork this repo
- Create a new branch for your feature
- Follow current structure and naming
- Submit PR with description

---

## 📜 License

MIT © 2024 Fathih Faiz
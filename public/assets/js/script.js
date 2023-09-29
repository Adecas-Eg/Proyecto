let map;
const position = { lat: 10.39972, lng: -75.51444 };
let autoComplete;
let marker;
const auto = document.getElementById('pac-input');

async function initMap() {
    //@ts-ignore
    const { Map } = await google.maps.importLibrary("maps")
    const { AdvancedMarkerView } = await google.maps.importLibrary("marker");


    map = new Map(document.getElementById("map"), {
        zoom: 12,
        center: position,
        mapId: "DEMO_MAP_ID",
    });

    marker = new AdvancedMarkerView({
        map: map,
        position: position,
        title: "Cartagena",
    });
    initAutoComplete()
}

function initAutoComplete() {
    autoComplete = new google.maps.places.Autocomplete(auto)
    autoComplete.addListener('place_changed', function () {
        const place = autoComplete.getPlace();
        console.log(place);
        map.setCenter(place.geometry.location);
        marker.position = (place.geometry.location);
    });

}


initMap();
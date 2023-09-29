
let autoComplete;
const auto = document.getElementById('ubicacion');
let place;
let ubicacion;

async function initMap() {
    // Request needed libraries.
    //@ts-ignore

    initAutoComplete();



}
function initAutoComplete() {
    autoComplete = new google.maps.places.Autocomplete(auto)
    autoComplete.addListener('place_changed', function () {
        // map.setCenter(place.geometry.location);
        // marker.position = (place.geometry.location);

    });

}





function enviar() {
    console.log(place);
    sessionStorage.setItem('miVariable1', place);

}

initMap()



//     // Inject HTML UI.
//     const selectedPlaceTitle = document.createElement("p");

//     selectedPlaceTitle.textContent = "";
//     document.body.appendChild(selectedPlaceTitle);

//     const selectedPlaceInfo = document.createElement("pre");

//     selectedPlaceInfo.textContent = "";
//     document.body.appendChild(selectedPlaceInfo);
//     // Add the gmp-placeselect listener, and display the results.
//     pac.addListener("gmp-placeselect", async ({ place }) => {
//         await place.fetchFields({
//             fields: ["displayName", "formattedAddress", "location"],
//         });
//         selectedPlaceTitle.textContent = "Selected Place:";
//         selectedPlaceInfo.textContent = JSON.stringify(
//             place.toJSON(),
//       /* replacer */ null,
//       /* space */ 2,
//         );
//     });
// }



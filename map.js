let map;

async function initMap() {
  // The location of Uluru
  const position1 = { lat: 3.144, lng: 101.709 };
  const position2 = { lat: 3.144, lng: 101.741 };
  const position3 = { lat: 3.052, lng: 101.672 };

 
  // Request needed libraries.
  //@ts-ignore
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

  // The map, centered at Uluru
  const map = new Map(document.getElementById("map"), {
    zoom: 10,
    center: position1,
    mapId: "DEMO_MAP_ID",
  });

  // The marker, positioned at Uluru
  const marker1 = new AdvancedMarkerElement({
    map: map,
    position: position1,
    title: "Viewnet ",
  });

  const marker2 = new AdvancedMarkerElement({
    map: map,
    position: position2,
    title: "Ideal Tech", // Optional title for the marker
  });

  const marker3 = new AdvancedMarkerElement({
    map: map,
    position: position3,
    title: "IT COMP ", // Optional title for the marker
  });


}

initMap();
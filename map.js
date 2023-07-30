let map;

function showMap() {
  // Get the user input
  const address = document.getElementById("address-input").value;
  const lng = parseFloat(document.getElementById("lng-input").value);
  const lat = parseFloat(document.getElementById("lat-input").value);

  // Create a new Google Maps instance
  map = new google.maps.Map(document.getElementById("map-container"), {
    center: { lat: 0, lng: 0 },
    zoom: 15,
  });

  // Geocode the input address if available
  if (address) {
    const geocoder = new google.maps.Geocoder();
    geocoder.geocode({ address }, (results, status) => {
      if (status === "OK") {
        map.setCenter(results[0].geometry.location);
        new google.maps.Marker({
          map,
          position: results[0].geometry.location,
        });
      } else {
        alert(`Geocode error: ${status}`);
      }
    });
  }

  // Show the input coordinates if available
  if (!isNaN(lng) && !isNaN(lat)) {
    map.setCenter({ lat, lng });
    new google.maps.Marker({
      map,
      position: { lat, lng },
    });
  }
}

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Location Access</title>
</head>
<body>
<script>
window.onload = function() {
  getLocation();
};

function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else {
    alert("Geolocation is not supported by this browser.");
  }
}

function showPosition(position) {
  var latitude = position.coords.latitude;
  var longitude = position.coords.longitude;

  // Check if the user's location meets the criteria for access
  // Example: Check if latitude is within a certain range

  if (latitude >= 40 && latitude <= 45) {
    alert("Access granted. Welcome to the site!");
    // Redirect the user to the site or load site content
    window.location.href = "https://www.yoursite.com";
  } else {
    alert("Access denied. Your location is not allowed to enter this site.");
  }
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      alert("User denied the request for geolocation.");
      break;
    case error.POSITION_UNAVAILABLE:
      alert("Location information is unavailable.");
      break;
    case error.TIMEOUT:
      alert("The request to get user location timed out.");
      break;
    case error.UNKNOWN_ERROR:
      alert("An unknown error occurred.");
      break;
  }
}
</script>

</body>
</html>

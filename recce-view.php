<?php
    $page = 'Search';
    include('includes/header.php');

    require_once 'auth/connect.php';

    $id = $_GET['id'];

    $query = $conn->prepare("SELECT * FROM recces WHERE `ID` = ?");
    $query->bind_param("s", $id);

    $query->execute();

    $query->store_result();

    if($query->num_rows == 1){
        $row = $query->get_result();
    }
?>
      <div class='cover-image' style="<?php echo 'background-image: url(' . $row['Photo1'] . ')'; ?>">
          <div class='back-button'>
              <a href='search.php'><img class='back-arrow' src="images/back-arrow.png" alt="back-button" style="width:40px;height:40px";></a>
          </div>

          <div class="cover-text">
            <h3 class="recce-title"><?php echo $row['Name']; ?></h3>
            <h2 class="recce-price"><?php echo '£' . $row['Price'] ?></h2>
          </div>
      </div>

      <div class="recce-content">
          <h3>About this location</h3>
          <p><?php echo $row['Description']; ?></p>

          <h3>Address</h3>
          <p class="address"><?php echo $row['AddressLine1'] . ', ' . $row['AddressLine2'] . ', ' . $row['Zip/Postcode'] . ', ' . $row['State/County'] . ', ' . $row['Country']?></p>

          <h3>Location Features</h3>
          <p><?php echo $row['Location Features']?></p>

          <h3>Extras</h3>
          <p><?php echo $row['Extras'] ?></p>
      </div>

      <div id="map" width="100%" height="300px"></div>

      </div>

      <div class="recce-poster">
        <div class="poster-image-out">
          <div class="poster-image">
          </div>
        </div>

        <h1>Submitted by: <?php echo $row['Submitter']?></h1>

      </div>

      <script>
      var address = $('.address').html();

      function initialize() {
        var geocoder = new google.maps.Geocoder();
        var latlng = new google.maps.LatLng(-34.397, 150.644);
        var myOptions = {
          zoom: 8,
          center: latlng,
          mapTypeControl: true,
          mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
          navigationControl: true,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map"), myOptions);
        if (geocoder) {
          geocoder.geocode( { 'address': address}, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
              if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
              map.setCenter(results[0].geometry.location);

                var infowindow = new google.maps.InfoWindow(
                    { content: '<b>'+address+'</b>',
                      size: new google.maps.Size(150,50)
                    });

                var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map,
                    title:address
                });
                google.maps.event.addListener(marker, 'click', function() {
                    infowindow.open(map,marker);
                });

              } else {
                alert("No results found");
              }
            } else {
              alert("Geocode was not successful for the following reason: " + status);
            }
          });
        }
      }
          initialize();

      </script>

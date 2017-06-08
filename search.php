<?php
    $page = 'Search';
    include('includes/header.php');
?>
    <div class="search-bar">
        <input type='text' class="input" id='search' placeholder="Keyword(s)">
        <!--Type:
        <select class="form-control" id="type" name="type" class="input-xlarge">
            <option value="" selected="selected">Any</option>
            <option value="House">House</option>
            <option value="Apartment/Flat">Apartment/Flat</option>
            <option value="Open Space">Open Space</option>
            <option value="Farm">Farm</option>
            <option value="Office">Office</option>
            <option value="Cafe/Restaurant">Cafe/Restaurant</option>
            <option value="Leisure Centre/Gym/Pool">Leisure Centre/Gym/Pool</option>
            <option value="Club, Bar or Pub">Club, Bar or Pub</option>
            <option value="Cinema/Theatre">Cinema/Theatre</option>
            <option value="University, School or College">University, School or College</option>
            <option value="Shop">Shop</option>
            <option value="Shopping Centre/Mall">Shopping Centre/Mall</option>
            <option value="Amusement park/Arcade">Amusement park/Arcade</option>
            <option value="Warehouse/Storage Unit">Warehouse/Storage Unit</option>
            <option value="Crematorium/Cemetery/Chapel">Crematorium/Cemetery/Chapel</option>
            <option value="High Street">High Street</option>
            <option value="Pier">Pier</option>
            <option value="Park">Park</option>
            <option value="Woods/Forest">Woods/Forest</option>
            <option value="Lake/River">Lake/River</option>
            <option value="Other">Other</option>
        </select>-->
    </div>

    <div class='search-recces'>

    </div>

    <div class="quickmapview">
        <h3>Clicking on a recce will display a small amount of information here.</h3>
        <div class="quickmapview-subbox">
            <h3>Quick view design idea. Map above and a little bit of information with a 'View full recce' button here.</h3>
        </div>
    </div>

    <div id='loader'>

    </div>

</div>
</main>
<script>
    //AJAX function to print stock items
    function search(count) {
        //$titleOp = $("#filter-title-option").val();
        $title = $("#search").val();

        //AJAX call
        $.post('search-script.php', {
            "title": $title,
            "count": count
        }, function(data, status) {
            if (status == "success") {
                console.log(data);
                $obj = JSON.parse(data) //automatically appends to current json object
                //render the object
                showItems($obj)
            } else {
                $(".search-recces").html("There was an error fetching the data from the server");
            }
        });
    }

    function showItems(items) {
        $(".search-recces").html("");
        for (var i = 0; i < items.length; i++) {
            $content = "<div class='recce'><div class='recce-picture' style='background-image: url("+ '"' + items[i].Photo1 + '"' + ")'><div class='recce-favourite'><img src='icons/heart-empty.svg' style='width: 35px; height: 35px;'></div><div class='recce-price'>&pound;"+items[i].Price+"</div></div><div class='recce-details'><div class='recce-location'>123 somewhere</div><div class='recce-features'>wifi</div></div></div>"
            $(".search-recces").append($content);
        }
    }

    function writeAddressName(latLng) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          "location": latLng
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK)
            document.getElementById("address").innerHTML = results[0].formatted_address;
          else
            document.getElementById("error").innerHTML += "Unable to retrieve your address" + "<br />";
        });
      }

      function geolocationSuccess(position) {
        var userLatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
        // Write the formatted address
        writeAddressName(userLatLng);

        var myOptions = {
          zoom : 16,
          center : userLatLng,
          mapTypeId : google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
        // Place the marker
        new google.maps.Marker({
          map: mapObject,
          position: userLatLng
        });
      }

      function geolocationError(positionError) {
        document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
      }

      function geolocateUser() {
        // If the browser supports the Geolocation API
        if (navigator.geolocation)
        {
          var positionOptions = {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          };
          navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
        }
        else
          document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
      }

      window.onload = geolocateUser;

      $limit = 0;

    $(".input").on("input",function(){
        search(0);
    });

    $(document).ready(function(){
        search(0);
    });

    $(window).scroll(function() {
       if($(window).scrollTop() + $(window).height() == $(document).height()) {
           more();
       }
    });

    $loading = false;
    function more(){
        //flag loading state before doing anything else

        $limit = $limit + 50;

        if(!$loading){
            $loading = true;

            search($limit);

            $loading = false;
        }

    }

</script>
</body>
</html>

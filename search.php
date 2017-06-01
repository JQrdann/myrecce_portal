<?php
    $page = 'Search';
    include('includes/header.php');
?>
    <div class="search-bar">
        <input type='text' class="input" id='search' placeholder="Keyword(s)">
        Type:
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
        </select>
        Price between:
        <input type="number" class="input" name="price-low" id="price-low" min="1">
        and
        <input type="number" class="input" name="price-high" id="price-low" min="1">
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

    $type = '';
    $price_low = 0;
    $price_high = 0;
    $limit = 50;

    $(".input").on("input",function(){
        $limit = 50;
        search();
    });

    $(".price").on("input",function(){
        $price_low = $("#price-low").val();
        $price_high = $("#price-high").val();
        search();
    });

    $("#type").change(function(){
        $type = $("#type").val();
        if($type == 'Any'){
            $type = '';
        }
        $limit = 50;
        search();
    });

    $(document).ready(function(){
        search();
    });

    function search(){

        $search = $("#search").val();

        $string = "search-script.php?f=Name&t=" + $type //+ "&p1=" + $price_low + "&p2=" + $price_high;

        $.post($string,{"s":$search,"limit":$limit}, function($data){
            $(".search-recces").html($data);
        });
    }

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

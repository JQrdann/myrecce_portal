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

    <div id="quickmapview">
        <h3>Map Loading...</h3>
    </div>

    <div class="quickmapview-subbox">
        <div class='recce-quick-view'>
            <h3>Click a recce or a map icon to view it's info here!</h3>
        </div>
    </div>

    <div id='loader'>

    </div>

</div>
</main>
<script>
    $(".input").on("input",function(){
        search(0);
    });

    $(document).ready(function(){
        search(0);
    });

    $(document).ready(function() {



    });
</script>
</body>
</html>

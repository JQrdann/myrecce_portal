<?php
    $page = 'Favourites';
    include('includes/header.php')
?>
      <div class='fav'>
        <h3 class="fav-title">Favourites</h3>

        <div class="fav-content">
          <p>This page will hold a list of recces/locations favourited by the user. It will also have the ability to
          save recces/locations in a 'playlist'. This way, users can have folders or 'playlists' for different films they
          are creating, making it easier to sort recces/locations.</p>
        </div>

        <div class='search-recces'>

        </div>

      </div>

      <script>
        $(document).ready(function(){
          fillFavourites();
        });
      </script>
    </main>
</body>
</html>

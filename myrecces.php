<?php
    $page = 'My Recces';
    include('includes/header.php')
?>
      <div class='myrecs'>
        <h3 class="myrecs-title">My Recces</h3>

        <div class="myrecs-content">
          <p>This page will hold a list of recces/locations created by the user. If the user has only posted one
          recce then it should cover the whole page/display a recce page. If the user has posted more than one recce
          the page should display a list before display the chosen recce.</p>
        </div>

        <div class="createareccegodiv">
          <a href='/myrecce/myrecce_portal/createrecce.php' class="createreccego">Create a Recce</a>
        </div>

        <div class="user-recces">

        </div>
    </main>
    <script>
      $(document).ready(function(){
        $search = 'Username'; //change to current user instead of test account
        $.get('search-script.php?f=Submitter',{"s":$search}, function($data){
          $(".user-recces").html($data);
        });
      });
    </script>
</body>
</html>

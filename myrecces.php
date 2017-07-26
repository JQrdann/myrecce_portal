<?php
    $page = 'My Recces';
    include('includes/header.php')
?>
      <div class='myrecs'>
        <h3 class="myrecs-title">My Recces</h3>

        <div class="myrecs-content">
          <p>Click the button below to make a new recce or, click on one of your recce's to edit!</p>
        </div>

        <div class="myrecs-bar">
            <div class="myrecs-baroptions">
                <p>Options to 'Select All', 'Private recces', 'Password Protected recces', 'Delete All'.</p>
            </div>

            <div class="createareccegodiv">
              <a href='create' class="createreccego">Create a Recce</a>
            </div>
        </div>

        <div class="myrecs-sec2">
            <div class="user-recces">

            </div>
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

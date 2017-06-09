<?php
    session_start();

    if(!(isset($_SESSION['usertype']))){
        header("Location: /myrecce/myrecce_root/index.php");
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $page?> - MyRecce</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no"/>
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/ico" href="favicon.ico"/>
    <script async src="http://platform.twitter.com/widgets.js" charset="utf-8"></script>
    <script src="js/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="js/main.js" type="text/javascript"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAuyH3nCZJFcN57pHUJKXv9V3mc5snrkrw"></script>
</head>
<body>

    <aside>
        <div class="sidebar-logo">
            <a href='home.php'><img class='logo' src="images/myrecce.png" alt="MyRecce-Logo"></a>
        </div>

        <nav>
          <div class='menu-items'>
            <ul>
              <a href='home.php'><li <?php if($page == 'home'){echo 'class="active-menu"';}else{echo 'class="hvr-bounce-to-right"';}?>class="hvr-bounce-to-right"><img class="icon" src="icons/home.svg" width="25px" height="25px"><span class="menu-text">  HOME</span></li></a> <!-- For both account types -->
              <a href='search.php'><li <?php if($page == 'search'){echo 'class="active-menu"';}else{echo 'class="hvr-bounce-to-right"';}?>class="hvr-bounce-to-right"><img class="icon" src="icons/search.svg" width="25px" height="25px"><span class="menu-text">  SEARCH</span></li></a> <!-- Undecided (maybe just for 'Filmmaker' account type) -->
              <a href='myrecces.php'><li <?php if($page == 'myrecces'){echo 'class="active-menu"';}else{echo 'class="hvr-bounce-to-right"';}?>class="hvr-bounce-to-right"><img class="icon" src="icons/my-recces.svg" width="25px" height="25px"><span class="menu-text">  MY RECCES</span></li></a> <!-- For 'Location Provider' account type -->
              <a href='favourites.php'><li <?php if($page == 'favourites'){echo 'class="active-menu"';}else{echo 'class="hvr-bounce-to-right"';}?>class="hvr-bounce-to-right"><img class="icon" src="icons/favourites.svg" width="25px" height="25px"><span class="menu-text">  FAVOURITES</span></li></a> <!-- For 'Filmmaker' account type -->
              <a href='calendar.php'><li <?php if($page == 'calendar'){echo 'class="active-menu"';}else{echo 'class="hvr-bounce-to-right"';}?>class="hvr-bounce-to-right"><img class="icon" src="icons/calendar.svg" width="25px" height="25px"><span class="menu-text">  CALENDAR</span></li></a> <!-- Undecided (maybe just for 'Location Provider' account type) -->
              <a href='myaccount.php'><li <?php if($page == 'myaccount'){echo 'class="active-menu"';}else{echo 'class="hvr-bounce-to-right"';}?>class="hvr-bounce-to-right"><img class="icon" src="icons/myaccount.png" width="25px" height="25px"><span class="menu-text">  MY ACCOUNT</span></li></a> <!-- For both account types -->
              <a href='admin.php'><li <?php if($page == 'admin'){echo 'class="active-menu"';}else{echo 'class="hvr-bounce-to-right"';}?>class="hvr-bounce-to-right"><img class="icon" src="icons/admin.png" width="25px" height="25px"><span class="menu-text">  ADMIN</span></li></a> <!-- For admin account types -->
            </ul>
          </div>
        </nav>

        <div class='logout'>
            <a href='auth/logout.php'><h4 class="logout-content">Log out!</h4></a>
        </div>

        <div class='social-media-icons'>
            <a href="http://www.facebook.com/myrecce"><img class='facebook-logo' src="images/facebook[white].png" alt="Facebook" style="width:40px;height:40px;"></a>
            <a href="https://www.twitter.com/myrecce"><img class='twitter-logo' src="images/twitter[white].png" alt="Twitter" style="width:40px;height:40px;"></a>
            <a href="https://www.instagram.com/myrecce/"><img class='instagram-logo' src="images/instagram[white].png" alt="Instagram" style="width:40px;height:40px;"></a>
            <a href="https://www.youtube.com/channel/UCCUJJ3Je_TT0kukI6ZFtZWA"><img class='youtube-logo' src="images/youtube[white].png" alt="Youtube" style="width:40px;height:40px;"></a><br>
            <a href='../myrecce_root/terms.php'><p>Terms and Conditions</p></a>
        </div>
        <div class="sidebar-background"></div>
        <div class="sidebar-overlay"></div>
    </aside>

    <div id='time-overlay'>
      <h1><?php echo date('H:i') ?></h1>
      <h2><?php echo date('d-m-Y') ?></h2>
    </div>

    <main>

<?php
    $page = 'Home';
    include('includes/header.php')
?>
<div class="home-loader">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
</div>

    <div class="home-content">
      <div class="home-one">
          <div class="welcome-message">
              <h3>Hello, <?php echo $_SESSION['firstName']?>!</h3>
              <h6>[side-branch] Thank you for using MyRecce. Make sure you follow us on social media to keep up to date!</h6>
          </div>
      </div>


      <div class="home-two">
          <h2 class="two-header">How are we doing?</h2>
          <p class="two-subheading">By signing up to MyRecce you are helping us to grow and develop!</p>

          <div class="box-1">
              <img class='box-1-face' src="images/upandrunning.png" alt="Icon-1"><!--'upandrunning.png' or 'somethingswrong.png-->
              <img class='box-1-icon' src="images/tick.png" alt="Icon-2"></a> <!--'tick.png' or 'x.png'-->
                <div class="box-1-sub">
                    <p class="box-1-subtext">Still coding!</p>
                </div>
          </div>

          <div class="box-2">
              <h1 class="box-2-text">0</h1>
                <div class="box-2-sub">
                    <p class="box-2-subtext">creators signed up.</p>
                </div>
          </div>

          <div class="box-3">
              <h1 class="box-2-text">0</h1>
                <div class="box-3-sub">
                    <p class="box-3-subtext">locations available.</p>
                </div>
          </div>
      </div>


      <div class="home-three">
          <h2 class="three-header">Want to help out more, <?php echo $_SESSION['firstName']?>?</h2>
          <p class="three-subheading">You can use the links below to post, tweet, share and shout from the mountains about MyRecce!</p>

          <a href='#'><img class='three-facebook' src="images/facebook.png" alt="Facebook"</a>
          <a href='#'><img class='three-twitter' src="images/twitter.png" alt="Twitter"</a>
          <a href='#'><img class='three-youtube' src="images/youtube.png" alt="Youtube"</a>
          <a href='#'><img class='three-mountains' src="images/mountains.png" alt="Mountains"</a>
          <p class="three-2ndsubheading">By sharing you are helping creators gain access to more locations around the world :)</p>

      </div>
  </div>
</main>
</body>
</html>

<!--
<div class="twitter">
    <a class="twitter-timeline" data-width="620" data-height="500" data-theme="dark" data-link-color="#19CF86" href="https://twitter.com/MyRecce">Tweets by MyRecce</a>
</div>-->

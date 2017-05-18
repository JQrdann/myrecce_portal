<?php
    $page = 'Admin';
    include('includes/header.php')
?>


    <div class="admin-content">
        <div class="welcomebox">
            <div class="welcomeboxtitle">
                <h3>Hi, <?php echo $_SESSION['firstName']?></h3>
                <p>(<?php echo $_SESSION['username']?>)</p>
            </div>
        </div>
        <div class="statsbox">
            <div class="statsboxtext">
                <p>It would be great to have stats of the site here! Is it possible to get code to display information from Google Analytics?</p>
            </div>
        </div>
        <div class="calendarbox">
            <div class="calendarboxtext">
                <p>Maybe have the MyRecce Google Calendar here?</p>
            </div>
        </div>
    </div>
    </main>
</body>
</html>

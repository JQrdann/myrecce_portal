<?php
    $page = 'Create a Recce';
    include('includes/header.php')
?>

  <style>
    main{
      background-color: #f4f4f4 !important;
      height: 100vh !important;
    }
  </style>

  <!-- Progress markers on the side -->
  <div id='create-progress'>
    <div id='progress-middle'>
      <!-- edit number of these depending on final creation process -->
      <div class='progress-marker current-page'></div>
      <div class='progress-marker'></div>
      <div class='progress-marker'></div>
      <div class='progress-marker'></div>
      <div class='progress-marker'></div>
    </div>
  </div>

  <div id='create-modal'>
    <h1>Create a Recce</h1>
    <section class='create-section create-active-section'>

      <div class='input-wrapper'>
        <label for='name'>Let's give this place a name</label>
        <input name='name' class="create-input" type="text" required placeholder="Location Name">
      </div>

      <div class='input-wrapper'>
        <label for="type">What type of location are you listing?</label>
        <select name='type' class="create-input">
          <option value="House" selected="selected">House</option>
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
      </div>

      <div class='input-wrapper'>
        <label for='owner-name'>Who owns this place?</label>
        <input name='owner-name' class="create-input" type='text' required placeholder="Owner Name"></input>
      </div>

      <div class='input-wrapper'>
        <label>What is your association with the owner?</label>
        <label class='create-radio-label'>
          <input name='owner-asso' class="create-radio" type='radio' selected='selected' value="I am the owner">
          <div class='create-check create-check-checked'></div>
          <p>I am the owner</p>
        </label>
        <label class='create-radio-label'>
          <input name='owner-asso' class="create-radio" type='radio' selected value="I am associated with the property">
          <div class='create-check'></div>
          <p>I am associated with the property</p>
        </label>
        <label class='create-radio-label'>
          <input name='owner-asso' class="create-radio" type='radio' selected value="I know the owner">
          <div class='create-check'></div>
          <p>I know the owner</p>
        </label>
      </div>

    </section>

    <section class='create-section'>

    </section>

    <section class='create-section'>

    </section>

    <section class='create-section'>

    </section>

    <section class='create-section'>

    </section>
    <div id='create-back' class='create-button'>&#8592 Back</div>
    <div id='create-next' class='create-button'>Next</div>
  </div>

  <div id='create-summary'>
    <h2>Summary</h2>
    <div id='create-publish'>
      Publish!
    </div>
  </div>

<script src='js/create.js'></script>

</main>
</body>
</html>

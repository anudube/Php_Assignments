  <?php include('form_process.php');?>
	<link rel="stylesheet" type="text/css" href="form.css">
	<div class="container"> 
  <!-- <?php 
    if(!isset($hide)){
  ?>  -->
  <form id="contact" action="" method="post">
    <h3>Contact Form</h3>
    <fieldset>
    <label for="firstname" class="required"><b>First Name</b></label>
      <input placeholder="Your firstname" type="text" tabindex="1" name="firstname"  value="<?= $firstname ?>"autofocus>
      <span class="error"><?= $firstnameErr ?></span>
    </fieldset>

    <fieldset>
    <label for="lastname" class="required"><b>Last Name</b></label>
      <input placeholder="Your lastname" type="text" tabindex="1" name="lastname"  value="<?= $lastname ?>" autofocus>
      <span class="error"><?= $lastnameErr ?></span>
    </fieldset>

    <fieldset>
    <label for="mobile" class="required"><b>Mobile</b></label>
      <input placeholder="Your Mobile Number" type="text" tabindex="3"  name="mobileno" value="<?= $mobileno?>">
      <span class="error"><?= $mobilenoErr ?></span>
    </fieldset>

    <fieldset>
    <label for="birthdate" class="required"><b>Birthdate</b></label>
      <input placeholder="Your Birthdate" type="date" tabindex="3" name="birthdate" value="<?= $birthdate?>">
      <span class="error"><?= $birthdateErr ?></span>
    </fieldset>

    <fieldset>
    <label for="email" class="required"><b>Email</b></label>
      <input placeholder="Your Email Id" type="email" tabindex="2" name="email" value="<?= $email ?>" >
      <span class="error"><?= $emailErr ?></span>
    </fieldset>

    <fieldset>
    <label for="message"><b>Message</b></label>
      <textarea placeholder="Type your message here...." tabindex="5" name="message" value="<?= $message ?>"></textarea>
    </fieldset>

    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>

    <div class="success"><?= $success; ?></div>
    <!-- <?php } ?> -->
  </form>
  
</div>
	
	
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $to = 'angelicalouisegacis@gmail.com';
  $subject = 'New message from website';
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  $headers = "From: $name <$email>" . "\r\n" .
             "Reply-To: $email" . "\r\n" .
             "X-Mailer: PHP/" . phpversion();

  if (mail($to, $subject, $message, $headers)) {
    $message = "Thank you for your message!";
  } else {
    $message = "Sorry, there was an error sending your message. Please try again later.";
  }
}
?>

<h3>Contact</h3>
<img src="assets/img/lines.svg" class="img-lines" alt="lines">
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <div class="row">
    <div class="col-sm-6">
      <input type="text" name="name" class="form-control mt-x-0" placeholder="Name" required>
    </div>
    <div class="col-sm-6">
      <input type="email" name="email" class="form-control" placeholder="Email" required>   
    </div>
    <div class="col-sm-12">
      <textarea name="message" id="mesaage" class="form-control" placeholder="Message" required></textarea>
    </div>
  </div>
  <button class="btn btn-border" type="submit">Send <span class="glyphicon glyphicon-send"></span></button>
  <?php if (isset($message)) { echo "<p class=\"message\">" . $message . "</p>"; } ?>
</form>


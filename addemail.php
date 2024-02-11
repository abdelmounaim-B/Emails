<?php
require_once("EmailsController.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Add Email</title>
</head>

<body>
  <h1>Add a New Email</h1>
  <form method="POST">
    New Email: <input type="email" name="newemail" required>
    <input type="submit" value="Add Email">
  </form>


  <?php

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newemail'])) {
    $message = handleEmailSubmission(trim($_POST['newemail']));
    echo "<p>$message</p>";
  }

  ?>

  <hr>
  <a href="http://127.0.0.1/emails/Emails.php"><button>Emails</button></a>

</body>

</html>
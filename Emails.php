<?php

require_once("Emailscontroller.php");

$emails = readEmailsFromFile('Emails.txt');
$validEmails = [];
$invalidEmails = [];

foreach ($emails as $email) {
  if (isValidEmail($email)) {
    $validEmails[] = $email;
  } else {
    $invalidEmails[] = $email;
  }
}


// Write the invalid emails file
writeArrayToFile(removeDuplicates($invalidEmails), 'adressesNonValides.txt');

// Get the frequency of valid emails
$emailFrequencies = getEmailFrequencies($validEmails);

// Write the valid emails back to the original file 
writeArrayToFile($validEmails, 'Emails.txt');

// Write the invalid emails to a new file
writeArrayToFile($invalidEmails, 'adressesNonValides.txt');

// Remove duplicates from valid emails and sort them
$uniqueSortedEmails = SortEmails(removeDuplicates($validEmails));

// Write the unique and sorted emails to a new file
writeArrayToFile($uniqueSortedEmails, 'EmailsT.txt');

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Emails</title>
</head>

<body>
  <h1>Email Frequency List</h1>

  <?php
  foreach ($emailFrequencies as $email => $frequency) {
    echo "<p>Email: $email, Frequency: $frequency</p>";
    echo "<hr>";
  }
  ?>
  <a href="http://127.0.0.1/emails/addEmail.php"><button>Add Email</button></a>
</body>

</html>
<?php

// Reads emails from a file
function readEmailsFromFile($filename)
{
$emails = [];
$file = fopen($filename, 'r');

if ($file) {
while (($line = fgets($file)) !== false) {
$emails[] = trim($line);
}
fclose($file);
}

return $emails;
}

function isValidEmail($email)
{
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
// Simple regex for email validation
return preg_match($regex, $email);
}

// Write the array to a file
function writeArrayToFile($array, $filename)
{
$file = fopen($filename, 'w');
foreach ($array as $item) {
fwrite($file, $item . PHP_EOL);
}
fclose($file);
}

//count frequencies
function getEmailFrequencies($emails)
{
$frequencies = [];
foreach ($emails as $email) {
if (isset($frequencies[$email])) {
$frequencies[$email]++;
} else {
$frequencies[$email] = 1;
}
}
return $frequencies;
}

function removeDuplicates($emails)
{
$uniqueEmails = array_unique($emails); 
return $uniqueEmails;
}

function SortEmails($emails)
{
sort($emails); // Sort emails
return $emails;
}


function handleEmailSubmission($newEmail)
{
  $emails = readEmailsFromFile('Emails.txt');
  // $invalidEmails = [];
  if (isValidEmail($newEmail) && !in_array($newEmail, $emails)) {
    $emails[] = $newEmail;
    writeArrayToFile($emails, 'Emails.txt');
    return "New email added successfully!";
  } elseif (!isValidEmail($newEmail)) {

    // $invalidEmails[] = $newEmail;
    // writeArrayToFile($invalidEmails, 'adressesNonValides.txt');

    return "Invalid email format.";
  } else {
    return "Email already exists in the list.";
  }
}

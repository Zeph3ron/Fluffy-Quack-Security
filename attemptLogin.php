<?php

require_once './ProfileClass.php';
;
$email = $_POST["EmailAddress"];
$password = $_POST["Password"];

$found = FALSE;
$profileArray = new ArrayObject();

//TODO: Change url to projects API
$response = file_get_contents("http://3rdsemesterwebapp.azurewebsites.net/api/profiles");
$json_a = json_decode($response, true);
foreach ($json_a as $profile => $profile_a) {
    if ($profile_a['EmailAddress'] == $email && $profile_a['Password'] == $password) {
        $found = true;
    }
}
if ($found) {
    header('Location: landingPage.php');
} else {
    echo 'Either this user does not exist, or you provided wrong username or password. Please try again.';
}

<?php

require_once './EmailService.php';
$emailService = new EmailService();
$emailAddress = $_POST["EmailAddress"];
$password = $_POST["Password"];

$found = FALSE;
$profileArray = new ArrayObject();

//TODO: Change address to projects API
$apiProfileAddress = "http://3rdsemesterwebapp.azurewebsites.net/api/profiles";

$response = file_get_contents($apiProfileAddress);
$json_a = json_decode($response, true);
if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL) === false) {
    echo 'The email you provided is not a real email';
} else {
    foreach ($json_a as $profile => $profile_a) {
        if ($profile_a['EmailAddress'] == $emailAddress) {
            $found = true;
        }
    }
    if ($found) {
        echo 'Cannot register: That email address is already in use.';
    } else {
        //This part only runs if the email was not found in the database
        $emailSubject = "Registration was succsessful";
        $emailBody = "You have just registered your motion sensor and will start "
                . "receiving emails everytime it detects movement!";

        $emailToSend = new CreateEmailAndSend();
        $emailToSend->body = $emailBody;
        $emailToSend->emailTo = $emailAddress;
        $emailToSend->subject = $emailSubject;

        $emailService ->CreateEmailAndSend($emailToSend);

        //THIS WHOLE PART WAS TAKEN FROM STACKOVERFLOW,IT HANDLES POSTING THE PROFILE
        // The data to send to the API
        $postData = array(
            'EmailAddress' => $emailAddress,
            'Password' => $password,
        );

        // Setup cURL
        $ch = curl_init($apiProfileAddress);
        curl_setopt_array($ch, array(
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
            CURLOPT_POSTFIELDS => json_encode($postData)
        ));

        // Send the request
        $response = curl_exec($ch);

        // Check for errors
        if ($response === FALSE) {
            die(curl_error($ch));
        }

        // Decode the response
        $responseData = json_decode($response, TRUE);
        echo 'You have successfully registered! An email has been sent your Email address';
    }
}
?>


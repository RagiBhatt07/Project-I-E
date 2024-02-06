<?php

// Update the path below to your autoload.php,
// see https://getcomposer.org/doc/01-basic-usage.md
require_once 'vendor\autoload.php';

use Twilio\Rest\Client;

// Find your Account SID and Auth Token at twilio.com/console
// and set the environment variables. See http://twil.io/secure
$sid = getenv("AC4c96c3e834b99d7b44c0a90a667302c2");
$token = getenv("c6e1cbc5a17a2199da4ab208e28741e1");
$twilio = new Client($sid, $token);

$message = $twilio->messages
                  ->create("+33785595633", // to
                           [
                               "body" => "Course/Classroom change,
                               Student $name, Student number $snumber
                               Change of : $change_type
                               The updated classroom/class is :",
                               "from" => "+16592712207"
                           ]
                  );

print($message->sid);
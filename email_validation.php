<?php



$ch = curl_init();

$api_key = "52017c6806cc4f8db6504771399f3fa5";
$email = "hashamyounis9@gmail.com";

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo"<h1>Format is valid, checking for amail authenticity...</h1><br>";
} else {
    echo "Invalid format";
    exit();
}


curl_setopt($ch, CURLOPT_URL, "https://emailvalidation.abstractapi.com/v1/?api_key=$api_key&email=$email");

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);


$data = curl_exec($ch);

curl_close($ch);

// $assoc = json_decode($data, true);

if (json_decode($data, true)['deliverability'] === 'DELIVERABLE') {
    echo "<h1>Vaild Email Address!!</h1><br>";
} else {
    echo "<h1>Invalid Email Address!!</h1>";
}


// ;

// foreach ($assoc as $key => $value) {
//     echo $key . ": ";
//     if (gettype($value) == "string") {
//         echo "" . $value . "<br>";
//     } else {
//         echo "<br>";
//         foreach ($value as $k => $v) {
//             echo "<pre>              " . $k . ": " . $v . "</pre><br>";
//         }
//     }
// }
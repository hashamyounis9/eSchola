<style>
    echo "body { background-color: blue; }"
</style>

<?php

define("ZERO", 0);

$name = $_GET['name'];
$email = $_GET['email'];
$password = $_GET['password'];
$hidden = $_GET['my_hidden'];
$C = $_GET['C'];



$VB = $_GET['VB'];



echo "<h3 style='color:red; display: inline;'>Name: </h3>$name<br>";
echo "Email: $email <br>";
echo "Password: $password <br>";
echo "Hidden: $hidden <br>";
if (!isset($_GET['C'])) {
    echo 'C is not set<br>';
} else {
    echo "C: $C <br>";
}
echo "VB: $VB<br>";
print ("This is print <br>");
printf("This is printf <br>");
echo "Constants value: " . ZERO;
// echo ;
echo "<br>";


echo "Data type of name is: " . gettype($name) . "<br>";
echo "Data type of email is: " . gettype($email) . "<br>";
echo "Data type of password is: " . gettype($password) . "<br>";
echo "Data type of ZERO is: " . gettype(ZERO) . "<br>";

if (is_integer(ZERO)) {
    echo "ZERO is integer! <br>";
} else {
    echo "ZERO is not an integer <br>";
}


$nul = NULL;

if (is_null($nul)) {
    echo "nul is NULL! <br>";
}


// $a = "Hello ";
// $b = "world!";
// $a .= $b;
// echo "$a <br>"; // Outputs: Hello world!

$num1 = 10;
$num2 = 20.5;

$num1 += $num2;

echo "$num1 <br>";

$num1 .= $num2;

echo "$num1 <br>";

if (!is_integer($num1)) {
    echo "num1 is not integer! <br>";
}

// echo gettype($num1);

$number = 10;

$number++;

echo "$number <br>";

echo $number-- . "<br>";
echo "$number <br>";

$variable = 2;

switch ($variable) {
    case 1:
        echo "1 <br>";
        break;
    case 2:
        echo "2 <br>";
        break;
    case 3:
        echo "3 <br>";
    default:
        echo "None of above <br>";
        break;
}

$number_to_check = 12;
$remainder = 12 % 2;
switch ($remainder) {
    case 0:
        echo "Even <br>";
        break;
    case 1:
        echo "Odd <br>";
        break;
    default:
        echo "Some problem... <br>";
        break;
}

echo '<h1 style="color: green;">My boys are: </h1>';

$boys = array("Hammad", "Hamza", "Hasnain", "Hasham");
foreach ($boys as $boy) {
    echo "Boy is: $boy <br>";
}


$new_array[0] = 1;

echo "$new_array[0] <br>";
$new_array["key"] = "element<br>";

echo $new_array["key"];

echo "Hello world";
echo "<br>";

$num_array = array(1, 2, 5, 3, 4, 0);
echo "Original array has length: " . count($num_array) . "<br>";


foreach ($num_array as $n) {
    echo "$n ";
}
echo "<br>";


sort($num_array);
echo "Sorted array has length: " . count($num_array) . "<br>";
echo "Sorted array: ";
foreach ($num_array as $n) {
    echo "$n ";
}
echo "<br>";

echo "Reverse Sorted array: ";
rsort($num_array);
foreach ($num_array as $n) {
    echo "$n ";
}
echo "<br>";


// making api call


// $url = 'http://127.0.0.1:5000?n1=10&n2=10';

// $response = file_get_contents( $url );

// if ( $response == FALSE ) {
//     return 0;
// }

// echo gettype($response);
// echo '<br>';


// echo $response;
// echo '<br>';

// $converted_respone = json_decode($response);

// echo  gettype($converted_respone);
// echo '<br>';

// echo $converted_respone->result;
// echo '<br>';

// $check = get_object_vars($converted_respone);
// $length = count($check);

// echo $length;



echo '<br>';

echo '<style>
body {  background-color: blue; 
        font-family: sans-serif; 
    }
</style>';


echo "<br>";





echo $_SERVER['REQUEST_METHOD'];
echo "<br>";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";


$connection = new mysqli($servername, $username, $password, $dbname);

if (!$connection) {
    echo "Error connecting to database...<br>";
} else {
    echo "Connected to database...<br>";
}


$query = "SELECT * FROM uesr";

$result = $connection->query($query);

if ($result->num_rows > 0) {
    echo "Data exists in database...<br>";
} else {
    echo "Data does not exist in database yet...<br>";
}

echo "Inserting data into database...<br>";

$name = "Hasham Youans";
$email = "hashamyounis9@gmail.com";
$password = "77547754";


$query = "INSERT INTO uesr (name, email, password) VALUES ('Hasham Younas', 'hashamyounis9@gmail.com', '77547754')";

// $result = $connection->query($query);

$query = "DELETE FROM uesr WHERE id != 1";

// $result = $connection->query($query);


echo "$result->num_rows <br>";


if (mysqli_num_rows($result) > 0) {
    // Fetch and process each row
    while ($row = mysqli_fetch_assoc($result)) {
        // Access the data within each row
        echo "ID: " . $row["id"] . ", Name: " . $row["name"] . ", Email: ". $row["email"] . ", Password: " . $row["password"] ."<br>";
    }
} else {
    echo "No rows returned"; // Handle case when there are no rows
}




// while ($row == mysqli_fetch_assoc( $result )) {
//     echo "id: "; 
//     echo $row["id"];
//     echo "<br>";
//     echo "name: "; 
//     echo $row["name"];
//     echo "<br>";
//     echo "email: "; 
//     echo $row["email"];
//     echo "<br>";
//     echo "password: "; 
//     echo $row["password"];
//     echo "<br>";
// }

?>
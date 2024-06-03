<?php



session_start();

$class_name = $_POST['className'];
$course_code = $_POST['courseCode'];
$class_password = $_POST['classPassword'];
$class_description = $_POST['classDescription'];

// echo "$class_name<br>";
// echo "$course_code<br>";
// echo "$class_password<br>";
// echo "$class_description<br>";
// echo "Session: ";
// echo $_SESSION["id"];
// echo "<br>";

// echo "<script>alert('$class_name $course_code $class_password $class_description')</script>";



require "dbConnect.php";

if (!dbConnect()) {
    header("Location: error.php");
    exit();
} else {
    $query = "SELECT * FROM created_class WHERE id = ? AND course_code = ? AND class_name = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt,"iss", $_SESSION["id"], $course_code, $class_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo "<p>Class Already Exists...</p><br>";
    }  else {
        $query = "INSERT INTO created_class (id, class_name, course_code, class_password, class_description) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt,"issss", $_SESSION['id'] ,$class_name, $course_code, $class_password, $class_description);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        header("Location: dashboard.php");
        exit();
    }
}
<?php



session_start();

$course_code = $_POST['courseCode'];
$class_password = $_POST['classPassword'];

echo "$course_code<br>";
echo "$class_password<br>";

// echo "Session: ";
// echo $_SESSION["id"];
// echo "<br>";

// echo "<script>alert('$class_name $course_code $class_password $class_description')</script>";



require "dbConnect.php";

if (!dbConnect()) {
    header("Location: error.php");
    exit();
} else {
    $query = "SELECT * FROM enrolled_class WHERE id = ? AND course_code = ? AND class_password = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt,"iss", $_SESSION["id"], $course_code, $class_password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        echo "<p>You are already enrolled in this class...</p><br>";
    }  else {


        $query = "SELECT * FROM uesr WHERE id = ?";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt,"i", $_SESSION["id"]);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);
        $current_name = $row["name"];





        $query = "INSERT INTO enrolled_class (id, course_code, class_password, name) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt,"isss", $_SESSION['id'], $course_code, $class_password, $current_name);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        header("Location: dashboard.php");
        exit();
    }
}
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="globe.png" />
  <title>eSchola - Profile</title>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      width: 100% !important;
      height: 800px !important;
      background-color: #087cfc;
      /* color: white; */
      font-family: sans-serif;
    }
  </style>
</head>

<body style="background-color: aliceblue">
  <nav class="navbar navbar-expand-lg navbar-light bg-primary">
    <a class="navbar-brand" href="/eSchola/dashboard.php" style="color: white">
      <h1>eSchola</h1>
    </a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="/eSchola/" style="color: white"><strong>
              <form action="logout.php">
                <label>
                  <h5 style="cursor: pointer">Logout</h5>
                </label>
              </form>
            </strong></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="profile.html" style="color: white">
            <h5>Profile</h5>
          </a>
        </li>
      </ul>
    </div>
  </nav>



  <div>
    <img src="profile.png" alt="profile icon" style="margin-left: 37%;">
    <?php
    require "dbConnect.php";
    if (!dbConnect()) {
      header("Location: error.php");
      exit();
    } else {
      $id = $_SESSION["id"];
      $select_query = "SELECT * FROM uesr WHERE id = $id";
      $result = mysqli_query($connection, $select_query);
      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
          $name = $row["name"];
          $email = $row["email"];
          echo "<h3 align='center'>$name</h3> <br>";
          echo "<h3 align='center'>$email</h3> <br>";
        }
      } else {
        echo "Profile Page is under development yet...<br>";
      }
    }
    ?>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
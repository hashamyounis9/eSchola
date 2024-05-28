<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hosted Classes</title>
  <!-- Bootstrap CSS CDN -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .card-container {
      margin-top: 20px;
    }

    .section-title {
      margin-top: 40px;
    }

    .spinner-wrapper {
      background-color: aliceblue;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>

<body style="background-color: aliceblue">
  <div class="spinner-wrapper" id="spinner">
    <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem" role="status">
      <span class="visually-hidden"></span>
    </div>
  </div>
  <div id="content">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand" href="/eSchola/dashboard.php" style="color: white">
        <h1>eSchola</h1>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/eSchola/" style="color: white"><strong>
                <h5>Logout</h5>
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

    <div class="container-fluid">
      <div class="row">
        <div class="list-group" style="margin-left: 15px; margin-top: 15px">
          <button type="button" class="list-group-item list-group-item-action active" aria-current="true" disabled>
            <h3 class="list-group-item list-group-item-action active text-center">
              Hosted Classes
            </h3>
          </button>
          <a href="dashboard.php">
            <button type="button" class="list-group-item list-group-item-action" data-toggle="modal"
              data-target="#createClassModal">
              Dashboard
            </button>
          </a>
          <button type="button" class="list-group-item list-group-item-action" data-toggle="modal"
            data-target="#enrollClassModal">
            Hosted Classes
          </button>
          <button type="button" class="list-group-item list-group-item-action">
            Create New Class
          </button>
          <button type="button" class="list-group-item list-group-item-action">
            Progress
          </button>
        </div>
        <div class="col-md-10">
          <div class="container">
            <div class="row card-container">
              <div class="col-md-12">
                <h1 class="text-center mt-4">Hosted Classes</h1>

                <div class="section-title">
                  <h3>List of Hosted Classes</h3>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>Class Name</th>
                        <th>No. of Students</th>
                        <th>Class Code</th>
                        <th>Password</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      require "dbConnect.php";
                      if (!dbConnect()) {
                        header("Location: error.php");
                        exit();
                      } else {
                        $id = $_SESSION["id"];
                        $select_query = "SELECT * FROM created_class WHERE id = $id";
                        $result = mysqli_query($connection, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_array($result)) {
                            $class_code = $row["course_code"];
                            $class_name = $row["class_name"];
                            $password = $row["class_password"];
                            echo "<tr>
                              <td>$class_name</td>
                              <td>Unknown</td>
                              <td>$class_code</td>
                              <td>$password</td>
                            </tr>";

                          }
                        } else {
                          echo "<tr id='tempRow'>
                              <td >No classes are created yet.</td>
                              <td ></td>
                            </tr>";
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      setTimeout(function () {
        document.getElementById("spinner").style.display = "none";
        document.getElementById("content").style.display = "block";
      }, Math.floor(Math.random() * 2001));
    });
  </script>
</body>

</html>
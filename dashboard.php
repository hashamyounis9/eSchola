<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="globe.png" />
  <title>eSchola - Dashboard</title>
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
  <div id="content" style="height: 100%; width: 100%; display: none">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <a class="navbar-brand" href="/eSchola/dashboard.php" style="color: white;">
        <h1>eSchola</h1>
      </a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="/eSchola/" style="color: white"><strong>
                <form action="logout.php">
                  <label>
                    <h5 style="cursor: pointer;">Logout</h5>
                  </label>
                </form>
              </strong></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="profile.php" style="color: white">
              <h5>Profile</h5>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="container-fluid">
      <div class="row">
        <div class="list-group" style="margin-left: 15px; margin-top: 15px; ;">
          <button type="button" class="list-group-item list-group-item-action active" aria-current="true" disabled>
            <h3 class="list-group-item list-group-item-action active text-center">Dashboard</h3>
          </button>
          <button type="button" class="list-group-item list-group-item-action" data-toggle="modal"
            data-target="#createClassModal">
            <h5>Create class</h5>
          </button>
          <button type="button" class="list-group-item list-group-item-action" data-toggle="modal"
            data-target="#enrollClassModal">
            <h5>Enroll in class</h5>
          </button>
          <button type="button" class="list-group-item list-group-item-action"
            onclick="window.location.href = 'hosted_classes.php'">
            <h5>Hosted Classes</h5>
          </button>
          <button type="button" class="list-group-item list-group-item-action"
            onclick="window.location.href = 'enrolled_classes.php'">
            <h5>Enrolled Classes</h5>
          </button>
          <button type="button" class="list-group-item list-group-item-action"
            onclick="window.location.href = 'class_details.html'">
            <h5>Class Details</h5>
          </button>
          <button type="button" class="list-group-item list-group-item-action"
            onclick="window.location.href = 'quiz.html'">
            <h5>Create Quiz</h5>
          </button>
          <button type="button" class="list-group-item list-group-item-action"
            onclick="window.location.href = 'activities.html'">
            <h5>Classe Ativity</h5>
          </button>
        </div>
        <div class="col-md-10">
          <div class="container">
            <h1 class="text-center mt-4">Dashboard</h1>
            <div class="section-title">
              <h3>Created Classes</h3>
              <div class="row">
                <div class="col-md-12" id="createdClassesList">
                  <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>Course Code</th>
                        <th>Class Name</th>
                        <th>Description</th>
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
                            $class_description = $row["class_description"];
                            echo "<style>
                                    #tempRow {
                                      display: none;
                                    }
                                  </style>";
                            echo "<tr>
                                      <td>$class_code</td>
                                      <td>$class_name</td>
                                      <td>$class_description</td>
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
            <div class="section-title">
              <h3>Enrolled Classes</h3>
              <div class="row">
                <div class="col-md-12" id="enrolledClassesList">
                  <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                      <tr>
                        <th>Course Code</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // require "dbConnect.php";
                      if (!dbConnect()) {
                        header("Location: error.php");
                        exit();
                      } else {
                        $id = $_SESSION["id"];
                        $select_query = "SELECT * FROM enrolled_class WHERE id = $id";
                        $result = mysqli_query($connection, $select_query);
                        if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_array($result)) {
                            $course_code = $row["course_code"];
                            // $password = $row['password'];
                            echo "<style>
                                    #tempRow {
                                      display: none;
                                    }
                                  </style>";
                            echo "<tr>
                                      <td>$course_code</td>
                                      <td>Pending</td>
                                    </tr>";
                          }
                        } else {
                          echo "<tr id='tempRowEnrolled'>
                            <td >No classes enrolled.</td>
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

  <div class="modal fade" id="createClassModal" tabindex="-1" role="dialog" aria-labelledby="createClassModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="createClassModalLabel">
            Create a New Class
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="createClassForm" action="create_class.php" method="post">
            <div class="form-group">
              <label for="className">Class Name</label>
              <input type="text" class="form-control" id="className" name="className" required />
              <label for="courseCode">Course Code</label>
              <input type="text" class="form-control" id="courseCode" name="courseCode" required />
              <label for="classPassword">Class Password</label>
              <input type="password" class="form-control" id="classPassword" name="classPassword" required />
            </div>
            <div class="form-group">
              <label for="classDescription">Class Description</label>
              <textarea class="form-control" id="classDescription" rows="1" name="classDescription" required></textarea>
            </div>
            <input class="btn btn-primary" type="submit" name="submit" id="press" value="Create Class">
          </form>
          <button id="load" class="btn btn-primary" type="button" disabled>
            <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
            <span role="status">Creating Class</span>
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="enrollClassModal" tabindex="-1" role="dialog" aria-labelledby="enrollClassModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="enrollClassModalLabel">
            Enroll in a Class
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="enrollClassForm" action="enroll_class.php" method="post">
            <div class="form-group">
              <label for="classCd">Course Code</label>
              <input type="text" name="courseCode" class="form-control" id="classCd" required />
              <label for="classPswd">Class Password</label>
              <input type="text" class="form-control" name="classPassword" id="classPswd" required />
            </div>
            <input class="btn btn-primary" type="submit" name="submit" id="press" value="Request to Enroll">

            </button>
            <button id="loadingButton" class="btn btn-primary" type="button" disabled>
              <span class="spinner-grow spinner-grow-sm" aria-hidden="true"></span>
              <span role="status">Sending Request</span>
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById("load").style.display = "none";
    document.getElementById("loadingButton").style.display = "none";

    document.addEventListener("DOMContentLoaded", function () {
      setTimeout(function () {
        document.getElementById("spinner").style.display = "none";
        document.getElementById("content").style.display = "block";
      }, Math.floor(Math.random() * 2001));
    });

    // $("#createClassForm").submit(function (event) {

    //   // Prevent default form submission behavior
    //   event.preventDefault();

    //   // Get form field values
    //   const className = $("#className").val();
    //   const classDescription = $("#classDescription").val();

    //   // Create temporary row element (optional, if needed for UI feedback)
    //   // const tempRowCreatedClass = document.getElementById("tempRow");

    //   // Update buttons (hide "Create Class", show "Loading...")
    //   $("#press").hide();
    //   $("#load").show();

    //   // Simulate loading (replace with actual backend interaction)
    //   setTimeout(function () {
    //     // Update the created classes list (replace with your backend logic)
    //     $("#createdClassesList tbody").append(
    //       '<tr><td>' +
    //       className +
    //       "</td><td>" +
    //       classDescription +
    //       "</td></tr>"
    //     );

    //     // Hide the modal after 2 seconds
    //     $("#createClassModal").modal("hide");

    //     // const tempRowCreatedClass = document.getElementById("tempRow");
    //     // tempRowCreatedClass.remove();

    //     // Clear form fields
    //     $("#className").val("");
    //     $("#classDescription").val("");

    //     // Reset button states (optional)
    //     $("#press").show();
    //     $("#load").hide();
    //     document.getElementById("createClassForm").reset();
    //   }, 1000);

    //   // window.location.href = 'create_class.php';
    // });

    // Function to handle form submission for enrolling in a class
    // $("#enrollClassForm").submit(function (event) {

    //   // Prevent default form submission behavior
    //   event.preventDefault();

    //   // Get the class code from the form
    //   const classCode = $("#classCd").val();

    //   // Update buttons (hide "Enroll Class", show "Loading...")
    //   $("#enrollButton").hide(); // Assuming the button ID is "enrollButton"
    //   $("#loadingButton").show(); // Assuming the button ID is "loadingButton"


    //   // const tempRowCreatedClass = document.getElementById("tempRowEnrolled");
    //   // tempRowCreatedClass.remove();

    //   // Simulate enrollment (replace with actual backend interaction)
    //   setTimeout(function () {
    //     // Update the enrolled classes list
    //     $("#enrolledClassesList tbody").append(
    //       "<tr><td>" + classCode + "</td><td>Pending</td></tr>"
    //     );

    //     // Hide the modal after 2 seconds
    //     $("#enrollClassModal").modal("hide");

    //     // Clear the class code field
    //     $("#classCode").val("");

    //     // Reset button states
    //     $("#enrollButton").show();
    //     $("#loadingButton").hide();
    //     document.getElementById("enrollClassForm").reset();
    //   }, 1000); // Wait 2 seconds before hiding the modal
    // });
  </script>
</body>

</html>
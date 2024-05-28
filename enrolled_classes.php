<?php
session_start();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enrolled Classes</title>
   
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-container {
            margin-top: 20px;
        }

        .section-title {
            margin-top: 40px;
        }
    </style>
</head>

<body style="background-color: aliceblue">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="/eSchola/dashboard.php" style="color: white;">
          <h1>eSchola</h1>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="/eSchola/" style="color: white"><strong>
                  <form action="logout.php">
                    <label><h5 style="cursor: pointer;">Logout</h5></label>
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
                    <div class="row card-container">
                        <div class="col-md-12">
                            <h1 class="text-center mt-4">Enrolled Classes</h1>
                            

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Class Name</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody id="enrolledClassesList">
                                    <tr>
                                    <?php
                                    require "dbConnect.php";
                                    if (!dbConnect()) {
                                        header("Location: error.php");
                                        exit();
                                    } else {
                                        $id = $_SESSION["id"];
                                        $select_query = "SELECT * FROM enrolled_class WHERE id = $id";
                                        $result = mysqli_query($connection, $select_query);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $class_code = $row["course_code"];
                                                echo "<tr>
                                                  <td>$class_code</td>
                                                  <td>Pending</td>
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
                                    </tr>
                                </tbody>
                            </table>
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
        // // Dummy data for enrolled classes (replace with actual data from backend)
        // var enrolledClasses = [
        //     { className: "Mathematics", instructorName: "John Doe" },
        //     { className: "Physics", instructorName: "Jane Smith" },
        //     { className: "Literature", instructorName: "Alice Johnson" }
        // ];

        // // Function to populate enrolled classes table
        // function populateEnrolledClasses() {
        //     var enrolledClassesList = document.getElementById("enrolledClassesList");
        //     enrolledClassesList.innerHTML = ""; 

        //     if (enrolledClasses.length === 0) {
        //         // If no classes enrolled, display a message
        //         var row = document.createElement("tr");
        //         var cell = document.createElement("td");
        //         cell.colSpan = "2";
        //         cell.textContent = "No classes enrolled";
        //         cell.classList.add("text-center");
        //         row.appendChild(cell);
        //         enrolledClassesList.appendChild(row);
        //     } else {
        //         // Populate the table with enrolled classes
        //         enrolledClasses.forEach(function (enrolledClass) {
        //             var row = document.createElement("tr");
        //             var classNameCell = document.createElement("td");
        //             var instructorNameCell = document.createElement("td");
        //             var link = document.createElement("a");
        //             link.href = "/class_details.html"; 
        //             link.textContent = enrolledClass.className; 
        //             classNameCell.appendChild(link);
        //             instructorNameCell.textContent = enrolledClass.instructorName; 
        //             row.appendChild(classNameCell);
        //             row.appendChild(instructorNameCell);
        //             enrolledClassesList.appendChild(row);
        //         });
        //     }
        // }

        
        // populateEnrolledClasses();
    </script>
</body>

</html>

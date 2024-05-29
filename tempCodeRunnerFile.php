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
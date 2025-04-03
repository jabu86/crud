$(document).ready(function () {
  var modal = document.getElementById("id01");
  $("#open-btn").on("click", function () {
    const imageError = document.getElementById("imageError");
    modal.style.display = "block";
    let profileImage = document.getElementById("profileImage");
    profileImage.src = "http://localhost/crud/public/images/profile.png";
    $("#userForm")[0].reset();
    $("#user_id").val(""); // Reset hidden ID field
    imageError.textContent = "";
    $(".modal-header").text("Add user");
  });

  $("#close-model").on("click", function () {
    modal.style.display = "none";
  });

  // Get the modal

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  };

  // When the user clicks anywhere outside of the modal, close it

  $("#image").on("change", function (e) {
    const file = e.target.files[0];
    const imageError = document.getElementById("imageError");
    if (file) {
      const validTypes = ["image/jpeg", "image/png", "image/jpg"];
      const maxSize = 2 * 1024 * 1024; // 2MB

      if (!validTypes.includes(file.type)) {
        imageError.textContent = "Only JPG, JPEG, and PNG files are allowed.";
        imageError.style.color = "red";
        this.value = ""; // Clear the file input
        return;
      } else if (file.size > maxSize) {
        imageError.textContent = "Image size must be less than 2MB.";
        imageError.style.color = "red";
        this.value = ""; // Clear the file input
        return;
      } else {
        imageError.textContent = "";
      }

      const reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("profileImage").src = e.target.result; // Update image preview
      };
      reader.readAsDataURL(file); // Convert file to Base64
    }
  });

  //get all users
  loadUsers();
  function loadUsers() {
    $.get("users/read_users.php", function (data) {
      $("#userTableBody").html(data);
    });
  }
  //get user count
  countUsers();
  function countUsers() {
    $.get("users/count_users.php", function (data) {
      $(".user-count").html(data);
    });
  }

  $("#userForm").on("submit", function (e) {
    e.preventDefault();
    let formData = new FormData(this);
    let userId = $("#user_id").val();
    let url = userId ? "users/update_user.php" : "users/create_user.php"; // Check if it's an update or create request

    $.ajax({
      type: "POST",
      url: url,
      data: formData,
      contentType: false,
      processData: false,
      success: function (response) {
        $("#id01").css("display", "none"); // Close modal
        loadUsers(); // Refresh table
        countUsers(); //Refresh count
        $("#userForm")[0].reset();
        $("#user_id").val(""); // Reset hidden ID field
        $(".success-message").text(response).show(5000).hide(5000);
        $(".success-message").css("display", "block");
      },
    });
  });
  // Edit user
  $(document).on("click", "#edit-user", function () {
    $(".modal-header").text("Edit user");
    let userId = $(this).data("id");
    let profileImage = document.getElementById("profileImage");
    const imageError = document.getElementById("imageError");
    $.get("users/read_user.php?id=" + userId, function (response) {
      $("#id01").css("display", "block");
      let user = JSON.parse(response);
      $("#user_id").val(user.id);
      $("#first_name").val(user.first_name);
      $("#last_name").val(user.last_name);
      $("#email").val(user.email);
      $("#bio").val(user.bio);
      profileImage.src =
        user.image == null
          ? "http://localhost/crud/public/images/profile.png"
          : "http://localhost/crud/public/images/" + user.image;
      imageError.textContent = "";

      //  $("#userForm")[0].reset();
      //  $("#user_id").val("");
      // $("#image").val(user.image);
    });
  });

  $(document).on("click", "#delete-user", function () {
    let userId = $(this).data("id");
    if (confirm("Are you sure you want to delete this user?")) {
      let userId = $(this).data("id");
      $.post("users/delete_user.php", { id: userId }, function (response) {
        $(".remove-message").text(response);
        $(".remove-message").css("display", "block").show(5000).hide(5000);
        loadUsers();
        countUsers(); //Refresh count
      });
    }
  });
  // $("#edit-user").on('click', function(e){
  //     console.log(e);

  // })
});

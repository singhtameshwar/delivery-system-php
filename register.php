<?php
include("./static/header.php");
?>
<section class="py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <form id="form">
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" autocomplete="username">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" autocomplete="email">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label">Phone Number</label>
            <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter your phone number" autocomplete="phone">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" autocomplete="password">
            <input type="checkbox" id="showPassword" />
            <label for="showPassword">Show password</label>
          </div>
          <div class="mb-3">
            <label for="cpass" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpass" name="cpass" placeholder="Confirm your password" autocomplete="cpass">
          </div>
          <button type="submit" id="submit" class="btn btn-custom w-100">register</button>
          <p class="shortpara">If you are a user please <a href="login.php">login</a></p>
        </form>
      </div>
    </div>
  </div>
</section>
<script>
  
  jQuery(document).ready(function() {
    $("#showPassword").click(function() {

      if ($(this).is(":checked")) {
        $("#password").attr("type", "text");

      } else {
        $("#password").attr("type", "password");
      }
    })
    $("#form").validate({
      errorElement: 'div',
      rules: {
        username: {
          required: true,
          minlength: 4
        },
        email: {
          required: true,
          email: true,
        },
        phone: {
          required: true,
          minlength: 10
        },
        password: {
          required: true,
          minlength: 8
        }
      },
      messages: {
        username: {
          required: "please enter your username",
          minlength: "your name must be at least 3 chracter long"
        },
        email: {
          required: "please enter your email",
          email: "Enter a valid email",
        },
        phone: {
          required: "please enter your mobile number",
          minlength: "Your number must be at least 9 number long"
        },
        password: {
          required: "please enter password",
          minlength: "Your password must be at least 8 chracter long and diffrent"
        }
      },
      submitHandler: function(form) {
        var data = $(form).serialize();
        $.ajax({
          type: 'POST',
          url: './functions/create/UserRegister.php',
          data: data,
          datatype: 'json',
          success: function(response) {
            const res = JSON.parse(response);
            if (res.error) {
              Swal.fire({
                title: "error",
                text: res.message,
                icon: "error"
              });
            } else {
              Swal.fire({
                title: "success",
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: "ok",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.href = "login.php";
                }
              });

            }
          }
        })
      }
    })
  })
</script>

<?php
include("./static/footer.php");
?>
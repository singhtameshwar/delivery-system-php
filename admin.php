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
        $("#form").submit(function(e) {
            e.preventDefault();
            var data = $(form).serialize();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './functions/create/admin_submit.php',
                data: data,
                success: function(response) {
                    if (response.error) {
              Swal.fire({
                title: "",
                text: response.message,
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
                  window.location.href = "admin_login.php";
                }
              });

            }
                }
            })

        })
    })
</script>
<?php
include("./static/footer.php");
?>
<?php
include("./static/header.php");
?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form id="form" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email" autocomplete="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" autocomplete="password">
                        <input type="checkbox" id="showPassword" />
                        <label for="showPassword">Show password</label>
                    </div>
                    <button type="submit" class="btn btn-custom w-100">Sign In</button>
                    <p class="shortpara">If you are a new user please <a href="register.php">register</a></p>
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
        jQuery("#form").submit(function(e) {
            e.preventDefault();

            var email = $("#email").val();
            var password = $("#password").val();

            const json_data = {
                email: email,
                password: password
            };
            $.ajax({
                type: 'POST',
                url: './functions/read/UserLogin.php',
                data: json_data,
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        Swal.fire({
                            title: "error",
                            text: response.message,
                            icon: "error"
                        })
                    } else {
                        Swal.fire({
                            title: "completed",
                            showDenyButton: false,
                            showCancelButton: false,
                            confirmButtonText: "ok",
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "dashboard.php";
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
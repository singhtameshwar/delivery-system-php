<?php
include("./static/header.php");
$user_id =  $_SESSION['id'];

?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="row g-3" id="form" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="sname" class="form-label">Sender Fullname </label>
                        <input type="text" class="form-control" id="sname" name="sname" placeholder="Sender Fullname">
                    </div>
                    <div class="col-md-6">
                        <label for="sphone" class="form-label">Sender Phone</label>
                        <input type="text" class="form-control" id="sphone" name="sphone" placeholder="Sender Phone">
                    </div>
                    <div class="col-12">
                        <label for="semail" class="form-label">Sender Email</label>
                        <input type="email" class="form-control" id="semail" name="semail" placeholder="Sender Email">
                    </div>
                    <div class="col-12">
                        <label for="pickup" class="form-label">Pickup Address</label>
                        <input type="text" class="form-control" id="pickup" name="pickup" placeholder="Pickup Address">
                    </div>
                    <div class="col-md-6">
                        <label for="rname" class="form-label">Receiver Fullname </label>
                        <input type="text" class="form-control" id="rname" name="rname" placeholder="Receiver Fullname">
                    </div>
                    <div class="col-md-6">
                        <label for="rphone" class="form-label">Receiver Phonenumber</label>
                        <input type="text" class="form-control" id="rphone" name="rphone" placeholder="Receiver phonenumber">
                    </div>
                    <div class="col-12">
                        <label for="remail" class="form-label">Receiver Email</label>
                        <input type="email" class="form-control" id="remail" name="remail" placeholder="Receiver Email">
                    </div>
                    <div class="col-12">
                        <label for="delhiver" class="form-label">Delhivery Address</label>
                        <input type="text" class="form-control" id="delhiver" name="delhiver" placeholder="Delhivery Address">
                    </div>
                    <div class="col-12">
                        <label for="product" class="form-label">product name</label>
                        <input type="text" class="form-control" id="product" name="product" placeholder="product name">
                    </div>
                    <div class="col-12">
                        <label for="photo" class="form-label">image</label>
                        <input type="file" class="form-control" id="photo" name="photo">
                    </div>

                    <input type="hidden" class="form-control" id="user_id"name="user_id" value="<?php echo($user_id)?>">

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Sign in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    jQuery(document).ready(function() {
        $("#form").submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'post',
                url: './functions/create/dlhvry_submit.php',
                dataType: 'json',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
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
<?php
session_start();

include("./static/header.php");
include("./utils/function.php");
include("./db/connection.php");

$check=if_user_logged_in( $_SESSION );

if( !$check ) {
    header('Location:register.php');
    exit;
 }

$user_id = $_SESSION['id'];
$user_data = get_user_data($user_id, $conn);

?>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 "style="text-align:center">
                <h2 class="hello"style="color: #899c0c; font-family:sans-serif;text-decoration:underline">Hi:<?php echo $user_data['username'] ?>:</h2>
            </div>
            <div class="col-6 pt-4">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <h4 class="order"style="color:#0d822a;font-family:sans-serif;text-decoration:underline" >You can track your ordere from here..</h4>
                <a href="user_track.php"><button class="btn btn-primary"style="background-color:#738211" type="button">Track Your Object</button></a>
                </div>
            </div>
            <div class="col-6 pt-4">
            <div class="d-grid gap-2 col-6 mx-auto">
                <h4 class="order"style="color:#0d822a;font-family:sans-serif;text-decoration:underline">Enter you detail for next order..</h4>
            <a href="dlhvry_form.php"><button class="btn btn-primary"style="background-color:#738211" type="button">Details</button></a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>





<?php
include("./static/footer.php");

?>
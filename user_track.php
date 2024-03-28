<?php
include("./static/header.php");
?>

<section>
    <div class="container mt-5">
        <div id="orders" class="row justify-content-center">
        </div>
    </div>
</section>

<script>
    jQuery(document).ready(function() {
        var action = 'get_all_users';
        $.ajax({
            url: './functions/read/user_track.php',
            type: 'post',   
            dataType: 'json',
            data: {
                action: action
            },
            success: function(response) {
                const data = response?.data;
                let html='';
                data.forEach((item) => {
                    html += `
                    <div class="col-md-8">
                        <div class="card my-3">
                            <div class="card-header">
                             orders
                            </div>
                            <div class="card-body">
                                <h4>Sender:</h4>
                                <h5>name:${item.sender_name}</h5>
                                <p>
                                phone:${item.sender_phone}
                                address:${item.sender_address}
                                email:${item.sender_email}
                                </p>
                                
                                <h4>receiver:</h4>
                                <h5>name:${item.receiver_name}</h5>
                                <p>
                                phone:${item.receiver_phone}
                                address:${item.receiver_address}
                                email:${item.receiver_email}
    
                                </p> 
                                <div class="status">status:${item.status}</div>
                            <div class="image"">
                            <img style="height:100px"src="./assets/images/${item.image}"
                         <p> 
                        
                        </div>
                    </div>
                    `
                    $("#orders").html(html)
                })
            }
        })
    })
</script>
<?php
include("./static/footer.php");
?>
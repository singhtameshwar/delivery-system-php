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
            url: './functions/read/user_order_list.php',
            type: 'post',
            dataType: 'json',
            data: {
                action: action
            },
            success: function(response) {
                const data = response?.data;
                data.forEach((item) => {
                    const html = `
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
                               <div class="adimg">
                            <img style="height:100px"src="./assets/images/${item.image}"
                            </div>
                            </div>
                            <form id="form" method="post"> 
                            <div class="btn-group pt-3">
                                <input type="hidden" class="form-control" id="orderid"  name="orderid" value="${item.id}">
                                <input type="text" class="form-control" id="status"  name="status"placeholder="product status">
                                <div class="btn">
                                <button type="button" class="btn btn-success" onclick="btnClicked()" id="clkaction">Action</button>
                                </button></div>
                                </div>
                                </form>
                            </div>                     
                           </div>
                    `
                    $("#orders").html(html)
                })
            }
        })
    })
    function btnClicked() {
        var data = $(form).serialize();
        $.ajax({
            url: './functions/update/Update_status.php',
            datatype: 'json',
            data: data,
            type: 'post',
            success: function(response) {
                Swal.fire({
                    title: "success",
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: "ok",
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "admin_dashboard.php";
                    } else if (result.isDenied) {
                        Swal.fire("Changes are not saved", "", "info");
                    }
                });
            }
        })
    }
</script>
<?php
include("./static/footer.php");
?>
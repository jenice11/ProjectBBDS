<?php
require_once '../../BusinessLayer/controller/manageLoginAndRegisterController.php';
$user = new manageLoginAndRegisterController();

if(isset($_POST['register'])){
    $user->spRegister();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Service Provider Register</title>
         <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="ExternalCSS/logo.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <style>
            p {
                font-size: 20px;
                text-align: center;
            } 

            .registerbtn {
                background-color: rgb(140, 140, 175);
                color: white;
                padding: 10px 10px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
                opacity: 0.9;
            }

            .registerbtn:hover {
                opacity: 1;
            }

            .showPwd {
                font-size: medium;
                padding-top: 5px;
                text-align: right;
            }

            .login {
                color: blue;
            }

            .login:hover {
                color : rgb(0, 81, 255);
                text-decoration: none; 
                cursor: pointer;
                opacity: 0.9;
            }

            .status-available{
                color:#2FC332;
            }
            .status-not-available{
                color:#D60202;
            }
        </style>
    </head>

    <script>
        function showPassword() {
            var x = document.getElementById("password");
    
            if(x.type === "password"){
                x.type = "text";
            } 
            else{
                x.type = "password";
            }
        }
    </script>

     <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
    $("#loaderIcon").show();
    jQuery.ajax({
    url: "check_availability.php",
    data:'spusername='+$("#spusername").val(),
    type: "POST",
    success:function(data){
        $("#user-availability-status").html(data);
        $("#loaderIcon").hide();
    },
    error:function (){}
    });
}
</script>

    <body>
        <div class="header">
            <a href="userRegister.php"><img src="Image/logo.jpg" alt="Logo" height="250px"></a>
            <br><label style="font-size: 25px;">Beep Beep</label>
        </div>

        <br>
        <p><strong>Register as Service Provider</strong>:</p>
        <br>

        <form action="" method="POST">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spusername" id="spusername" placeholder="Username" onBlur="checkAvailability()" required>
                    </div>

                        <div> <span id="user-availability-status"></span> </div>

                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="sphpnumber" placeholder="Phone Number" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spemail" placeholder="Email Address" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spcompanyname" placeholder="Company Name" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spaddress1" placeholder="Address Line 1" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spaddress2" placeholder="Address Line 2" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spaddress3" placeholder="Address Line 3" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spaddress4" placeholder="Address Line 4" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spbanktype" placeholder="Bank Type" required>
                    </div>
                    <br>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true" style="font-size: large;"></i></span>
                        <input type="text" class="form-control form-control input-lg" name="spbankaccountnumber" placeholder="Bank Account Number" required>
                    </div>
                    <br>
                    <div class="input-group">         
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock" aria-hidden="true" style="font-size: larger;"></i></span>
                        <input type="password" class="form-control form-control input-lg" name="sppassword" id="password" placeholder="Password" required>
                    </div>
                    <div class="showPwd"><input type="checkbox" onclick="showPassword()">&nbsp;Show Password</div>
                        <br>
                        <button type="submit" id="submit" name="register" class="registerbtn"><label style="font-size: larger;">Register</label></button>
                    </div>  
                </div>
            </div>
        </form>
        <br>
        <div style="text-align: center; font-size: medium;">
            Already have an account? <a class="login" href="./serviceproviderLogin.php"><u>Login here</u></a>.
        </div>
    </body>
</html>
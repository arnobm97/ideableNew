<?php
define('ADMIN', 'C:/xampp/htdocs/ideable');
include ADMIN . '/includes/header.php';
include ADMIN . '/includes/navbar-main.php';
include ADMIN . '/includes/dbConfig.php';
?>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="" method="post" class="sign-in-form">
            <h2 class="title">Insert the OTP</h2>
                <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="Email Address" name="inventor_reset_email" required />
                </div>
                <div class="input-field">
                <i class="fas fa-user"></i>
                <input type="text" placeholder="OTP" name="inventor_reset_otp" required />
                </div>
                <input type="submit" value="Login" name="inventor_reset_otp_btn" class="btn solid" />
            </form>
        </div>
    </div>
</div>


<?php

if(isset($_POST['inventor_reset_otp_btn'])){
    $otp = $_POST['inventor_reset_otp'];
    $email = $_POST['inventor_reset_email'];

    $query = "SELECT * FROM $inventor WHERE inventor_email = '$email'";
    $run = mysqli_query($mysqli, $query);

    if(mysqli_num_rows($run)>0){
        header('Location:/ideable/inventor/reset-pass-inventor.php');
        session_start();
        $_SESSION['email'] = $_POST['inventor_reset_email'];
    }else{
        echo "<script>alert('The OTP or E-mail is not correct. Please check and enter again.')</script>";
    }
}

?>
<?php
include ADMIN . '/includes/footer.php';
?>
<?php
session_start();
// if (!isset($_SESSION['admin_email']) && !isset($_SESSION['admin_email'] )) {
//     header("location: shop.php");
// }
 include('./Incl/header.php');
?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col col-6 bg-secondary mt-5 pb-3">
            <h1 class="text-center text-light p-2"> <hr> Admin Login</h1> <hr>

            <form action="log_reg_action.php" method="post"  autocomplete="off">
                <div class="form-group">
                <label for="email" class="form-label text-light">Email</label>
                <input type="email" name="email" id="" class="form-control" autocomplete="false">
                </div>
                <div class="form-group mb-3">
                <label for="password" class="form-label text-light">Password</label>
                <input type="password" name="password" id="" class="form-control" autocomplete="new-password">
                </div>
                <button type="submit" name="login" class="btn btn-primary ">Login</button>
                <p>You don't have account ? <a href="adminRegister.php">Register </a> here</p>
            </form>
            
        </div>
    </div>
</div>
<?php session_destroy(); ?>
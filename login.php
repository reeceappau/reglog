<?php
session_start();
if (isset($_SESSION['logged_in'])) {
  header("Location: index.php");
  exit();
}
$page_title = "Login | ToDo";
include 'includes/header.php';
include 'includes/navbar.php';
?>

    <div class="login-clean">
        <form method="post" action="classes/login.php">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration">
              <i class="icon ion-ios-contact"></i>
            </div>
            <?php if (isset($_REQUEST['e'])) {?>
              <div class="alert alert-danger">
                <?php echo $_REQUEST['e']; ?>
              </div>
            <?php } ?>
            <?php if (isset($_REQUEST['s'])) {?>
              <div class="alert alert-success">
                <?php echo $_REQUEST['s']; ?>
              </div>
            <?php } ?>
            <div class="form-group">
              <input class="form-control" type="email" name="email" placeholder="Email">
            </div>
            <div class="form-group">
              <input class="form-control" type="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-block" type="submit" name="login">Log In</button>
            </div>
            <a href="register.php" class="forgot">Don't have an account? Sign up here.</a>
          </form>
    </div>

<?php include 'includes/footer.php' ?>

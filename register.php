<?php $page_title = "Register | ToDo" ?>
<?php include 'includes/header.php' ?>
<?php include 'includes/navbar.php' ?>



    <div class="register-photo">
        <div class="form-container">
            <div class="image-holder"></div>
            <form action="classes/register.php" method="POST">
                <h2 class="text-center">
                  <strong>Create</strong> an account.
                </h2>
                <?php if (isset($_REQUEST['e'])) {?>
                  <div class="alert alert-danger">
                    <?php echo $_REQUEST['e']; ?>
                  </div>
                <?php } ?>
                <div class="form-group">
                  <input class="form-control" type="text" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                  <input class="form-control" type="email" name="email" placeholder="Email">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                  <input class="form-control" type="password" name="password_repeat" placeholder="Password (repeat)">
                </div>
                <div class="form-group">
                  <input class="btn btn-primary btn-block" type="submit" name="register" value="Sign Up">
                </div>
                <a href="login.php" class="already">You already have an account? Login here.</a>
              </form>
        </div>
    </div>

<?php include 'includes/footer.php' ?>

<div>
    <nav class="navbar navbar-light navbar-expand-md navigation-clean-button">
        <div class="container"><a class="navbar-brand" href="index.php">ToDo</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
          <?php if (!isset($_SESSION['logged_in'])) { ?>
            <div class="collapse navbar-collapse" id="navcol-1">
              <span class="navbar-text actions ml-auto">
                <a href="login.php" class="login">Log In</a>
                <a class="btn btn-light action-button" role="button" href="register.php">Sign Up</a>
              </span>
            </div>
          <?php } else { ?>
            <div class="collapse navbar-collapse" id="navcol-1">
              <div class="dropdown ml-auto">
                <button class="btn btn-secondary dropdown-toggle action-button" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?php echo $_SESSION['username']; ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="details.php">Details</a>
                  <a class="dropdown-item" href="details.php#change_password">Change Password</a>
                  <a class="dropdown-item" href="classes/logout.php">Logout</a>
                </div>
                </div>
              </div>
          <?php } ?>
        </div>
    </nav>
</div>

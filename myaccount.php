<?php require('scripts/header.php'); ?>
<?php require('scripts/connect.php'); ?>
	<body>
    <div class="container">

      <div class="masthead">
        <h3 class="muted">HabitRPG-GitHub</h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="//github.com/HabitRPG/HabitRPG-GitHub/commits/master">Changelog</a></li>
                <li><a href="//github.com/HabitRPG/HabitRPG-GitHub">Downloads</a></li>
                <li><a href="about.php">About</a></li>
                <li class="active"><a href="#">My Account</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

		<?php
			if(array_key_exists('username', $_SESSION)) {
				require('views/account.php');
			}
			else {
				require('views/login.php');
			}
		?>

<?php require('scripts/footer.php'); ?>

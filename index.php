<?php
require('scripts/setup.php');
require('scripts/header.php');
?>
  <body>
    <div class="container">

      <div class="masthead">
        <h3 class="muted">HabitRPG-GitHub</h3>
        <div class="navbar">
          <div class="navbar-inner">
            <div class="container">
              <ul class="nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="//github.com/HabitRPG/HabitRPG-GitHub/commits/master">Changelog</a></li>
                <li><a href="//github.com/HabitRPG/HabitRPG-GitHub">Downloads</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="myaccount.php">My Account</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>Sync with GitHub</h1>
        <p class="lead">Sync your HabitRPG account with your GitHub account.  Up or down vote habits based on your commit rate.  It's up to you!  Is GitHub a good habit or a bad habit?  Or both?</p>
        <a class="btn btn-large btn-success" href="myaccount.php">Signup or login now!</a>
      </div>

      <hr>

      <!-- Example row of columns -->
      <div class="row-fluid">
        <div class="span4">
          <h2>HabitRPG</h2>
          <p>The website for which this service is built.  Habit tracking which treats your goals like a Role Playing Game. Level up as you succeed, lose HP as you fail, earn money to buy weapons and armor. Open sourced on <a href='//github.com/lefnire/habitrpg'>GitHub</a>.</p>
          <p><a class="btn" href="//habitrpg.com">Visit Website &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Setup</h2>
          <p>Please read these instructions in order to properly connect your HabitRPG and GitHub accounts.  <strong>Remember to use your GitHub username!  Otherwise, this service will not work!</strong></p>
          <p>
            <a class="btn" href=<?php echo "\"{$website}/about.php#setup\"";?>>View details &raquo;</a>
          </p>
        </div>
        <div class="span4">
          <h2>Find Me</h2>
          <p>Find me on GitHub! I'm completely open sourced, just like HabitRPG!  Fork me, watch me, send me a pull request, open an issue!  It all helps! Be sure to star HabitRPG while you're at it!  Need private help? <a href="mailto:rudd.fawcett@gmail.com">Email me.</a></p>
          <p><a class="btn" href="http://github.com/HabitRPG/habitrpg-github">Visit repository &raquo;</a></p>
        </div>
      </div>

<?php require('scripts/footer.php'); ?>

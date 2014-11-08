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
                <li class="active"><a href="#">About</a></li>
                <li><a href="myaccount.php">My Account</a></li>
              </ul>
            </div>
          </div>
        </div><!-- /.navbar -->
      </div>

    <div class="page-header">
        <h1>About</h1>
    </div>

  <h3 class="section-header" id='setup'>Connecting Your Accounts</h3>
    <p class='lead'>
      To connect your GitHub to your HabitRPG account is designed to be as simple as possible.  All it requires is creating a
      &quot;<a href='https://help.github.com/articles/post-receive-hooks'>Service Hook</a>&quot; for the repository or repositories
      that you would like to connect to.  When you add your service hook, you will enter your unique URL
      <?php
      if(!array_key_exists('username',$_SESSION)) {
        echo "&nbsp;(to show your custom URL, please login)";
      }?>:
      <div class='well' style='margin:0;'>
        <strong style='font-size: 17px;'>
          <?php echo $website;?>/scripts/serviceHook.php?username=<?php echo $_SESSION['username'];?>&token=<?php echo $_SESSION['token']; ?>
        </strong>
      </div>
      <br>
    <p class='lead'>
      That's it!  Now, every time you push to your repository, your HabitRPG account will gain experience, or lose health based on
      the parameters!
    </p>
<!--
        <h3 class="section-header">Parameters</h3>
        <p class="lead">Parameters for a service hook URL:</p>
        <ul>
          <li class='lead'><i>username</i>: your GitHub username to match with database. <strong>(required)</strong></li>
          <li class='lead'><i>every</i>: the amount of commits it takes to trigger an XP up vote. <strong>(required)</strong></li>
          <li class='lead'><i>direction</i>: is type of action you would like, up or down. <strong>(optional - defaults to up)</strong></li>
        </ul>
 -->

<?php require('scripts/footer.php'); ?>

#HabitRPG-GitHub

[![Code Climate](https://codeclimate.com/github/HabitRPG/HabitRPG-GitHub/badges/gpa.svg)](https://codeclimate.com/github/HabitRPG/HabitRPG-GitHub)

Connect and sync your HabitRPG and GitHub accounts.  Built on Rudd fawcett's
[HabitRPG API class](https://github.com/ruddfawcett/HabitRPG_PHP) as well as
[Bootstrap](http://getbootstrap.com) and a little jQuery).

##Purpose:

If you love playing HabitRPG, and love using GitHub too, why not sync them?  ***For every x number of
commits you push to a repository, you will get x number of upvotes* on your HabitRPG account!***  This
way, your hard work coding pays off with your HabitRPG account.  

*<i>Both of the "x" values are configurable in when you add a repository to your account.</i>`

##Local Setup:

Start your PHP server on your computer.
All you know have to do to be able to interact with the database is to copy `scripts/connect_example.php`
to `scripts/connect.php` and set your host values in `scripts/connect.php`. Don't worry, it's in the
`.gitignore` file so you won't accidentally upload your credentials. Just to double check, the relevant
lines in your `scripts/connect.php` script should look like this after you have entered the values:

```php
  define("MYSQL_PREFIX","{Table prefix}");
  $hostname = "{Path to MySQL database}";
  $username = "{MySQL database username, most default to root}";
  $password = "{MySQL database password, most default to no password}";
  $dbname = "{Name of the database you're importing the data into}";
```

The rest of the setup will happen automagically when you first open index.php.  
If you're working locally don't forget to start MySQL first, though!**

##Contributing:

1. Fork the repo.
2. Set up your local development environment.
3. Copy `tests/account_example.php` to `tests/account.php` and enter your test account credentials.
4. Make a contribution & submit a pull request!

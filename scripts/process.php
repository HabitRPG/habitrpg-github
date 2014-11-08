<?php
	require('session.php');
	//echo "<pre>";print_r($_POST);die;
	switch ($_POST['type']) {
		case "login":
			if (empty($_POST['username']) || empty($_POST['password'])) {
				echo "<div class='alert alert-error'><strong>Error!</strong> Please enter values for all fields!</div>";
			}
			else {
				require('connect.php');
				$stmt = $db->prepare("SELECT * FROM ".MYSQL_PREFIX."users WHERE username=:username AND password=:password");
				$stmt->execute(array(':username' => $_POST['username'], ':password' => hash('sha256',$_POST['password']."habitrpg")));
				$row_count = $stmt->rowCount();
					if ($row_count == 1) {
						$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$resultsArray = $results[0];
						$_SESSION['username'] = $resultsArray['username'];
						$_SESSION['userId'] = $resultsArray['userId'];
						$_SESSION['apiToken'] = $resultsArray['apiToken'];
						$_SESSION['realName'] = $resultsArray['realName'];
						$_SESSION['token'] = $resultsArray['token'];

						echo "<script type='text/javascript'>window.location.href=window.location.href</script>";
					}
					else {
						echo "<div class='alert alert-error'><strong>Error!</strong> We can't find you in our database, please double check your username and password!</div>";
					}
				}
		break;
		case "signup";
			//echo "<pre>";print_r($_POST);die;
			if (empty($_POST['username2']) || empty($_POST['password2']) || empty($_POST['apiToken']) || empty($_POST['userId']) || empty($_POST['realName'])) {
				echo "<div class='alert alert-error'><strong>Error!</strong> Please enter values for all fields!</div>";
			} else {
				function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
				{
					$str = '';
					$count = strlen($charset);
					while ($length--) {
						$str .= $charset[mt_rand(0, $count-1)];
					}
					return $str;
				}
				require('connect.php');
				$stmt = $db->prepare("SELECT * FROM ".MYSQL_PREFIX."users WHERE username=:username OR token=:token");
				$stmt->execute(array(':username' => $_POST['username2'], ':token' => randString(13)));
				$row_count = $stmt->rowCount();
				if ($row_count == 0) {
					$stmt = $db->prepare("INSERT INTO ".MYSQL_PREFIX."users(username,password,userId,apiToken,realName,token) VALUES(:username,:password,:userId,:apiToken,:realName,:token)");
					$stmt->execute(array(':username' => $_POST['username2'], ':password' => hash('sha256',$_POST['password2']."habitrpg"), ':userId' => $_POST['userId'], ':apiToken' => $_POST['apiToken'], ':realName' => $_POST['realName'], ':token' => randString(13)));

					$stmt = $db->prepare("SELECT * FROM ".MYSQL_PREFIX."users WHERE username=:username AND password=:password");
					$stmt->execute(array(':username' => $_POST['username2'], ':password' => hash('sha256',$_POST['password2']."habitrpg")));
					$row_count = $stmt->rowCount();
					if ($row_count == 1) {
						$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
						$resultsArray = $results[0];
						$_SESSION['username'] = $resultsArray['username'];
						$_SESSION['userId'] = $resultsArray['userId'];
						$_SESSION['apiToken'] = $resultsArray['apiToken'];
						$_SESSION['realName'] = $resultsArray['realName'];
						$_SESSION['token'] = $resultsArray['token'];
					}
					echo "<div class='alert alert-success'><strong>Success!</strong> Sweet!  You've set up an account!  Hold on, and we'll log you in.</div><script type='text/javascript'>window.setTimeout(function(){location.reload()},3000);</script>";
				}
				else {
					echo "<div class='alert alert-error'><strong>Error!</strong> That username has already been taken!  Is that your GitHub username, but not your account?  Contact me, and I'll sort it out...</div>";
				}
			}
		break;
		case "addRepo";
			if (empty($_POST['forEvery']) || empty($_POST['repoName'])) {
				echo "<div class='alert alert-error modalError'><strong>Error!</strong> Please enter values for all fields!</div>";
			}
			else if (!is_numeric($_POST['forEvery'])){
				echo "<div class='alert alert-error modalError'><strong>Error!</strong> Please enter an integer value for Commits Per Vote!</div>";
			}
			else {
				function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
				{
					$str = '';
					$count = strlen($charset);
					while ($length--) {
						$str .= $charset[mt_rand(0, $count-1)];
					}
					return $str;
				}
				require('connect.php');
				$stmt = $db->prepare("SELECT * FROM ".MYSQL_PREFIX."userInfo WHERE repoName=:repoName OR id=:id");
				$stmt->execute(array(':repoName' => $_POST['repoName'], ':id' => randString(7)));
				$row_count = $stmt->rowCount();
				if ($row_count == 0) {
					$stmt = $db->prepare("INSERT INTO ".MYSQL_PREFIX."userInfo(forUser,repoName,forEvery,direction,id) VALUES(:username,:repoName,:forEvery,:direction,:id)");
					$stmt->execute(array(':username' => $_SESSION['username'], ':repoName' => $_POST['repoName'], ':forEvery' => $_POST['forEvery'], ':direction' => $_POST['direction'], ':id' => randString(7)));

					echo "<script type='text/javascript'>$('#myModal').modal('hide'); window.location.href=window.location.href</script>";
				}
				else {
					echo "<div class='alert alert-error modalError'><strong>Error!</strong> That Repository Name has already been used!</div>";
				}
			}
		break;
		default:
			echo "<div class='alert alert-error modalError'><strong>Error!</strong> Uh oh! You broke me!</div>";
		break;
	}
?>

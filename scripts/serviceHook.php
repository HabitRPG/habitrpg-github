<?php
	require('connect.php');
	require('serviceFunctions.php');

	if (array_key_exists('username',$_GET) && array_key_exists('token',$_GET)) {
		$stmt = $db->prepare("SELECT * FROM ".MYSQL_PREFIX."users WHERE username=:username AND token=:token");
		$stmt->execute(array(':username' => $_GET['username'], ':token' => $_GET['token']));
		$row_count = $stmt->rowCount();
		if ($row_count == 1) {
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$resultsArray = $results[0];
			$realName = $resultsArray['realName'];
			$username = $resultsArray['username'];
			$token = $resultsArray['token'];

			$hookArray = json_decode(file_get_contents('php://input'),true);
			$repoName = $hookArray['repository']['name'];

			$commitArray = $hookArray['commits'];

			// $authorInfoName = array();
			//$authorInfoUsername = array();

			$i=0;

			foreach ($commitArray as $commit) {
				if (!array_key_exists('name',$commit['committer']) && array_key_exists('username',$commit['committer'])) {
					$i++;
				}
				else if (array_key_exists('name',$commit['committer']) && !array_key_exists('username',$commit['committer'])) {
					$i++;
				}
				else if (array_key_exists('name',$commit['committer']) && array_key_exists('username',$commit['committer'])) {
					$i++;
				}
			}

			if ($i > 0) {
				newCommit($repoName,$username,$i,$token);
			}
			else {
				//add future notification support (In the last push to repoName, you didn't have a commit!)
			}
		}
	}
	else {
		header(' ', true, 400);
	}
?>

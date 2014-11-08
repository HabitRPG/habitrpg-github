 <?php
	function newCommit ($repoName, $user, $count,$token) {
	require("connect.php");
	$stmt = $db->prepare("SELECT * FROM ".MYSQL_PREFIX."userInfo WHERE forUser=:username AND repoName=:repoName");
	$stmt->execute(array(':username' => $user, ':repoName' => $repoName));
	$row_count = $stmt->rowCount();
		if ($row_count == 1) {
			$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$resultsArray = $results[0];
			$current = $resultsArray['current'];
			$totalHabit = $resultsArray['totalHabit'];
			$totalCommits = $resultsArray['totalCommits'];
			$direction = $resultsArray['direction'];
			$forEvery = $resultsArray['forEvery'];
			$id = $resultsArray['id'];

			$stmt = $db->prepare("SELECT * FROM ".MYSQL_PREFIX."users WHERE username=:username AND token=:token");
			$stmt->execute(array(':username' => $user, ':token' => $token));
			$row_count = $stmt->rowCount();
			if ($row_count == 1) {
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				$resultsArray2 = $results[0];
				$userId = $resultsArray2['userId'];
				$apiToken = $resultsArray2['apiToken'];
			}

			$newCurrent = $count % $forEvery;

			$habitsForThis = $count / $forEvery;

			$habitsForThis = round($habitsForThis, 0, PHP_ROUND_HALF_DOWN);

			$newTotalCommits = $totalCommits + $count;
			$newTotalHabit = $totalHabit + ($newTotalCommits/$forEvery);

			$stmt = $db->prepare("UPDATE ".MYSQL_PREFIX."userInfo SET current=?,totalHabit=?,totalCommits=? WHERE id=?");
			$stmt->execute(array($newCurrent, $newTotalHabit,$newTotalCommits,$id));

			$affected_rows = $stmt->rowCount();

			if ($affected_rows > 0) {
				$HabitRPG = new HabitRPGUser($userId,$apiToken);
				$params = array();
				if ($direction == 1) {
					$params['direction'] = "up";
				}
				else {
					$params['direction'] = "down";
				}

				$params['taskId'] = "habitrpg-github-" . strtolower($repoName);
				$params['title'] = "HabitRPG-GitHub: " . $repoName;
				$params['service'] = "HabitRPG-GitHub.  Sync your GitHub commits to gain XP.  What's not to love?!";

				$i = 0;
				while ($i++ < $habitsForThis) {
					$HabitRPG->taskScoring($params);
				}
			}
		}
	}
?>

<div class="page-header">
	<h1>Thanks for signing up, <?php $first = explode(" ", $_SESSION['realName']); echo $first[0]; ?>!</h1>
</div>
<!--<pre><?php //print_r($_SESSION);?></pre>-->
<h3 class="section-header" id='setup'>So... what's happening?</h3>
		<p class='lead'>Well, behind the scenes, every time you commit to your repository with the service hook, you gain XP!</p>
<!--
<h3 class="section-header" id='setup'>Is that it?</h3>
		<p class='lead'>Don't worry, that's not it! Soon, I will be implementing some custom parameters for XP, among other things.  If you would ever like to help, feel free to fork HabitRPG-GitHub!  I accept pull requests. :-)</p>
 -->

<?php
	$stmt = $db->prepare("SELECT * FROM ".MYSQL_PREFIX."userInfo WHERE forUser=:username");
	$stmt->execute(array(':username' => $_SESSION['username']));
	$row_count = $stmt->rowCount(); ?>
	<?php if ($row_count > 0): ?>
	  <div id="myModal" class="modal hide fade in" aria-hidden="true">
		 <div class="modal-header">
			<a class="close" data-dismiss="modal" onclick="$('#return').html('');">&times;</a>
			<h3 id="myModalLabel">Add Repository</h3>
		 </div>
		 <div id="return3"></div>
		 <div class="modal-body">
			<form action="" id="addRepo" method="post" onsubmit="addRepoForm();return false;" class="form-horizontal">
			   <div class="control-group">
				  <label class="control-label" for="inputName">Repository Name</label>
				  <div class="controls">
					 <input type="text" name="repoName" id="inputName" placeholder="Repository Name" />
					 <br><span class="help2-inline">Enter exactly as on GitHub</span>
				  </div>
			   </div>
			   <div class="control-group">
				  <label class="control-label" for="inputForEvery">Commits Per Vote</label>
				  <div class="controls">
					 <input type="text" name="forEvery" id="inputForEvery" placeholder="Commits Per Vote" />
					 <br><span class="help2-inline"></span>
				  </div>
			   </div>
			   <div class="control-group">
				  <label class="control-label" for="inputForEvery">Vote Direction</label>
				  <div class="controls">
					 <select name="direction">
						<option value="1">Up</options>
						<option value="0">Down</options>
					</select>
				  </div>
			   </div>
		 </div>
		 <div class="modal-footer">
		 <a class="btn" data-dismiss="modal" aria-hidden="true" onclick="$'#return').html('');">Close</a>
		 <input type="hidden" value="addRepo" name="type"/>
		 <input type="submit" class="btn btn-success" value="Save & Close" />
		 </div>
		 </form>
	  </div>

<h3 class='section-header' id='setup'>My Stats:<span class='pull-right'><a href='#myModal' data-toggle='modal' class='btn btn-success'>Add repository</a></span></h3>

	<table class="table table-striped table-bordered">
	  <thead>
		<tr>
		  <th>Repository</th>
		  <th>Commits per Vote</th>
		  <th>Commits Until Next Vote(s)</th>
		  <th>Vote Direction</th>
		  <th>Total Past Votes</th>
		  <th>Total Past Commits</th>
		</tr>
	  </thead>
	  <tbody>
	<?php
		while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
			if ($row['direction'] == 0) {
				$direction = "Down";
			}
			else {
				$direction = "Up";
			}
			$tilNext = $row['forEvery'] - $row['current'];
			echo "<tr>
					<td>".$row['repoName']."</td>
					<td>".$row['forEvery']."</td>
					<td>".$tilNext."</td>
					<td>".$direction."</td>
					<td>".$row['totalHabit']."</td>
					<td>".$row['totalCommits']."</td>
				  </tr>";
		}
	?>
	  </tbody>
	</table>

	<?php else: ?>
<h3 class='section-header' id='setup'>My Stats:</h3>
		<p class='lead'>You don't yet have any repositories!  To connect one with your account, see <a href="about.php#setup">this guide</a>!</p>
	<?php endif ?>
<h3 class="section-header" id='setup'>Custom URL Scheme:</h3>
	<div class='well' style='margin:0;'>
		<strong style='font-size: 17px;'>
			<?php echo $website;?>/scripts/serviceHook.php?username=<?php echo $_SESSION['username'];?>&token=<?php echo $_SESSION['token']; ?>
		</strong>
	</div><br>

<h3 class="section-header" id='setup'>Note:</h3>
		<p class='lead'>If you would like more features to happen, follow or star the project, or open an issue!  This is how I will know you want more from this!  Thanks!</p>


<div style='text-align: center;'>
	<iframe src="http://ghbtns.com/github-btn.html?user=HabitRPG&repo=HabitRPG-GitHub&type=watch&count=true&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="170" height="30"></iframe>
	<iframe src="http://ghbtns.com/github-btn.html?user=HabitRPG&repo=HabitRPG-GitHub&type=fork&count=true&size=large"
  allowtransparency="true" frameborder="0" scrolling="0" width="170" height="30"></iframe>
</div>

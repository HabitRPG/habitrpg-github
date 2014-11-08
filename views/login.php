<div class="page-header">
	<h1>Login</h1>
</div>
<div id='return'></div>
<form action="" id="login" method="post" class="form-inline" onsubmit="loginForm(); return false;">
  <div class="control-group">
	<label class="control-label" for="inputUsername">Username</label>
	<div class="controls">
	  <input type="text" id="inputUsername" placeholder="Username" name='username'>
	</div>
  </div>
  <div class="control-group">
	<label class="control-label" for="inputPassword">Password</label>
	<div class="controls">
	  <input type="password" id="inputPassword" placeholder="Password" name='password'>
	</div>
  </div>
  <div class="control-group">
	<div class="controls">
		<input type="hidden" value="login" name='type'>
	  <input type="submit" class="btn btn-success" value="Login" />
	</div>
  </div>
</form>

<hr>

<div class="page-header">
	<h1>Signup</h1>
</div>
<div id='return2'></div>
	<form action="" id="signup" method="post" class="form-inline" onsubmit='signupForm(); return false;'>
	  <div class="control-group">
			<label class="control-label" for="inputUsername">GitHub Username</label>
			<div class="controls">
			  <input type="text" id="inputUsername" placeholder="Username" name='username2'>
			  <br /><span class="help2-inline">You must use your GitHub username!</span>
			</div>
	  </div>
	  <div class="control-group">
			<label class="control-label" for="inputUsername">Full Name</label>
			<div class="controls">
			  <input type="text" id="inputUsername" placeholder="Name" name='realName'>
			  <br /><span class="help2-inline">You must use your name as on GitHub!</span>
			</div>
	  </div>
	  <div class="control-group">
			<label class="control-label" for="inputPassword">Password</label>
			<div class="controls">
			  <input type="password" id="inputPassword" placeholder="Password" name='password2'>
			  <br /><span class="help2-inline">Don't use your GitHub password!</span>
			</div>
	  </div>
		<div class="control-group">
			<label class="control-label" for="inputID">HabitRPG User ID</label>
			<div class="controls">
				<input type="text" id="inputID" placeholder="xxxx-xxxx-xxxx-xxxx" name='userId'>
			</div>
		</div>
		<div class="control-group">
			<label class="control-label" for="inputToken">HabitRPG API Token</label>
			<div class="controls">
			  <input type="text" id="inputToken" placeholder="xxxx-xxxx-xxxx-xxxx" name='apiToken'>
			</div>
	  </div>
	  <div class="control-group">
			<div class="controls">
			<input type="hidden" value="signup" name='type'>
			<button type="submit" class="btn btn-success">Signup</button>
			</div>
	  </div>

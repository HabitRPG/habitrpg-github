<?php
	require ('session.php');
	require ('connect.php');
	session_destroy();
	echo "<script type='text/javascript'>window.location.href='$website'</script>";
?>

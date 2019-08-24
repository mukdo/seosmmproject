<!DOCTYPE html>
<html>
<head>
	<title>
		Log Out
	</title>
</head>
<body>
	<?php
		session_start();
	    $_SESSION['username'] = '';
	    header("Location: login.php");
	?>

</body>
</html>
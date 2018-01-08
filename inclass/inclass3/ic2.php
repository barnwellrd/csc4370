<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>ic2</title>
		<link rel="stylesheet" type="text/css" href="mystyle.css"></link>
    </head>
    <body>
        <?php
			$title = $_POST['title'];
			$forename = $_POST['forename'];
			$surname = $_POST['surname'];
			$address = $_POST['address'];
			$birthday = $_POST['birthday'];
			print '<p>Hello, ' . "$title $forename $surname" . ' of ' . "$address.</p><br>";
			$date = date_create($birthday);
			$interval = $date->diff(new DateTime);
			print '<p>You are ' . "$interval->y" . ' this year.' . "</p>";
        ?>
    </body>
</html>
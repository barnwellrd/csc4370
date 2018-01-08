<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>In-Class Assignment 2</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="mystyle.css"></link>
	</head>
	<body>
		<form action="ic2.php" method="post">
			<p>Title
			<select name="title">
				<option value="Mr.">Mr.</option>
				<option value="Mrs.">Mrs.</option>
				<option value="Ms.">Ms.</option>
				<option value="Dr.">Dr.</option>
				<option value="Prof.">Prof.</option>
			</select></p>
			<p>First name:</p>
			<p><input name="forename" type="text" size="20" /></p>
			<p>Family name:</p>
			<p><input name="surname" type="text" size="20" /></p>
			<p>Address:</p>
			<p><textarea name="address" cols="20" rows="4"></textarea></p>
			<p>Birthday:</p>
			<p><input type="date" name="birthday"></p>
			<p><input type="submit" value="Click" name="submit" /></p>
		</form>
	</body>
</html>
<?php
	//get's the question data
	$txt_file    = file_get_contents('questions.txt');
	$rows        = explode("\n", $txt_file);
	array_shift($rows);
	foreach($rows as $row => $data)
	{
		//get row data
		$row_data = explode('^', $data);
		$info[$row]['id']           = $row_data[0];
		$info[$row]['quest']        = $row_data[1];
		$info[$row]['a1']  			= $row_data[2];
		$info[$row]['a2']       	= $row_data[3];
		$info[$row]['a3']       	= $row_data[4];
		$info[$row]['a4']       	= $row_data[5];
		$info[$row]['a5']       	= $row_data[6];
		$info[$row]['a6']       	= $row_data[7];
		$info[$row]['a7']       	= $row_data[8];
		$info[$row]['a8']       	= $row_data[9];
	}
	//generate random num 0-4
	$num = rand(0, 4);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<title>Project 2</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="mystyle.css"></link>
	</head>
	<body>
		<h1>Family Fued!</h1>
		<P id="question">
			<?php
				//print question to the window
				echo $info[$num]['quest'];
			?>
		</P>
		
		<table>
			<tr>
				<td class="ua">1</td>
				<td class="ua">5</td>
			</tr>

			<tr>
				<td class="ua">2</td>
				<td class="ua">6</td>
			</tr>

			<tr>
				<td class="ua">3</td>
				<td class="ua">7</td>
			</tr>

			<tr>
				<td class="ua">4</td>
				<td class="ua">8</td>
			</tr>

		</table>
		
		<p id="wrong">
			Wrong Answers: 
		</p>
		<form action="game.php" method="post">
			<p>
				Answer:
				<input name="input" type="text" size="20" />
				<input type="submit" value="Submit" name="submit" />
			</p>
			<input id="data" name="data" type="text" size="20" value="00000000:000:<?php /*Send question number to next for*/echo ($num+1) ?>"/>
		</form>
	</body>
</html>
<?php
	//get post info
	$sent_data = $_POST['data'];
	$data = explode(':', $sent_data);
	$guessed = str_split($data[0]);
	$wrong = str_split($data[1]);
	$curquest = $data[2];
	$input = $_POST['input'];
	$input = strtolower($input);
	//get question info
	$totaltoguess = 0;
	$totallefttoguess = 0;
	$txt_file    = file_get_contents('questions.txt');
	$rows        = explode("\n", $txt_file);
	array_shift($rows);
	$info;
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
	$num = ($curquest-1);
	//holds answer values
	$values = array();
	$answers = array();
	//populate answers and values
	$cell_data = explode(':', $info[$num]['a1']);
	if($cell_data[0] == '-')
	{
		$answers[] = "";
	}
	else
	{
		$answers[] = $cell_data[0];
	}
	if($cell_data[1] == '-')
	{
		$values[] = 0;
	}
	else
	{
		$values[] = $cell_data[1];
		$totaltoguess++;
	}
	$cell_data = explode(':', $info[$num]['a2']);
	if($cell_data[0] == '-')
	{
		$answers[] = "";
	}
	else
	{
		$answers[] = $cell_data[0];
	}if($cell_data[1] == '-')
	{
		$values[] = 0;
	}
	else
	{
		$values[] = $cell_data[1];
		$totaltoguess++;
	}
	$cell_data = explode(':', $info[$num]['a3']);
	if($cell_data[0] == '-')
	{
		$answers[] = "";
	}
	else
	{
		$answers[] = $cell_data[0];
	}if($cell_data[1] == '-')
	{
		$values[] = 0;
	}
	else
	{
		$values[] = $cell_data[1];
		$totaltoguess++;
	}
	$cell_data = explode(':', $info[$num]['a4']);
	if($cell_data[0] == '-')
	{
		$answers[] = "";
	}
	else
	{
		$answers[] = $cell_data[0];
	}if($cell_data[1] == '-')
	{
		$values[] = 0;
	}
	else
	{
		$values[] = $cell_data[1];
		$totaltoguess++;
	}
	$cell_data = explode(':', $info[$num]['a5']);
	if($cell_data[0] == '-')
	{
		$answers[] = "";
	}
	else
	{
		$answers[] = $cell_data[0];
	}if($cell_data[1] == '-')
	{
		$values[] = 0;
	}
	else
	{
		$values[] = $cell_data[1];
		$totaltoguess++;
	}
	$cell_data = explode(':', $info[$num]['a6']);
	if($cell_data[0] == '-')
	{
		$answers[] = "";
	}
	else
	{
		$answers[] = $cell_data[0];
	}if($cell_data[1] == '-')
	{
		$values[] = 0;
	}
	else
	{
		$values[] = $cell_data[1];
		$totaltoguess++;
	}
	$cell_data = explode(':', $info[$num]['a7']);
	if($cell_data[0] == '-')
	{
		$answers[] = "";
	}
	else
	{
		$answers[] = $cell_data[0];
	}if($cell_data[1] == '-')
	{
		$values[] = 0;
	}
	else
	{
		$values[] = $cell_data[1];
		$totaltoguess++;
	}
	$cell_data = explode(':', $info[$num]['a8']);
	if($cell_data[0] == '-')
	{
		$answers[] = "";
	}
	else
	{
		$answers[] = $cell_data[0];
	}if(!strpos($cell_data[1], '-'))
	{
		$values[] = 0;
	}
	else
	{
		$values[] = $cell_data[1];
		$totaltoguess++;
	}
	//value to track if an aswer was guessed
	$ansfound = 0;
	//checks to see if input was similar to an answer
	for($i = 0; $i < count($answers); $i++)
	{
		if(strpos(strtolower($answers[$i]),$input) !== false)
		{
			$guessed[$i] = 1;
			$ansfound = 1;
			break;
		}
	}
	//increments number wrong if no answer found
	if(!$ansfound)
	{
		for($i = 0; $i < count($wrong); $i++)
		{
			if($wrong[$i] == 0)
			{
				$wrong[$i] = 1;
				break;
			}
		}
	}
	//calculates total wrong
	$totalwrong = 0;
	for($i = 0; $i < count($wrong); $i++)
	{
			$totalwrong += $wrong[$i];
	}
	//calculates total left to guess
	for($i = 0; $i < $totaltoguess; $i++)
	{
		if($guessed[$i] == 0)
			$totallefttoguess++;
	}
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
				//print question to window
				echo $info[$num]['quest'];
			?>
		</P>
		<table>
			<tr>
				<?php 
					//determines if the answer has been guessed previously and print it if so
					if($guessed[0] == 1 || $totalwrong == 3 || $totallefttoguess == 0)
						echo '<td class="answered">' . $answers[0]. '    ' . $values[0] . '</td>';
					else
						echo '<td class="ua">1</td>';
					if($guessed[4] == 1 || $totalwrong == 3 || $totallefttoguess == 0)
						echo '<td class="answered">' . $answers[4]. '    ' . $values[4] . '</td>';
					else
						echo '<td class="ua">5</td>';
				?>
			</tr>	
			<tr>
				<?php 
					//determines if the answer has been guessed previously and print it if so
					if($guessed[1] == 1 || $totalwrong == 3 || $totallefttoguess == 0)
						echo '<td class="answered">' . $answers[1]. '    ' . $values[1] . '</td>';
					else
						echo '<td class="ua">2</td>';
					if($guessed[5] == 1 || $totalwrong == 3 || $totallefttoguess == 0)
						echo '<td class="answered">' . $answers[5]. '    ' . $values[5] . '</td>';
					else
						echo '<td class="ua">6</td>';
				?>
			</tr>
			<tr>
				<?php 
					//determines if the answer has been guessed previously and print it if so
					if($guessed[2] == 1 || $totalwrong == 3 || $totallefttoguess == 0)
						echo '<td class="answered">' . $answers[2]. '    ' . $values[2] . '</td>';
					else
						echo '<td class="ua">3</td>';
					if($guessed[6] == 1 || $totalwrong == 3 || $totallefttoguess == 0)
						echo '<td class="answered">' . $answers[6]. '    ' . $values[6] . '</td>';
					else
						echo '<td class="ua">7</td>';
				?>
			</tr>
			<tr>
				<?php 
					//determines if the answer has been guessed previously and print it if so
					if($guessed[3] == 1 || $totalwrong == 3 || $totallefttoguess == 0)
						echo '<td class="answered">' . $answers[3]. '    ' . $values[3] . '</td>';
					else
						echo '<td class="ua">4</td>';
					if($guessed[7] == 1 || $totalwrong == 3 || $totallefttoguess == 0)
						echo '<td class="answered">' . $answers[7]. '    ' . $values[7] . '</td>';
					else
						echo '<td class="ua">8</td>';
				?>
			</tr>
		</table>
		<p>
			Wrong Answers: 
			<h1 id="wrong">
			<?php 
				//prints an 'X' for every wrong guess
				for($i = 0; $i < count($wrong); $i++)
				{
					if($wrong[$i] == 1)
					{
						echo 'X';
					}
				}
			?>
			</h1>
		</p>
		<p>
			<H2>Score:<?php
					//calculates and prints the score
					$score = 0;
					for($i = 0; $i < 8; $i++)
					{
						if($guessed[$i] == 1)
							$score += $values[$i];
					}
					echo ' ' . $score;
					echo 'points!';
				?>
			</h2>
		</p>
		<?php
			//checks to see if game is still active and prints either the guessing box, or final score and new game button
			if($totalwrong != 3 && $totallefttoguess !== 0)
			{
				echo '<form action="game.php" method="post">
					<p>Answer:
					<input name="input" type="text" size="20" />
					<input type="submit" value="Submit" name="submit" />
					</p>
					<input id="data" name="data" type="text" size="20" value="';
				for($i = 0; $i < count($guessed); $i++)
				{
					echo $guessed[$i];
				}
				echo ':';
				for($i = 0; $i < count($wrong); $i++)
				{
					echo $wrong[$i];
				}
				echo ':';
				echo ($num+1). '"/></form>';	
			}
			else
			{
				echo '<form action="index.php" method="post">
					<p><br/><br/><input type="submit" value="Play Again!" name="submit" />
					</p>';
			}
		?>		
	</body>
</html>
<?php
	print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.1//EN\" \"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd\">
			<!-- Written by Ricky Barnwell  -->
			<!-- Csc 4370 Summer 2017  -->
			<!-- Assignment 3  -->
			<html xmlns=\"http://www.w3.org/1999/xhtml\">
				<head>
					<title>Ricky Barnwell's Assignment 3</title>
					<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
					<style>
						body{
							text-align: center;
						}
						table{
							width: 300px;
							height: 300px;
							border: 1px solid;
							margin-left:auto; 
							margin-right:auto;
						}
						
						td{
							height: 35px;
							width: 35px;
							border: 1px;
							padding: 1px;
						}
					
						.odd{
							background-color: red;	
						}
						
						.even{
							background-color: black;
						}
					</style>
				</head>
				<body>
				<h1>Checker Board</h1>
				<table>";
	$num = 1;
	for($i = 0; $i < 8; $i++)
	{
		print "<tr>";
		for($j = 0; $j < 8; $j++)
		{
			print "<td class=\"" . ($num % 2 == 0? "even\"></td>" : "odd\"></td>");
			
			$num++;
		}
		
		print "</tr>";
		$num++;
	}
	print "</table>
			<h5>By: Ricky Barnwell</h5>
			</body>
		</html>";
?>

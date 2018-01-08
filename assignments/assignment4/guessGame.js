var num = Math.floor((Math.random() * 100) + 1);
var guessesLeft = 5;
function guess()
{
	var x, text;
	x = document.getElementById("inputNum").value;
	if(isNaN(x) || x < 1 || x > 100) 
	{
		alert("Input not valid");
	} 
	else 
	{
		if( x < num)
		{
			var snd = new Audio("wrong.mp3");
			snd.play();
			guessesLeft--;
			if(guessesLeft == 0)
			{
				alert("You Lost! : " + num);
				location.reload();
			}
			else
			{
				document.getElementById("guessResult").innerHTML = "Try guessing higher!";
				document.getElementById("triesLeft").innerHTML = guessesLeft;
			}
			
		}
		else if(x > num)
		{
			var snd = new Audio("wrong.mp3");
			snd.play();
			guessesLeft--;
			if(guessesLeft == 0)
			{
				alert("You Lost! : " + num);
				location.reload();
			}
			else
			{
				document.getElementById("guessResult").innerHTML = "Try guessing lower!";
				document.getElementById("triesLeft").innerHTML = guessesLeft;
			}
			

		}
		else
		{
			var snd = new Audio("right.mp3");
			snd.play();
			alert("You guessed the number! : " + num);
		}
	}
}
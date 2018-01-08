var timeLimit = 0;     
var timeInterval;
var imgFiles = 
{
	1: "images/i1.jpg",
	2: "images/i2.jpg",
	3: "images/i3.jpg",
	4: "images/i4.jpg",
	5: "images/i5.jpg",
	6: "images/i6.jpg",
	7: "images/i7.jpg",
	8: "images/i8.jpg",
	9: "images/i9.jpg",
	10: "images/i10.jpg",
	11: "images/i11.jpg",
	12: "images/i12.jpg"
}
var cardArray = [];
var cardFlipped = [];
var cardFlippedElement = [];

function getCardArray(level) 
{
	arr = [];
	for (var i = 1; i < level / 2 + 1; i++) 
	{
		arr.push(i);
		arr.push(i);
	}
	cardArray = shuffle(arr);
}

function newGame(level) 
{
	getCardArray(level);
	timeLimit = 15 * level / 2;
	var row =  4;
	var card = level / 4;
	var cardCounter = 0;
	var template = '';	
	for (var i = 0; i < row; i++) 
	{
		template += '<div class="row">';
		for (var j = 0; j < card; j++) 
		{
			var cardNum = cardArray[cardCounter];
			var imgURL = imgFiles[cardNum];
			template += '<div class="tile"';
			template += 'style="background: url(' + imgURL + ') no-repeat; "';
			template += 'onclick="flipTile(this,' + cardNum + ')"></div>';
			cardCounter++;
		}
		template += '</div>';
	}
	document.getElementById('game').innerHTML = template;
	if(level == 16)
		setTimeout(hideAllTile, 8000);
	if(level == 20)
		setTimeout(hideAllTile, 5000);
	if(level == 24)
		setTimeout(hideAllTile, 3000);
	clearInterval(timeInterval);
	setTimer()
}

function setTimer() 
{
	 timeInterval = setInterval(function () 
	 {
		 timeLimit--;
		 document.getElementById("timer").innerHTML = timeLimit + "s ";
		 if (timeLimit < 0) 
		 {
			 clearInterval(timeInterval);
			 document.getElementById("timer").innerHTML = "TIME OVER";
		 }
	 }, 1000);
}

function flipTile(tile, cardNumber) 
{
	if (cardFlipped.length < 2) 
	{
		var imgURL = imgFiles[cardNumber];
		tile.style.background = 'url(' + imgURL + ') no-repeat';
		cardFlipped.push(cardNumber);
		cardFlippedElement.push(tile);
		if (cardFlipped.length > 1) 
		{
			if (cardFlipped[0] == cardFlipped[1]) 
			{
			  cardFlippedElement[0].className = "tile-found";
			  cardFlippedElement[1].className = "tile-found";

				cardFlippedElement = [];
				cardFlipped = [];
			}
			else 
			{
				setTimeout(function () 
				{
					hideAllTile();
					cardFlippedElement = [];
					cardFlipped = [];
				}, 1700);
			}
		}
	}
}

function hideAllTile() 
{
	var tiles = document.getElementsByClassName('tile');
	for (var i = 0; i < tiles.length; i++) 
	{
		var item = tiles[i];
		item.style.background = 'black';
	}
}

function shuffle(array) 
{
	var currentIndex = array.length, temporaryValue, randomIndex;
	while (0 !== currentIndex) 
	{
		randomIndex = Math.floor(Math.random() * currentIndex);
		currentIndex -= 1;
		temporaryValue = array[currentIndex];
		array[currentIndex] = array[randomIndex];
		array[randomIndex] = temporaryValue;
	}
	return array;
}
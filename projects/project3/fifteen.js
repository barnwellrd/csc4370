(function()
{
	var state = 1;
	var newBackground = false;
	var game = document.getElementById('game');
	var imgFiles = 
	{
		0: "background.jpg",
		1: "background1.png",
		2: "background2.jpg",
		3: "background3.png"
	}
	randomNum = Math.floor(Math.random() * 4);
	solve();
	game.addEventListener('click', function(e)
	{
		if(state == 1)
		{
			game.className = 'animate';
			shift(e.target);
		}
	});
	document.getElementById('scramble').addEventListener('click', scramble);
	
	function solve()
	{
		if(state == 0)
		{
			return;
		}
		game.innerHTML = '';
		var n = 1;
		for(var i = 0; i <= 3; i++)
		{
			for(var j = 0; j <= 3; j++)
			{
				var cell = document.createElement('span');
				cell.id = 'cell-'+i+'-'+j;
				cell.style.left = (j*100)+'px';
				cell.style.top = (i*100)+'px';
				
				if(n <= 15)
				{
					cell.classList.add('number'+i+''+ j);
					cell.innerHTML = (n++).toString();
				} 
				else 
				{
					cell.className = 'empty';
				}
				cell.style.backgroundImage = 'url(\'' + imgFiles[randomNum] + '\')';
				cell.style.backgroundSize = '400px 400px';
				cell.style.backgroundRepeat = 'no-repeat';
				game.appendChild(cell);
			}
		}
	}

	function shift(cell)
	{
		if(cell.className != 'empty')
		{
			var empty = getEmptyAdj(cell);
			if(empty)
			{
				var tmp = {backgroundImage: cell.style.backgroundImage, 
				cssText: cell.style.cssText, id: cell.id,
				backgroundSize: cell.style.backgroundSize, 
				backgroundRepeat: cell.style.backgroundRepeat};
				cell.style.cssText = empty.style.cssText;
				cell.id = empty.id;
				empty.style.background = 'transparent';
				empty.style.cssText = tmp.cssText;
				empty.id = tmp.id;
				empty.style.cssText = tmp.cssText;
				empty.style.backgroundImage = tmp.backgroundImage;
				empty.style.backgroundSize = tmp.backgroundSize;
				empty.style.backgroundRepeat = tmp.backgroundRepeat;
				if(state == 1)
				{
					check();
				}
			}
		}
	}

	function getCell(row, col)
	{
		return document.getElementById('cell-'+row+'-'+col);
	}

	function getEmpty()
	{
		return game.querySelector('.empty');
	}

	function getEmptyAdj(cell)
	{
		var adj = getAdj(cell);
		for(var i = 0; i < adj.length; i++)
		{
			if(adj[i].className == 'empty')
			{
				return adj[i];
			}
		}
		return false;
	}

	function getAdj(cell)
	{
		var id = cell.id.split('-');
		var row = parseInt(id[1]);
		var col = parseInt(id[2]);
		var adj = [];
		if(row < 3)
		{
			adj.push(getCell(row+1, col));
		}			
		if(row > 0)
		{
			adj.push(getCell(row-1, col));
		}
		if(col < 3)
		{
			adj.push(getCell(row, col+1));
		}
		if(col > 0)
		{
			adj.push(getCell(row, col-1));
		}
		return adj;
	}

	function check()
	{
		if(getCell(3, 3).className != 'empty')
		{
			return;
		}
		var n = 1;
		for(var i = 0; i <= 3; i++)
		{
			for(var j = 0; j <= 3; j++)
			{
				if(n <= 15 && getCell(i, j).innerHTML != n.toString())
				{
					return;
				}
				n++;
			}
		}
		alert('You won!');
	}

	function scramble()
	{
		if(state == 0)
		{
			return;
		}
		game.removeAttribute('class');
		state = 0;
		var prev;
		var i = 1;
		var interval = setInterval(function()
		{
			if(i <= 100)
			{
				var adjacent = getAdj(getEmpty());
				if(prev)
				{
					for(var j = adjacent.length-1; j >= 0; j--)
					{
						if(adjacent[j].innerHTML == prev.innerHTML)
						{
							adjacent.splice(j, 1);
						}
					}
				}
				prev = adjacent[randomGen(0, adjacent.length-1)];
				shift(prev);
				i++;
			} 
			else 
			{
				clearInterval(interval);
				state = 1;
			}
		}, 5);
	}

	function randomGen(f, t)
	{
		return Math.floor(Math.random() * (t - f + 1)) + f;
	}
}());

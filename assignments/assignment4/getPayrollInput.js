function getInput() 
{
	var numEmp = 1;
	var isDone = false;
	var totalAll = 0;
	while(!isDone)
	{
		var txt;
		var input = prompt("Please enter hours worked for Employee " + numEmp + " or -1 to exit:");
		
		if (input == null  || input == "-1") 
		{
			alert("User cancelled the prompt.");
			if(numEmp == 1)
				document.getElementById("totalpay").innerHTML = "No data was entered. Try again.";
				
			isDone = true;
		} 
		else if(isNaN(input)|| input == "")
		{
			alert("Invalid input!");
		}
		else 
		{				
			var table = document.getElementById("payrollTable");
			var row = table.insertRow(numEmp);
			var cell1 = row.insertCell(0);
			var cell2 = row.insertCell(1);
			var cell3 = row.insertCell(2);
			var totalPay = 0;
			if(input < 40)
			{
				totalPay = 15 * input;
			}
			else
			{
				var regPay = 15 * 40;
				var overPay = ((input-40)*(15*1.5));
				totalPay = regPay + overPay;
			}
			totalAll += totalPay;
			cell1.innerHTML = numEmp;
			cell2.innerHTML = input;
			totalPay = "$" + totalPay.toFixed(2);
			cell3.innerHTML = totalPay;
			numEmp++;
			
		}
		
	}
	if(numEmp > 1)
	{
		document.getElementById("button1").style.visibility = "hidden";
		document.getElementById("totalpay").innerHTML = "Total pay for all employees: $" + totalAll.toFixed(2);
	}
}
<?php
	function connect_db(){
		$mysqli=new mysqli(
							"localhost",
							"admin",
							"1234",
							"order");
		return $mysqli;
	}
	function createOrder($name="",$item="",$amount=""){
		$mysqli=connect_db();
		$mysqli->query("INSERT INTO orders
						(NAME,ITEM,AMOUNT)
						VALUES
						('$name','$item','$amount')
						");
	}
	function showOrders(){
		$mysqli=connect_db();
		$result=$mysqli->query("
						SELECT NAME,ITEM,AMOUNT
						FROM orders");
		$rows=$result->fetch_assoc();
		do
		{
			echo "<p>Name: <b>".$rows['NAME']."</b></p>";
			echo "<p>Item: <b>".$rows['ITEM']."</b></p>";
			echo "<p>Amount: <b>".$rows['AMOUNT']."</b></p>";
			echo "<hr />";
		}
		while($rows=$result->fetch_assoc());
	}
?>
<body> 
<form method="POST" action="">

     Inter name: <input type="text" name="name">
     <br>
<SELECT NAME="tovar">
        <OPTION VALUE="1" SELECTED>paper
        <OPTION VALUE="2">pen
        <OPTION VALUE="3">pencil
</SELECT>
<input type="number" min="0" max="10" step="1" name="colums">
<br>
     <input type="submit" name="okbutton" value="OK">
<?php
	createOrder($_POST[name],$_POST[tovar],$_POST[colums],$_POST[text]);
	showOrders();
?>
</body>
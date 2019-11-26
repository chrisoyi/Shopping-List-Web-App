<?php 
	$title = "Chris Oyi - Shopping Lists";
	include '_top.php';
?>
<h1><?php echo $title; ?></h1>

<?php
	
	
	$text = file_get_contents('data.txt');
	//print_r($text);
	$lines = explode("\n", $text);
	//print_r($lines);
	$bill = 0;
	echo "<table>";
	foreach($lines as $i)  {
		$fields = explode("|",$i);
		echo "<tr>";
		echo "<td>".$fields[0]."</td>";
		echo "<td>".$fields[1]."</td>";
		echo "<td>\$".$fields[2]."</td>";
		echo "<td>".$fields[3]."x</td>";
		$total = floatval($fields[2]) * floatval($fields[3]);
        $bill += $total;
		echo "<td>\$".$total.".00</td>";
		echo "</tr>";

	}
	echo "</table>";
    echo "<h4> TOTAL: $$bill.00</h4>"	
	
?>

<?php 
	include '_bottom.php';
?>
<!DOCTYPE html>
<html>
	<head></head>
	<body>
	<table>
	<?php
		echo "<h1>Multiplication Table</h1>";
		for($i = 1 ; $i <= 10 ; $i++)
		{
			echo "<tr>";
			for($j = 1; $j <= 10 ; $j++)
			{
				echo "<td>".($i * $j)."</td>";	
			}		
			echo "</tr>";
		}	
	?>
	</table>
	</body>
</html>

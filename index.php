<?php
include_once('board.php');
$board = new board;
$board->solve($board->board);


?>

<!doctype html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <h5>sudoku solver </h1>

    <table id="sudoku">
	<tbody>
        <?php foreach($board->board as $row):?>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
        <?php endforeach?>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
		<tr>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
			<td><input type="text" /></td>
		</tr>
	</tbody>
</table>

</body>
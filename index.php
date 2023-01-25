<?php
include_once('board.php');
$board = new board;

if (isset ($_POST)){
    $board->SetAndRun();
}


?>

<!doctype html>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <h>sudoku solver </h1>
    <form action="index.php" method="post">
    <table id="sudoku">
	<tbody>
        
        <?php for($row=0;$row<=8;$row++):?>
		<tr>
            <?php for($col=0;$col<=8;$col++):?>
            <td>
                <input type="text" name=<?=$row.$col?> 
                value= "<?php if(isset($_POST['go']) && (count($board->solvedBoard)>0)){
                    echo $board->solvedBoard[$row][$col];
                }else
                if ($board->board[$row][$col]!==0) {
                echo $board->board[$row][$col];
                }?>
                "/>
            
            </td>
            <?php endfor?>
		</tr>
        <?php endfor?>
		
	</tbody>
</table>
<input type="submit" value="Go!" name="go">
</form>

</body>
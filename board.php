<?php

class Board
{
    public $board =  //populate with your data 
    //enter 0 if field is empty
    [
        [2, 4, 7,   0, 9, 1,  0, 6, 8],
        [1, 0, 5,   7, 6, 0,  3, 0, 0],
        [8, 6, 0,   4, 0, 0,  0, 0, 7],

        [9, 0, 0,   2, 0, 6,  0, 0, 0],
        [0, 0, 0,   9, 4, 7,  6, 8, 0],
        [6, 0, 4,   0, 5, 0,  0, 1, 9],

        [7, 0, 0,   0, 3, 0,  9, 2, 0],
        [4, 0, 9,   6, 0, 0,  0, 0, 0],
        [0, 0, 0,   0, 0, 0,  4, 0, 3],
    ];

    public $solvedBoard = array();


    function showTable($solvedboard, $board)
    {

        for ($row = 0; $row <= 8; $row++) {
            for ($col = 0; $col <= 8; $col++) {
               
                if ($this->board[$row][$col] !== 0) {
                    echo '<span style="color: red;">'.$this->board[$row][$col].'</span>';
                } else{
                    echo $solvedboard[$row][$col];
                }

                if ($col==2||$col ==5){
                    echo' &nbsp &nbsp&nbsp   ';
                }

            }
            echo '<br>';
        }
    }

    function solve($board)
    {
        include 'helpers.php';
       
        $row = $FirstEmptyCell($board)['row'];
        $col = $FirstEmptyCell($board)['col'];
        $legalMoves = $legalMoves($board, $row, $col);

        if (count($legalMoves) !== 0) {
            foreach ($legalMoves as $legalMove) {
                $board[$row][$col] = $legalMove;

                $solved = $isItSolved($board);
                if ($solved == false) {
                    $this->solve($board);
                } else {

                    $this->solvedBoard = $board;
                    break;
                };
            }
        }
    }
}



$board = new board;
$board->solve($board->board);
$board->showTable($board->board, $board->solvedBoard);



?>


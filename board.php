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

    public $solvedBoard = [];


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

    function checkData($board)
    {
        include 'helpers.php';
        $board = $this->board;
        for ($row = 0; $row <= 8; $row++) {
            for ($col = 0; $col <= 8; $col++) {

                if ($board[$row][$col]!==0){
                $board[$row][$col]=0;

                if (in_array($this->board[$row][$col], $legalMoves($board, $row, $col))){
                    
                    $board[$row][$col]=$this->board[$row][$col];
                    continue;
                }else 
                echo "enter valid data, look at row". ($row+1) ."  col ". ($col+1).", - value ". $this->board[$row][$col]. "is impossible. <br>";
                return false;
            }
                
            }
     
        }
        
        $this->solve($this->board);
        return true;
    }


    function setAndRun()
    {
        if (isset($_POST['go'])) {
            foreach ($_POST as $key => $value) {
                $value = intval($value);

                if ($key !== 'go') {
                    $cell = (str_split($key));
                    $row = $cell[0];
                    $col = $cell[1];

                    $this->board[$row][$col] = $value;
                }
            }
            var_dump($this->checkData($this->board));
        }
    }
}

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

    function setAndRun(){ 
        if(isset($_POST['go'])){
            foreach ($_POST as $key => $value){
                $value=intval($value);

                if ($key!=='go'){
                $cell=(str_split($key));
                $row= $cell[0];
                $col=$cell[1];

                $this->board[$row][$col]= $value;              
                }
             
            }


        ($this->solve($this->board));
        } 

    function CheckData($board){
        //check if inputs are valid
        //check if there is any empty inputs // to be coded
    }

    }



}

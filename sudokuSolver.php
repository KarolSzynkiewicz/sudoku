<?php
$board=  //populate with your data //enter 0 if field is empty
[
[0,9,3,   5,0,8,  7,0,4],
[0,6,0,   0,0,2,  5,1,0],
[0,0,0,   0,0,7,  0,0,0],

[0,1,2,   7,0,0,  0,0,0],
[0,4,0,   0,0,0,  0,3,0],
[3,5,0,   2,0,0,  0,0,7],

[0,8,0,   0,0,3,  0,0,0],
[0,0,0,   0,0,1,  9,0,0],
[0,0,5,   9,2,0,  1,0,0],
];
$initialBoard=$board;



function showTable($board) //prints the table
{ 
    for ($row=0; $row<=8; $row++) {
        for ($col=0;$col<=8;$col++) {
            echo $board[$row][$col];
        }
        echo '<br>';
    } ;
}

function FindFirstEmptyCel($board){ 
    
        for ($row=0; $row<=8; $row++) 
        {
            for ($col=0;$col<=8;$col++) 
            {
                if ($board[$row][$col]==0) {
                    return ([$row,$col]);
                };
            }
        }
    }

function CheckLegalMoves($board, $row, $col){
    
    $usedInTheRow=$board[$row];
    $usedInTheCol=array_column($board, $col);
    
    $squareStartRow= $row-$row%3;
    $squareStartCol= $col-$col%3;

    $usedinTheSquare= 
    [
        $board[$squareStartRow][$squareStartCol],
        $board[$squareStartRow][$squareStartCol+1],
        $board[$squareStartRow][$squareStartCol+2],

        $board[$squareStartRow+1][$squareStartCol],
        $board[$squareStartRow+1][$squareStartCol+1],
        $board[$squareStartRow+1][$squareStartCol+2],

        $board[$squareStartRow+2][$squareStartCol],
        $board[$squareStartRow+2][$squareStartCol+1],
        $board[$squareStartRow+2][$squareStartCol+2],
    ];

    $options= [1,2,3,4,5,6,7,8,9];
            $illegalMoves= array_unique (array_merge ($usedinTheSquare, $usedInTheCol,$usedInTheRow));
            $legalMoves = array_diff($options, $illegalMoves);
            return $legalMoves;
        
};
function isAnycellEmpty($board){
    for ($row=0; $row<=8; $row++){
        for ($col=0;$col<=8;$col++){
            if ($board[$row][$col]==0 ){
                return false;
            } 
            if ($board[$row][$col]!==0 && $row== 8 && $col == 8){
                return true;
            }
        }        
    }
};
   
function InsertValue($board)
{
    $cell= FindFirstEmptyCel($board);
    $row  = $cell[0];
    $col  =$cell[1];


    $legalMoves= checkLegalMoves($board, $row, $col, );

    if (count($legalMoves) !== 0) {
        foreach ($legalMoves as $legalMove) {
            $board[$row][$col]=$legalMove;

            $solved= isAnycellEmpty($board);
            if ($solved == false) {
                InsertValue($board);
            } else {
                echo
            "rozwiązanie <br>";
            showTable($board) ;
            
            }
            ;
        }
    }
}

InsertValue($board);




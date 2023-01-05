<?php 

class Board{
    public $board= //populate with your data enter 0 if field is empty
    [
        [0,0,0,   2,6,0,  7,0,1],
        [6,8,0,   0,7,0,  0,9,0],
        [1,9,0,   0,0,4,  5,0,0],
       
        [8,2,0,   1,0,0,  0,4,0],
        [0,0,4,   6,0,2,  9,0,0],
        [0,5,0,   0,0,3,  0,2,8],
        
        [0,0,9,   3,0,0,  0,7,4],
        [0,4,0,   0,5,0,  0,3,6],
        [7,0,3,   0,1,8,  0,0,0],
    ];
    function checkIfEmpty($row,$col){
        if ($this->board[$row][$col]==0){
            return true;
        } else return false;
    }

    function checkRow($row,$col){
        $usedInTheRow=$this->board[$row];
        return $usedInTheRow;  //returns array 
    }
    
    function checkCol($row,$col){
        $usedInTheCol=array_column($this->board, $col);
        return $usedInTheCol;
    }
    function checkSquare($row, $col){
        $squareStartRow= $row-$row%3;
        $squareStartCol= $col-$col%3;
    
        $usedinTheSquare= [
            $this->board[$squareStartRow][$squareStartCol],
            $this->board[$squareStartRow][$squareStartCol+1],
            $this->board[$squareStartRow][$squareStartCol+2],

            $this->board[$squareStartRow+1][$squareStartCol],
            $this->board[$squareStartRow+1][$squareStartCol+1],
            $this->board[$squareStartRow+1][$squareStartCol+2],

            $this->board[$squareStartRow+2][$squareStartCol],
            $this->board[$squareStartRow+2][$squareStartCol+1],
            $this->board[$squareStartRow+2][$squareStartCol+2],
        ];


        return $usedinTheSquare;

    }

    function checkLegalMoves($row, $col)
    {
        if ($this->checkIfEmpty($row, $col)==true){
            $options= [1,2,3,4,5,6,7,8,9];


            $illegalCol= $this->checkCol($row, $col);
            $illegalRow= $this->checkRow($row, $col);
            $illegalSquare=$this->checkSquare($row, $col);

            $illegalMoves= array_unique (array_merge ($illegalCol, $illegalRow,$illegalSquare));
            $legal = array_diff($options, $illegalMoves);
            return $legal;
        };
    }   

    function WriteIfCertain($row, $col){  
        $legal= $this-> checkLegalMoves($row, $col);
    if ($legal!==null) {
    $legal=array_values($legal);// resets the index

    if (sizeof($legal)==1) {
        $this->board[$row][$col]= $legal[0];
    }
    }
    }

    function checkTheBoard(){
        for ($row=0;$row<=8;$row++){
            for ($col=0;$col<=8;$col++){
        
                $this->WriteIfCertain($row,$col);
            }
            
        }

    
    }

}

$board= new Board;

//$board->WriteIfCertain(6,4);
$board->checkTheBoard();
$board->checkTheBoard();

for ($row=0;$row<=8;$row++){
    for ($col=0;$col<=8;$col++){

        echo " __ ".$board->board[$row][$col]." __ ";
    }
    
    echo '<br>';
}



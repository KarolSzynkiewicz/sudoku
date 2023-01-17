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

    public $newBoard = array();

//    public function __consturct($board, $newBoardName){
//       echo "Powstał nowy obiekt $newBoardName";
//        $this->board=$board;
//        $this->board[$newBoardName[0]][$newBoardName[1]]=$newBoardName[2];
//
//     }

    function showTable($boardParam){
        $this->newBoard=$boardParam;
        for ($row=0; $row<=8; $row++){
            for ($col=0;$col<=8;$col++){
                echo $this->newBoard[$row][$col];
            }
            echo '<br>';
        }
    }

    function FindFirstEmpty($boardParam){
        $this->newBoard=$boardParam;
        for ($row=0; $row<=8; $row++){
            for ($col=0;$col<=8;$col++){
                if ($this->newBoard[$row][$col]==0){
                    return (['row'=>$row,'col'=>$col]);
                };
            }
           
        }
    }

    function checkRow($row,$col){
        $usedInTheRow=$this->board[$row];
        return [$usedInTheRow, $row, $col];  //returns array 
    }
    
    function checkCol($row,$col){
        $usedInTheCol=array_column($this->board, $col);
        return [$usedInTheCol, $row, $col];
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


        return [$usedinTheSquare, $row, $col];

    }

    function checkLegalMoves($row, $col)
    {
        
            $options= [1,2,3,4,5,6,7,8,9];

            $illegalCol= $this->checkCol($row, $col);
            $illegalCol= $illegalCol[0];
            $illegalRow= $this->checkRow($row, $col);
            $illegalRow= $illegalRow[0];
            $illegalSquare=$this->checkSquare($row, $col);
            $illegalSquare= $illegalSquare[0];

            $illegalMoves= array_unique (array_merge ($illegalCol, $illegalRow,$illegalSquare));
            $legal = array_diff($options, $illegalMoves);
            return [$legal, $row, $col]; // returns array of legal moves for $row $col position.
        
    
    }
    function newBoard($board){
        $cell=$this->FindFirstEmpty($this->board);
    } 
    
}

$board= new Board() ;
var_dump( $board->FindFirstEmpty($board->board));



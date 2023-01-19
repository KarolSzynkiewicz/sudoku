<?php 
//remade in procedural - sudokusolver.php


class Board{
    public $board=  //populate with your data 
                    //enter 0 if field is empty
    [
        [1,0,0,   0,8,0,  0,0,9],
        [0,5,0,   6,0,1,  0,2,0],
        [0,0,0,   5,0,3,  0,0,0],
       
        [0,9,6,   1,0,4,  8,3,0],
        [3,0,0,   0,6,0,  0,0,5],
        [0,1,5,   9,0,8,  4,6,0],
        
        [0,0,0,   7,0,5,  0,0,0],
        [0,8,0,   3,0,9,  0,7,0],
        [5,0,0,   0,1,0,  0,0,3],
    ];

    public $newBoard = array(); // to be populated basing on oryginal board


    function showTable($board){ //shows table form param
        $this->newBoard=$board;
        for ($row=0; $row<=8; $row++){
            for ($col=0;$col<=8;$col++){
                echo $this->newBoard[$row][$col];
            }
            echo '<br>';
        } 
        
    }

    function FindFirstEmpty($board){
    if ($this->isItSolved($board)==false) 
    {
        for ($row=0; $row<=8; $row++) 
        {
            for ($col=0;$col<=8;$col++) 
            {
                if ($this->newBoard[$row][$col]==0) {
                    return ([$row,$col]);
                };
            }
        }
    } else $this->showTable($this->newBoard);
    }

    function checkRow($row,$col,$board){

        $usedInTheRow=$this->newBoard[$row];
        return $usedInTheRow;   
    }
    
    function checkCol($row,$col,$board){

        $usedInTheCol=array_column($this->newBoard, $col);
        return $usedInTheCol;
    }
    function checkSquare($row, $col,$board){

        $squareStartRow= $row-$row%3;
        $squareStartCol= $col-$col%3;
    
        $usedinTheSquare= [
            $this->newBoard[$squareStartRow][$squareStartCol],
            $this->newBoard[$squareStartRow][$squareStartCol+1],
            $this->newBoard[$squareStartRow][$squareStartCol+2],

            $this->newBoard[$squareStartRow+1][$squareStartCol],
            $this->newBoard[$squareStartRow+1][$squareStartCol+1],
            $this->newBoard[$squareStartRow+1][$squareStartCol+2],

            $this->newBoard[$squareStartRow+2][$squareStartCol],
            $this->newBoard[$squareStartRow+2][$squareStartCol+1],
            $this->newBoard[$squareStartRow+2][$squareStartCol+2],
        ];


        return $usedinTheSquare;

    }

    function checkLegalMoves($row, $col, $board)
    {

            $options= [1,2,3,4,5,6,7,8,9];

            $illegalCol= $this->checkCol($row, $col, $board);
            $illegalRow= $this->checkRow($row, $col, $board);
            $illegalSquare=$this->checkSquare($row, $col, $board);

            $illegalMoves= array_unique (array_merge ($illegalCol, $illegalRow,$illegalSquare));
            $legal=array();
            $legal = array_diff($options, $illegalMoves);
            return $legal; // returns array of legal moves
        
    }

    function isItSolved ($board) {
        
        for ($row=0; $row<=8; $row++){
            for ($col=0;$col<=8;$col++){
                if ($this->newBoard[$row][$col]==0 ){
                    return false;
                } 
                if ($this->newBoard[$row][$col]!==0 && $row== 8 && $col == 8){
                    return true;
                }
            }        
        }
    }

    function newBoard($board){
        if (count($this->newBoard)==0){$this->newBoard=$this->board;}
        //if newboard is invalid we have to compare newboard to board and check what was the last digit we entered. Than we have to erse the last entered digit and run the function again, but with one less possible value...

        $cell= $this->FindFirstEmpty($this->newBoard);
        $row  = $cell[0];
        $col  =$cell[1];
        echo "first empty cell found at $row, $col <br>";

        $legalMoves= $this->checkLegalMoves($row, $col, $board);
        if (count($legalMoves) == 0)
        {
            echo 'there is no legal moves <br>';
            $this->newBoard[$row][$col]='X';
            $this->showTable($this->newBoard);

            }else {
            echo 'I have checked the legal moves:<br>';
            var_dump($legalMoves);
            }
            echo '<hr>';
        
        foreach ($legalMoves as $legalMove)
        {
            if ($legalMove=='X'){
                $this->newBoard[$row][$col]='X';
                $this->showTable($this->newBoard);

            }
            echo "podstawiamy $legalMove pod $row, $col <br><br>";
            
            $this->newBoard[$row][$col]=$legalMove;
            $this->showTable($this->newBoard);

            
            $solved= $this->isItSolved($this->newBoard);
            echo "<br>sprawdzamy czy jest to ostatnia liczba- czyli czy sudoku jest rozwiazane- ";
            if ($solved == false){
                echo 'nie <hr>';
                $this->newBoard($this->newBoard);
            } else echo 'tak <br>' ;

        }

    } 
    
}

$board= new Board() ;
echo "<h1> starting with</h1>";
$board->showTable($board->board);
echo '<hr>';

$board->newBoard($board->board);




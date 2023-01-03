<?php
class Board 
{
    public $squares=array();
    public $rows = array(1,2,3,4,5,6,7,8,9);
    public $cols= array('a','b','c','d','e','f','g','h','i');


    function __construct() // prepares the squares array
    {
        $this->squares= array();
    
        foreach ($this->rows as $row)

        {
            for ($i=0;$i<=8;$i++)
            {
                $this->squares [$row.$this->cols[$i]]=null;
            }
        }   

    }

    function set($row, $col, $value)
    {
        $position= $row.$col;
        $this->squares[$position]=$value;
    }     

}

$board= new Board; 
$board->set(1,'a',5);
var_dump($board);

require 'Print.php';
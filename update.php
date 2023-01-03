<?php 
include 'board.php';

    foreach ($_POST as $cell=>$value){
        $board->squares[$cell]= $value;
    }

include 'print.php';


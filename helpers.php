<?php


$FirstEmptyCell = function ($board) {

for ($row = 0; $row <= 8; $row++) {
    for ($col = 0; $col <= 8; $col++) {
        if ($board[$row][$col] == 0) {
            return (['row' => $row, 'col' => $col]);
        };
    }
}
};



$legalMoves = function ($board, $row, $col) {

$usedInTheRow = $board[$row];
$usedInTheCol = array_column($board, $col);

$squareStartRow = $row - $row % 3;
$squareStartCol = $col - $col % 3;

$usedinTheSquare =
    [
        $board[$squareStartRow][$squareStartCol],
        $board[$squareStartRow][$squareStartCol + 1],
        $board[$squareStartRow][$squareStartCol + 2],

        $board[$squareStartRow + 1][$squareStartCol],
        $board[$squareStartRow + 1][$squareStartCol + 1],
        $board[$squareStartRow + 1][$squareStartCol + 2],

        $board[$squareStartRow + 2][$squareStartCol],
        $board[$squareStartRow + 2][$squareStartCol + 1],
        $board[$squareStartRow + 2][$squareStartCol + 2],
    ];

$options = [1, 2, 3, 4, 5, 6, 7, 8, 9];
$illegalMoves = array_unique(array_merge($usedinTheSquare, $usedInTheCol, $usedInTheRow));
$legalMoves = array_diff($options, $illegalMoves);
return $legalMoves;
};



$isItSolved = function ($board) {
for ($row = 0; $row <= 8; $row++) {
    for ($col = 0; $col <= 8; $col++) {

        if ($board[$row][$col] == 0) {
            return false;
        }
        if ($board[$row][$col] !== 0 && $row == 8 && $col == 8) {
            return true;
        }
    }
}
};

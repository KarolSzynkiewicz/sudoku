
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>SUDOKU</title>
    <br>
   

  </head>
  <body>
 
<div class="container ">
    <h1>sudoku</h1>

    <form action="update.php" method="post">

    <table class="table table table-bordered ">
    <?php foreach ($board->cols as $col) : ?>
    <tr>
    <?php foreach ($board->rows as $row) : ?>
        <th  class="bacground-gray " style=" width: 40; padding-0; height: 50; 
        <?php if ($row>=4&&$row<=6||$col=='d'||$col=='e'||$col=='f')
        {
            echo 'background-color:#dbdbdb;';
        }
        ?>
        ">
        <input type='text' style=" width: 40; padding-0; height: 40;" name='<?=$row.$col?>'  
        value='<?php if (isset ($board->squares[$row.$col])) {
    echo $board->squares[$row.$col];}?>'>
        </th>
    <?php endforeach;?>
    </tr>
    <?php endforeach;?>
  
    </table>
    <input type="submit" value="Submit">
    </form>
    solve
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
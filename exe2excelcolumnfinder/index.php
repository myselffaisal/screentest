<?php

require_once __DIR__ . "/vendor/autoload.php";

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
        <h1>Excel column finder</h1>
        <form method="POST" action="/">
            <div class="form-row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Start" name="start" value="<?php echo $_POST['start'];?>">
                </div>
                <div class="col">
                    <input type="number" class="form-control" placeholder="Rows" name="row" value="<?php echo $_POST['row']; ?>">
                </div>
                <div class="col">
                    <input type="number" class="form-control" placeholder="Cols" name="col" value="<?php echo $_POST['col']; ?>">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
        <?php
            if (isset($_POST['start'], $_POST['row'], $_POST['col'])) {
                $start = $_POST['start'];
                $col = $_POST['col'];
                $row = $_POST['row'];
                if (preg_match("/^[A-Z]+$/", $start)) {
                    ?>
                    <table>
                    <?php
                    $point = \app\App::LettersToNum($start);
                    for($i = 1; $i <= $row; $i++) {
                        ?>
                        <tr>
                        <?php
                        for ($j = 1; $j <= $col; $j++) {
                            echo "<td><span class='badge badge-secondary'>".\app\App::NumToLetters($point)."</span></td>";
                            $point++;
                        }
                        ?>
                        </tr>
                        <?php
                    }
                    ?>
                    </table>
                    <?php
                }
            }
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
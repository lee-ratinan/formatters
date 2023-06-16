<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Formatters Test">
        <meta name="author" content="Ratinan Lee">
        <title>Phone · Formatters</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $page = 'index';
        include_once '_nav.php';
        include_once '../src/format_phone.php';
        ?>
        <div class="container mb-3">
            <div class="row">
                <div class="col">
                    <h1>Formatter Functions</h1>
                    <ul>
                        <li><a href="distance.php">Distance</a></li>
                        <li><a href="length.php">Length</a></li>
                        <li><a href="currency.php">Currency</a></li>
                        <li><a href="number.php">Number</a></li>
                        <li><a href="date_time.php">Date-Time</a></li>
                        <li><a href="address.php">Address</a></li>
                        <li><a href="phone.php">Phone</a></li>
                        <li><a href="masking.php">Masking</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
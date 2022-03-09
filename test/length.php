<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Length · Formatters</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $page = 'length';
        include_once '_nav.php';
        include_once '../src/format_length.php';
//        $convert = convert_length('M', 1.73);
//        var_dump($convert);
//        echo '<br><br>';
//        $convert = convert_length('FT', 2.73);
//        var_dump($convert);
        $func = filter_input(INPUT_POST, 'func', FILTER_SANITIZE_STRING);
        $from_unit = filter_input(INPUT_POST, 'from_unit', FILTER_SANITIZE_STRING);
        $from_length = filter_input(INPUT_POST, 'from_length');
//        $to_unit = filter_input(INPUT_POST, 'to_unit', FILTER_SANITIZE_STRING);
//        $unit = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_STRING);
//        $mode = filter_input(INPUT_POST, 'mode', FILTER_SANITIZE_STRING);
//        $distance = filter_input(INPUT_POST, 'distance');
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Length</h1>
                    <h2>1. convert_length()</h2>
                    <p>
                        Convert length - between metric and imperial<br>
                        @param string $from_unit Unit of the length, either centimeter (CM), meter (M), foot (FT), or inch (IN)<br>
                        @param float $from_length Length in the $from_unit<br>
                        @return array Length in the 4 units: centimeter (CM), meter (M), foot (FT), inch (IN), along with the metric (M/CM) and imperial (FT/IN) combinations
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                convert_length(
                            </div>
                            <div class="col">
                                <select name="from_unit" class="form-control form-control-sm" required>
                                    <option disabled>(from_unit)</option>
                                    <option value="CM" <?= ('CM' == $from_unit ? 'selected':'') ?>>CM (centimeter; metric</option>
                                    <option value="M" <?= ('M' == $from_unit ? 'selected':'') ?>>M (meter; metric)</option>
                                    <option value="IN" <?= ('IN' == $from_unit ? 'selected':'') ?>>IN (inch; imperial)</option>
                                    <option value="FT" <?= ('FT' == $from_unit ? 'selected':'') ?>>FT (foot; imperial)</option>
                                    <option value="XX" <?= ('XX' == $from_unit ? 'selected':'') ?>>(invalid input)</option>
                                </select>
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="from_length" type="number" step="0.01" min="0.01" value="<?= $from_length ?>" placeholder="(from_length)" required />
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="convert_length" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('convert_length' == $func) : ?>
                        <h3>Result</h3>
                        <?php
                        $converted = convert_length($from_unit, $from_length);
                        ?>
                        <ul>
                            <li><code>convert_length(<?= $from_unit ?>, <?= $from_length ?>);</code></li>
                            <li>Converting from <?= $from_length ?> <?= $from_unit ?>:</li>
                            <li>Returns<ul>
                                <?php foreach ($converted as $key => $val) : ?>
                                <li><?= $key ?>: <code><?= $val ?></code></li>
                                <?php endforeach; ?>
                            </ul></li>
                        </ul>
                    <?php endif; ?>
                    <h2>2. format_length()</h2>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
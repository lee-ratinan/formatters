<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Distances · Formatters</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $page = 'distance';
        include_once '_nav.php';
        include_once '../src/format_distance.php';
        $func = filter_input(INPUT_POST, 'func', FILTER_SANITIZE_STRING);
        $from_unit = filter_input(INPUT_POST, 'from_unit', FILTER_SANITIZE_STRING);
        $unit = filter_input(INPUT_POST, 'unit', FILTER_SANITIZE_STRING);
        $mode = filter_input(INPUT_POST, 'mode', FILTER_SANITIZE_STRING);
        $from_distance = filter_input(INPUT_POST, 'from_distance');
        $distance = filter_input(INPUT_POST, 'distance');
        ?>
        <div class="container mb-3">
            <div class="row">
                <div class="col">
                    <h1>Distance</h1>
                    <h2>1. convert_distance()</h2>
                    <p>
                        Convert distance - between kilometers (KM) and miles (MI)<br>
                        @param float $from_distance Distance in the $from_unit<br>
                        @param string $from_unit Unit of the distance, either KM or MI<br>
                        @return array Distances in both kilometers and miles, empty array if error
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                convert_distance(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="from_distance" type="number" step="0.01" min="0.01" value="<?= $from_distance ?>" placeholder="(from_distance)" required />
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <select name="from_unit" class="form-control form-control-sm" required>
                                    <option disabled>(from_unit)</option>
                                    <option value="KM" <?= ('KM' == $from_unit ? 'selected':'') ?>>KM (metric; kilometer)</option>
                                    <option value="MI" <?= ('MI' == $from_unit ? 'selected':'') ?>>MI (imperial; mile)</option>
                                    <option value="XX" <?= ('XX' == $from_unit ? 'selected':'') ?>>(invalid input)</option>
                                </select>
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="convert_distance" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('convert_distance' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>convert_distance(<?= $from_distance ?>, '<?= $from_unit ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(convert_distance($from_distance, $from_unit)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                    <h2>2. format_distance()</h2>
                    <p>
                        Format the distance<br>
                        @param float $distance The distance to format<br>
                        @param string $unit The unit of the distance, either KM or MI<br>
                        @param string $mode The mode of the unit, either S (short) or L (long)<br>
                        @return string The formatted distance, empty string if error
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_distance(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="distance" type="number" step="0.01" placeholder="(distance)" value="<?= $distance ?>" required />
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <select name="unit" class="form-control form-control-sm" required>
                                    <option disabled>(unit)</option>
                                    <option value="MI" <?= ('MI' == $unit ? 'selected':'') ?>>MI (imperial; mile)</option>
                                    <option value="KM" <?= ('KM' == $unit ? 'selected':'') ?>>KM (metric; kilometer)</option>
                                    <option value="XX" <?= ('XX' == $unit ? 'selected':'') ?>>(invalid input)</option>
                                </select>
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <select name="mode" class="form-control form-control-sm" required>
                                    <option disabled>(mode)</option>
                                    <option value="S" <?= ('S' == $mode ? 'selected':'') ?>>S (short)</option>
                                    <option value="L" <?= ('L' == $mode ? 'selected':'') ?>>L (long)</option>
                                    <option value="X" <?= ('X' == $mode ? 'selected':'') ?>>(invalid input)</option>
                                </select>
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_distance" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_distance' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_distance(<?= $distance ?>, '<?= $unit ?>', '<?= $mode ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_distance($distance, $unit, $mode)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
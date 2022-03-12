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
        $func = filter_input(INPUT_POST, 'func', FILTER_SANITIZE_STRING);
        $from_unit = filter_input(INPUT_POST, 'from_unit', FILTER_SANITIZE_STRING);
        $from_length = filter_input(INPUT_POST, 'from_length');
        $cm = filter_input(INPUT_POST, 'cm');
        $in = filter_input(INPUT_POST, 'in');
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Length</h1>
                    <h2>1. convert_length()</h2>
                    <p>
                        Convert length - between metric and imperial<br>
                        @param float $from_length Length in the $from_unit<br>
                        @param string $from_unit Unit of the length, either centimeter (CM), meter (M), foot (FT), or inch (IN)<br>
                        @return array Length in the 4 units: centimeter (CM), meter (M), foot (FT), inch (IN), along with the metric (M/CM) and imperial (FT/IN) combinations
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                convert_length(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="from_length" type="number" step="0.01" min="0.01" value="<?= $from_length ?>" placeholder="(from_length)" required />
                            </div>
                            <div class="col">,</div>
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
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="convert_length" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('convert_length' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>convert_length(<?= $from_length ?>, '<?= $from_unit ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(convert_length($from_length, $from_unit)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                    <h2>2. format_length_metric()</h2>
                    <p>
                        Format the length in centimeters into # m. ## cm. format<br>
                        @param float|int $cm The length in centimeters<br>
                        @return string The formatted length
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_length_metric(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="cm" type="number" step="0.01" min="0.01" value="<?= $cm ?>" placeholder="(cm)" required />
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_length_metric" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_length_metric' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_length_metric(<?= $cm ?>);</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_length_metric($cm)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                    <h2>3. format_length_imperial()</h2>
                    <p>
                        Format the length in inches into ##’ ##” format<br>
                        @param float|int $in The length in inches<br>
                        @return string The formatted length
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_length_imperial(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="in" type="number" step="0.01" min="0.01" value="<?= $in ?>" placeholder="(in)" required />
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_length_imperial" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_length_imperial' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_length_imperial(<?= $in ?>);</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_length_imperial($in)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
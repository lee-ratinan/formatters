<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Formatters Test">
        <meta name="author" content="Ratinan Lee">
        <title>Number · Formatters</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $page = 'number';
        include_once '_nav.php';
        include_once '../src/format_number.php';
        $amount         = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_STRING);
        $system         = filter_input(INPUT_POST, 'system', FILTER_SANITIZE_STRING);
        $indian_amount  = filter_input(INPUT_POST, 'indian_amount', FILTER_SANITIZE_STRING);
        $decimal_places = filter_input(INPUT_POST, 'decimal_places', FILTER_SANITIZE_STRING);
        ?>
        <div class="container mb-3">
            <div class="row">
                <div class="col">
                    <h1>Number</h1>
                    <h2 id="retrieve_available_numeral_systems">1. retrieve_available_numeral_systems()</h2>
                    <p>
                        Return the list of supported numeral systems<br>
                        @return array The list of supported numeral systems
                    </p>
                    <h3>Result</h3>
                    <code><pre><?php print_r(retrieve_available_numeral_systems()) ?></pre></code>
                    <hr>
                    <h2 id="format_other_numeral_systems">2. format_other_numeral_systems()</h2>
                    <p>
                        Return the number in the new numeral system<br>
                        @param string $number The number (in string) to format<br>
                        @param string $system The numeral system<br>
                        @return string The number in the numeral system specified by $system, empty string if error
                    </p>
                    <h3>Test:</h3>
                    <form method="POST" action="number.php#format_other_numeral_systems">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_other_numeral_systems(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="amount" type="text" placeholder="(amount)" value="<?= $amount ?>" required />
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <select name="system" class="form-control form-control-sm" required>
                                    <option disabled>(system)</option>
                                    <?php foreach (retrieve_available_numeral_systems() as $s) : ?>
                                        <option value="<?= $s ?>" <?= ($s == $system ? 'selected':'') ?>><?= $s ?></option>
                                    <?php endforeach; ?>
                                    <option value="XX" <?= ('XX' == $system ? 'selected':'') ?>>(invalid input)</option>
                                </select>
                            </div>
                            <div class="col">);</div>
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ( ! empty($system)) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_other_numeral_systems('<?= $amount ?>', '<?= $system ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_other_numeral_systems($amount, $system)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                    <h2 id="format_number_india">3. format_number_india()</h2>
                    <p>
                        Return the number in Indian numeral system, e.g. 12,34,56.78<br>
                        @param string $number number to be formatted<br>
                        @param int $decimal_places number of decimal places to be formatted
                    </p>
                    <h3>Test:</h3>
                    <form method="POST" action="number.php#format_number_india">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_number_india(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="indian_amount" type="text" placeholder="(amount)" value="<?= $indian_amount ?>" required />
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="decimal_places" type="text" placeholder="(decimal_places)" value="<?= $decimal_places ?>" required />
                            </div>
                            <div class="col">);</div>
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ( ! empty($indian_amount)) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_number_india('<?= $indian_amount ?>', '<?= $decimal_places ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_number_india($indian_amount, $decimal_places)) ?></pre></code>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
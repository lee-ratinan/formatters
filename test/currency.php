<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Formatters Test">
        <meta name="author" content="Ratinan Lee">
        <title>Currency · Formatters</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $page = 'currency';
        include_once '_nav.php';
        include_once '../src/format_currency.php';
        $amount   = filter_input(INPUT_POST, 'amount');
        $currency = filter_input(INPUT_POST, 'currency', FILTER_SANITIZE_STRING);
        $format   = filter_input(INPUT_POST, 'format', FILTER_SANITIZE_STRING);
        ?>
        <div class="container mb-3">
            <div class="row">
                <div class="col">
                    <h1>Currency</h1>
                    <h2 id="retrieve_available_currencies">1. retrieve_available_currencies()</h2>
                    <p>
                        Return the list of supported currencies<br>
                        @return array The list of supported currencies
                    </p>
                    <h3>Result</h3>
                    <code><pre><?php print_r(retrieve_available_currencies()) ?></pre></code>
                    <hr>
                    <h2 id="format_currency">2. format_currency()</h2>
                    <p>
                        Format the currency<br>
                        @param float $amount The amount of money to format<br>
                        @param string $currency The currency code of the amount (ISO4217), must be the currency from the supported currencies obtained from the retrieve_available_currencies()<br>
                        @param string $format The format of the currency to be returned, must be ISO, LOC (for local format), or INT (for international format)<br>
                        @return string The formatted currencies in the specified $format, an empty string is returned if the currency or format is not supported<br>
                    </p>
                    <h3>Test:</h3>
                    <form method="POST" action="currency.php#format_currency">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_currency(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="amount" type="number" step="0.01" placeholder="(amount)" value="<?= $amount ?>" required />
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <select name="currency" class="form-control form-control-sm" required>
                                    <option disabled>(currency)</option>
                                    <?php foreach (retrieve_available_currencies() as $c) : ?>
                                        <option value="<?= $c ?>" <?= ($c == $currency ? 'selected':'') ?>><?= $c ?></option>
                                    <?php endforeach; ?>
                                    <option value="XX" <?= ('XX' == $currency ? 'selected':'') ?>>(invalid input)</option>
                                </select>
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <select name="format" class="form-control form-control-sm" required>
                                    <option disabled>(format)</option>
                                    <option value="ISO" <?= ('ISO' == $format ? 'selected':'') ?>>ISO</option>
                                    <option value="INT" <?= ('INT' == $format ? 'selected':'') ?>>INT (international)</option>
                                    <option value="LOC" <?= ('LOC' == $format ? 'selected':'') ?>>LOC (local)</option>
                                </select>
                            </div>
                            <div class="col">);</div>
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ( ! empty($currency)) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_currency(<?= $amount ?>, '<?= $currency ?>', '<?= $format ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_currency($amount, $currency, $format)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
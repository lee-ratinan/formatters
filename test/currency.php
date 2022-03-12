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
        $amount = filter_input(INPUT_POST, 'amount');
        $currency = filter_input(INPUT_POST, 'currency', FILTER_SANITIZE_STRING);
        ?>
        <div class="container mb-3">
            <div class="row">
                <div class="col">
                    <h1>Currency</h1>
                    <h2>1. retrieve_available_currencies()</h2>
                    <p>
                        Return the list of supported currencies
                        @return array The list of supported currencies
                    </p>
                    <h3>Result</h3>
                    <code><pre><?php print_r(retrieve_available_currencies()) ?></pre></code>
                    <hr>
                    <h2>2. format_currency()</h2>
                    <p>
                        Format the currency<br>
                        @param float $amount The amount of money to format<br>
                        @param string $currency The currency code of the amount (ISO4217), must be the currency from the supported currencies obtained from the <code>retrieve_available_currencies()</code><br>
                        @return array The formatted currencies in local and international formats, empty array if error
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
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
                                    <option disabled>(unit)</option>
                                    <?php foreach (retrieve_available_currencies() as $c) : ?>
                                        <option value="<?= $c ?>" <?= ($c == $currency ? 'selected':'') ?>><?= $c ?></option>
                                    <?php endforeach; ?>
                                    <option value="XX" <?= ('XX' == $currency ? 'selected':'') ?>>(invalid input)</option>
                                </select>
                            </div>
                            <div class="col">);</div>
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ( ! empty($currency)) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_currency(<?= $amount ?>, '<?= $currency ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_currency($amount, $currency)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
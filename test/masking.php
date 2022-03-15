<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Formatters Test">
        <meta name="author" content="Ratinan Lee">
        <title>Masking Formatters</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $page = 'masking';
        include_once '_nav.php';
        include_once '../src/format_masking.php';
        $func = filter_input(INPUT_POST, 'func', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $card_number = filter_input(INPUT_POST, 'card_number', FILTER_SANITIZE_STRING);
        $input = filter_input(INPUT_POST, 'input', FILTER_SANITIZE_STRING);
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Masking</h1>
                    <h2>1. format_mask_email()</h2>
                    <p>
                        Mask the email and return partially masked email xxxxx***@***ail.com<br>
                        @param string $email The email address to be masked<br>
                        @return string Masked email address, or empty string if the email is invalid
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_mask_email(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="email" type="text" value="<?= $email ?>" placeholder="(email)" required />
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_mask_email" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_mask_email' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_mask_email('<?= $email ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_mask_email($email)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                    <h2>2. format_mask_credit_card()</h2>
                    <p>
                        Mask the credit card, showing only the last 4 digits<br>
                        @param string $card_number Credit card number in either '#### #### #### ####' or '################' format<br>
                        @return string Masked credit card number, or empty string if the number is invalid
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_mask_credit_card(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="card_number" type="text" value="<?= $card_number ?>" placeholder="(card_number)" required />
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_mask_credit_card" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_mask_credit_card' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_mask_credit_card('<?= $card_number ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_mask_credit_card($card_number)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                    <h2>3. format_mask_show_last_four()</h2>
                    <p>
                        Mask any input except the last 4 characters<br>
                        @param string $input Any input<br>
                        @return string Masked string, or empty string if the input is less than 5-character long
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_mask_show_last_four(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="input" type="text" value="<?= $input ?>" placeholder="(input)" required />
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_mask_show_last_four" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_mask_show_last_four' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_mask_show_last_four('<?= $input ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_mask_show_last_four($input)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Formatters Test">
        <meta name="author" content="Ratinan Lee">
        <title>Address Formatters</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $page = 'address';
        include_once '_nav.php';
        include_once '../src/format_address.php';
        $func = filter_input(INPUT_POST, 'func', FILTER_SANITIZE_STRING);
        $format = filter_input(INPUT_POST, 'format', FILTER_SANITIZE_STRING);
        $street_address = filter_input(INPUT_POST, 'street_address', FILTER_SANITIZE_STRING);
        $street_name = filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING);
        $unit_number = filter_input(INPUT_POST, 'unit_number', FILTER_SANITIZE_STRING);
        $building_name = filter_input(INPUT_POST, 'building_name', FILTER_SANITIZE_STRING);
        $postal_code = filter_input(INPUT_POST, 'postal_code', FILTER_SANITIZE_STRING);
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Masking</h1>
                    <h2>1. format_address_singapore()</h2>
                    <p>
                        Format the address into a fine Singapore format<br>
                        There are 2 main formats: SHORT and FORMAL<br>
                        SHORT:<br>
                        | 123 Example Street, #12-34 Building Name, S(987654)<br>
                        FORMAL:<br>
                        | 123 Example Street<br>
                        | #12-34 Building Name<br>
                        | Singapore 987654<br>
                        @param string $format the format of address, SHORT or FORMAL, default: FORMAL<br>
                        @param string $street_address 123<br>
                        @param string $street_name Example Street<br>
                        @param string $postal_code 987654 (6-digit postal code)<br>
                        @param string $unit_number (optional) #12-34, unit number usually starts with '#' sign<br>
                        @param string $building_name (optional) The name of the building<br>
                        @return string Formatted address
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_address_singapore(
                            </div>
                            <div class="col">
                                <select class="form-control form-control-sm" name="format">
                                    <option value="SHORT" <?= ('SHORT' == $format ? 'selected' : '') ?>>SHORT</option>
                                    <option value="FORMAL" <?= ('FORMAL' == $format ? 'selected' : '') ?>>FORMAL</option>
                                </select>
                            </div>
                            <div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="street_address" type="text" value="<?= $street_address ?>" placeholder="(street_address)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="street_name" type="text" value="<?= $street_name ?>" placeholder="(street_name)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="postal_code" type="text" value="<?= $postal_code ?>" placeholder="(postal_code)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="unit_number" type="text" value="<?= $unit_number ?>" placeholder="(unit_number)" /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="building_name" type="text" value="<?= $building_name ?>" placeholder="(building_name)" /></div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_address_singapore" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_address_singapore' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_address_singapore('<?= $format ?>', '<?= $street_address ?>', '<?= $street_name ?>', '<?= $postal_code ?>', '<?= $unit_number ?>', '<?= $building_name ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_address_singapore($format, $street_address, $street_name, $postal_code, $unit_number, $building_name)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
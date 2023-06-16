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
        $func          = filter_input(INPUT_POST, 'func', FILTER_SANITIZE_STRING);
        $street_number = filter_input(INPUT_POST, 'street_number', FILTER_SANITIZE_STRING);
        $street_name   = filter_input(INPUT_POST, 'street_name', FILTER_SANITIZE_STRING);
        $postal_code   = filter_input(INPUT_POST, 'postal_code', FILTER_SANITIZE_STRING);
        $city_name     = filter_input(INPUT_POST, 'city_name', FILTER_SANITIZE_STRING);
        $floor         = filter_input(INPUT_POST, 'floor', FILTER_SANITIZE_STRING);
        $unit_number   = filter_input(INPUT_POST, 'unit_number', FILTER_SANITIZE_STRING);
        $building_name = filter_input(INPUT_POST, 'building_name', FILTER_SANITIZE_STRING);
        $state         = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        ?>
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Address</h1>
                    <!--- SG --->
                    <h2>1. format_address_sg()</h2>
                    <p>
                        Format Singapore address, e.g.<br>
                        123 Example Street<br>
                        #01-23 Building Name<br>
                        Singapore 123456<br>
                        @param string $street_number<br>
                        @param string $street_name<br>
                        @param string $postal_code<br>
                        @param string $floor (optional)<br>
                        @param string $unit_number (optional)<br>
                        @param string $building_name (optional)<br>
                        @return string Formatted address
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_address_sg(
                            </div>
                            <div class="col"><input class="form-control form-control-sm" name="street_number" type="text" value="<?= $street_number ?>" placeholder="(street_number)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="street_name" type="text" value="<?= $street_name ?>" placeholder="(street_name)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="postal_code" type="text" value="<?= $postal_code ?>" placeholder="(postal_code)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="floor" type="text" value="<?= $floor ?>" placeholder="(floor)" /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="unit_number" type="text" value="<?= $unit_number ?>" placeholder="(unit_number)" /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="building_name" type="text" value="<?= $building_name ?>" placeholder="(building_name)" /></div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_address_sg" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_address_sg' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_address_sg('<?= $street_number ?>', '<?= $street_name ?>', '<?= $postal_code ?>', '<?= $floor ?>', '<?= $unit_number ?>', '<?= $building_name ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_address_sg($street_number, $street_name, $postal_code, $floor, $unit_number, $building_name)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                    <!--- USA --->
                    <h2>2. format_address_us()</h2>
                    <p>
                        Format USA address, e.g.<br>
                        300 Main St.<br>
                        Apartment #3<br>
                        Cincinnati, OH 45202<br>
                        @param string $street_number<br>
                        @param string $street_name<br>
                        @param string $city_name<br>
                        @param string $state<br>
                        @param string $postal_code<br>
                        @param string $apartment_name (optional)<br>
                        @param string $unit_number (optional)<br>
                        @return string Formatted address
                    </p>
                    <h3>Test:</h3>
                    <form method="POST">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                format_address_us(
                            </div>
                            <div class="col"><input class="form-control form-control-sm" name="street_number" type="text" value="<?= $street_number ?>" placeholder="(street_number)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="street_name" type="text" value="<?= $street_name ?>" placeholder="(street_name)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="city_name" type="text" value="<?= $city_name ?>" placeholder="(city_name)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="state" type="text" value="<?= $state ?>" placeholder="(state)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="postal_code" type="text" value="<?= $postal_code ?>" placeholder="(postal_code)" required /></div><div class="col">,</div>
                            <div class="col"><input class="form-control form-control-sm" name="building_name" type="text" value="<?= $building_name ?>" placeholder="(apartment_name)" /></div>
                            <div class="col"><input class="form-control form-control-sm" name="unit_number" type="text" value="<?= $unit_number ?>" placeholder="(unit_number)" /></div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="format_address_us" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('format_address_us' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>format_address_us('<?= $street_number ?>', '<?= $street_name ?>', '<?= $city_name ?>', '<?= $state ?>', '<?= $postal_code ?>', '<?= $building_name ?>', '<?= $unit_number ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(format_address_us($street_number, $street_name, $city_name, $state, $postal_code, $building_name, $unit_number)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
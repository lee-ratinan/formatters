<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Formatters Test">
        <meta name="author" content="Ratinan Lee">
        <title>Date-Time · Formatters</title>
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <?php
        $page = 'date-time';
        include_once '_nav.php';
        include_once '../src/format_date_time.php';
        $func        = filter_input(INPUT_POST, 'func', FILTER_SANITIZE_STRING);
        $string_date = filter_input(INPUT_POST, 'string_date', FILTER_SANITIZE_STRING);
        $calendar    = filter_input(INPUT_POST, 'calendar', FILTER_SANITIZE_STRING);
        ?>
        <div class="container mb-3">
            <div class="row">
                <div class="col">
                    <h1>Date-Time</h1>
                    <h2 id="retrieve_calendar_date">1. retrieve_calendar_date()</h2>
                    <p>
                        Retrieve the calendar array in various calendar<br>
                        @param string $string_date Date string in ISO8601 format, YYYY-MM-DD<br>
                        @param string $calendar Calendar, it could be GREGORIAN, JAPANESE, TAIWANESE, THAI<br>
                        @return array The array containing year, month, date, and era
                    </p>
                    <h3>Test:</h3>
                    <form method="POST" action="date_time.php#retrieve_calendar_date">
                        <div class="row row-cols-lg-auto g-3 align-items-center">
                            <div class="col">
                                retrieve_calendar_date(
                            </div>
                            <div class="col">
                                <input class="form-control form-control-sm" name="string_date" type="text" value="<?= $string_date ?>" placeholder="(date)" required />
                            </div>
                            <div class="col">,</div>
                            <div class="col">
                                <select name="calendar" class="form-control form-control-sm" required>
                                    <option disabled>(calendar</option>
                                    <option value="GREGORIAN" <?= ('GREGORIAN' == $calendar ? 'selected' : '') ?>>Gregorian</option>
                                    <option value="JAPANESE" <?= ('JAPANESE' == $calendar ? 'selected' : '') ?>>Japanese</option>
                                    <option value="TAIWANESE" <?= ('TAIWANESE' == $calendar ? 'selected' : '') ?>>Taiwanese</option>
                                    <option value="THAI" <?= ('THAI' == $calendar ? 'selected' : '') ?>>Thai</option>
                                </select>
                            </div>
                            <div class="col">);</div>
                            <input type="hidden" name="func" value="retrieve_calendar_date" />
                            <div class="col"><input type="submit" class="btn btn-sm btn-success" value="Submit" /></div>
                        </div>
                    </form>
                    <?php if ('retrieve_calendar_date' == $func) : ?>
                        <h3>Result</h3>
                        <p>Calls</p>
                        <code>retrieve_calendar_date(<?= $string_date ?>, '<?= $calendar ?>');</code>
                        <p>Returns</p>
                        <code><pre><?php print_r(retrieve_calendar_date($string_date, $calendar)) ?></pre></code>
                    <?php endif; ?>
                    <hr>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
<header class="py-3 mb-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="index.php" class="text-decoration-none <?= ('index' == $page ? 'text-warning':'text-secondary') ?>"><b class="d-block p-2">FORMATTERS</b></a></li>
                <li><a href="distance.php" class="nav-link px-2 <?= ('distance' == $page ? 'text-warning':'text-secondary') ?>">Distance</a></li>
                <li><a href="length.php" class="nav-link px-2 <?= ('length' == $page ? 'text-warning':'text-secondary') ?>">Length</a></li>
                <li><a href="currency.php" class="nav-link px-2 <?= ('currency' == $page ? 'text-warning':'text-secondary') ?>">Currency</a></li>
                <li><a href="number.php" class="nav-link px-2 <?= ('number' == $page ? 'text-warning':'text-secondary') ?>">Number</a></li>
                <li><a href="date_time.php" class="nav-link px-2 <?= ('date-time' == $page ? 'text-warning':'text-secondary') ?>">Date-Time</a></li>
                <li><a href="address.php" class="nav-link px-2 <?= ('address' == $page ? 'text-warning':'text-secondary') ?>">Address</a></li>
                <li><a href="phone.php" class="nav-link px-2 <?= ('phone' == $page ? 'text-warning':'text-secondary') ?>">Phone</a></li>
                <li><a href="masking.php" class="nav-link px-2 <?= ('masking' == $page ? 'text-warning':'text-secondary') ?>">Masking</a></li>
            </ul>
            <div class="text-end">
                <a href="https://github.com/lee-ratinan/formatters" target="_blank" class="btn btn-warning">GitHub</a>
            </div>
        </div>
    </div>
</header>
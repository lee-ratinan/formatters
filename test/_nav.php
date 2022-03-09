<header class="py-3 mb-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><b class="d-block p-2">FORMATTERS</b></li>
                <li><a href="distance.php" class="nav-link px-2 <?= ('distance' == $page ? 'text-warning':'text-secondary') ?>">Distance</a></li>
                <li><a href="length.php" class="nav-link px-2 <?= ('length' == $page ? 'text-warning':'text-secondary') ?>">Length</a></li>
                <li><a href="#" class="nav-link px-2 <?= ('datetime' == $page ? 'text-warning':'text-secondary') ?>">Date-Time</a></li>
                <li><a href="#" class="nav-link px-2 <?= ('currency' == $page ? 'text-warning':'text-secondary') ?>">Currency</a></li>
                <li><a href="#" class="nav-link px-2 <?= ('address' == $page ? 'text-warning':'text-secondary') ?>">Address</a></li>
                <li><a href="#" class="nav-link px-2 <?= ('phone' == $page ? 'text-warning':'text-secondary') ?>">Phone</a></li>
            </ul>
            <div class="text-end">
                <a href="https://github.com/lee-ratinan/formatters" target="_blank" class="btn btn-warning">GitHub</a>
            </div>
        </div>
    </div>
</header>
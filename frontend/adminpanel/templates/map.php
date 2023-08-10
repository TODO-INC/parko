<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="../vendor/assets/js/color-modes.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="generator" content="Hugo 0.112.5">
    <link rel="shortcut icon" type="image/x-icon" href="../asset/icons/icon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Parko</title>
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="../vendor/assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Albert+Sans" rel="stylesheet" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/map.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
    <script src="https://unpkg.com/@turf/turf@6.5.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <main class="container">
        <header class="navbar navbar-expand-md custom-common-container light">
            <div class="container-md custom-common-header light">
                <a class="navbar-brand light" href="#">
                    <img class="icon light" height="40px" src="../asset/pics/parko.png" alt="Parko Logo" />
                </a>
                <button class="navbar-toggler light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon light"></span>
                </button>
                <div class="collapse navbar-collapse light" id="navbarNav">
                    <ul class="navbar-nav mx-auto light">
                        <li class="nav-item light mx-2">
                            <a class="nav-link light" href="index.php">View Statistics</a>
                        </li>
                        <li class="nav-item light mx-2">
                            <a class="nav-link light" href="query.php">Query</a>
                        </li>
                        <li class="nav-item light mx-2">
                            <a class="nav-link light" href="map.php">Map</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto d-flex align-items-center light">
                        <li class="me-3 light">
                            <div class="form-check form-switch light">
                                <input class="form-check-input light" type="checkbox" id="dark-mode-switch" />
                                <label class="form-check-label light" for="dark-mode-switch">
                                    <i class="bi bi-moon light" id="moon-icon"></i>
                                    <i class="bi bi-brightness-high light" id="sun-icon" style="display: none;"></i>
                                </label>
                            </div>
                        </li>
                        <li>
                            <a class="nav-link light" href="auth.php">
                                <span class="bi bi-person light">Switch to user</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </header><br><br>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <form class="d-flex">
                    <label for="searchSpace" class="visually-hidden ">Search</label>
                    <input type="text" class="form-control me-1 search-box" id="searchSpace" placeholder="Search a city..">
                    <button type="submit" class="btn btn-primary bi bi-search search-button"></button>
                </form>
            </div>
        </div><br><br>
        <div id="map""></div>
        <footer class="navbar navbar-expand-md custom-common-footer mt-5 light">
            <div class="container-fluid custom-footer light">
                <div class="navbar-brand">
                    <a class="nav-link light todo" style="font-size:15px">© 2023 TODO-INC, All Rights Reserved</a>
                </div>
            </div>
        </footer>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-routing-machine/3.2.12/leaflet-routing-machine.min.js"></script>
    <script src="../js/map.js"></script>
</body>
</html>
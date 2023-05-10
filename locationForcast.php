<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Whiz</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>


<body class="body">
    <h1>Weather Forecast</h1>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
        crossorigin="anonymous"></script>
    <!-- Navigation -->
    <div class="pb-5">
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color: #3d7d9d;">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="Assets/noName_WW.png" alt="noName_WW" height="80px">
                    Weather Whiz
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="locationForcast.php">Location Forecast</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pricing.php">Pricing</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php
                            session_start();
                            if (isset($_SESSION['username'])) {
                                echo "Welcome, " . $_SESSION['username'];
                                ?>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="logout.php">Sign Out</a>
                                            </li>
                                            <?php
                            } else {
                                ?>
                                            <li class="nav-item">
                                                <a class="nav-link" href="login.html">Login</a>
                                            </li>
                                            <?php
                            }
                            ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <div class="pt-5"></div>
    <form id="location-form" class="location-form">
        <input type="text" id="location-input" placeholder="Enter location" required>
        <button type="submit">Search</button>
    </form>
    <div id="weather-container">
        <!-- Weather data will be populated here -->
    </div>
    <script src="forcast.js"></script>
</body>

</html>
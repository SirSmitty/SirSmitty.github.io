<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Whiz</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
</head>


<body class="body">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"
        integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i"
        crossorigin="anonymous"></script>
    <!-- Navigation -->
    <div>
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
                    <a class="nav-link" href="locationForcast.html">Location Forecast</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pricing.html">Pricing</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    echo '<li class="nav-item">
                            <span class="nav-link">Welcome, ' . $_SESSION['username'] . '</span>
                          </li>';
                    echo '<li class="nav-item">
                            <a class="nav-link" href="logout.php">Sign Out</a>
                          </li>';
                } else {
                    echo '<li class="nav-item">
                            <a class="nav-link" href="login.html">Login</a>
                          </li>';
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
    </div>
    <div>
        <div class="main-content">
            <div class="featured">
                <h3>Featured Locations</h3>
                <!-- data-bs-ride="carousel" -->
                <div id="carousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="Assets/New_York_City_skyline_banner.jpeg" class="banner" alt="logo1">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>New York</h1>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="Assets/Las_Vegas_banner.png" class="banner" alt="test">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>Las Vegas</h1>
                            </div>
                        </div>
                        <div class=" carousel-item">
                            <img src="Assets/San_diego_skyline_banner.png" class="banner" alt="test">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>San Diego</h1>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="locationHeader">
                    <h3>Your Current Location<h3>
                </div>
                <div class="map">
                    <div id="weather-map" style="width: 100%; height: 400px;"></div>
                    <!-- Google Maps API -->
                    <script
                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfDv8ZRAPZj_1sWe3_ZQiwRm6yvpCHAj0"></script>
                    <!-- GoogleMutant for Leaflet -->
                    <script
                        src="https://unpkg.com/leaflet.gridlayer.googlemutant@0.13.7/Leaflet.GoogleMutant.js"></script>
                    <!-- Your custom JavaScript -->

                    <script src="weathermap.js"></script>
                </div>
            </div>
            <div class="article">
                <header class="header">
                    <h1>Weather Whiz: A Useful Tool for Everyday Consumers, Born from the Passion of College
                        Students
                    </h1>
                </header>
                <img src="Assets/noName_WW.png" alt="testimg" width="100px" style="display: block; margin: 0 auto;">

                <main>
                    <section>
                        <h2>Introduction</h2>
                        <p>In today's fast-paced world, having access to accurate and up-to-date weather information
                            is
                            essential for both personal and professional reasons. From planning outdoor activities
                            to
                            scheduling
                            travel or simply dressing appropriately for the day, weather forecasts play a crucial
                            role
                            in
                            our
                            everyday lives. This is where Weather Whiz, an innovative weather website, comes into
                            the
                            picture.
                            Founded by a group of college students with a shared dream of traveling the world,
                            Weather
                            Whiz
                            has
                            become an indispensable tool for everyday consumers.</p>
                    </section>

                    <section>
                        <h2>The College Students' Dream</h2>
                        <p>The story of Weather Whiz began with a group of college friends who all shared a passion
                            for
                            exploration and adventure. They dreamt of traveling the globe, experiencing new
                            cultures,
                            and
                            creating unforgettable memories. However, they realized that embarking on such an
                            ambitious
                            journey
                            required meticulous planning, and weather was a significant factor that could not be
                            overlooked.
                        </p>

                        <p>As they researched their destinations, they quickly discovered that many existing weather
                            websites
                            lacked the user-friendly design, detailed forecasts, and engaging content they desired.
                            Driven
                            by
                            their passion for travel and a determination to create a better tool for fellow
                            adventurers,
                            these
                            college students set out to develop a weather website that would not only provide
                            accurate
                            forecasts
                            but also inspire and educate its users.</p>
                    </section>

                    <section>
                        <h2>A Website for Everyday Consumers</h2>
                        <p>Weather Whiz was designed with everyday consumers in mind. The founders understood that
                            weather
                            information is not just for travelers or outdoor enthusiasts, but a crucial part of
                            daily
                            life
                            for
                            people from all walks of life. Whether you're a parent planning a weekend picnic, a
                            commuter
                            deciding whether to bring an umbrella, or a farmer monitoring growing conditions,
                            Weather
                            Whiz
                            aims
                            to provide accurate, timely, and easy-to-understand forecasts to help you make informed
                            decisions.
                        </p>

                        <p>The website offers a range of features, including:</p>
                        <ol>
                            <li>Current weather conditions and detailed forecasts for locations worldwide.</li>
                            <li>Interactive maps that provide a visual representation of weather patterns, making it
                                easier
                                for
                                users to grasp complex meteorological data.</li>
                            <li>Weather-related news articles, tips, and trivia that keep users engaged and informed
                                about
                                the
                                world around them.</li>
                            <li>A user-friendly interface that ensures seamless navigation and an enjoyable browsing
                                experience.
                            </li>
                        </ol>
                    </section>

                    <section>
                        <h2>Inspiring a Community</h2>
                        <p>Weather Whiz has evolved beyond a simple weather forecasting tool and become a platform
                            that
                            fosters
                            a sense of community among its users. The founders' passion for travel and adventure has
                            inspired a
                            growing audience of like-minded individuals who appreciate the power of accurate weather
                            information
                            and the opportunities it presents.</p>

                        <p>The college students behind Weather Whiz continue to innovate and improve the website,
                            driven
                            by
                            their commitment to helping others achieve their dreams and enjoy life to </p>
                    </section>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
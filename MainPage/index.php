<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SAMS MAIN PAGE</title>
    <!-- Bootstrap for CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap for JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom CSS for Homepage-->
    <link href="indexStyle.css" rel="stylesheet">

</head>
<body class="BodyBg">
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg NavSet flex-column">
            <div class="container-fluid" id="navTheme">
                <!-- Navigation Toggle Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <!-- Add some work in between NavToggler and Logo -->
                <div class="d-flex align-items-center mx-auto d-lg-none">
                    <span class="mx-auto">SAMS HOMEPAGE</span>
                </div>

                <!-- SEMUJA Logo -->
                <div class="logo">
                        <img src="../SourceImg/SEMUJA.png" alt="SSAMS">
                    </div>

                <!-- Navigation Toggle -->
                <div class="collapse navbar-collapse" id="navbarNav" method="post">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php"><i class="bi bi-house-door"></i> Home</a>
                        <li class="nav-item">
                            <a class="nav-link" href="../AboutPage/About.php"><i class="bi bi-info-circle"></i> About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tyy.php"><i class="bi bi-question-circle"></i> Help</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Content -->
    <div class="container ContentColor">
        <br>
        <h3 class="MainTitle">Welcome To SAMS Main Page</h3>
        <div class="row">
            <div class="col">
                <br>
                <center>
                    <!-- <h1 class="h1mp">WELCOME TO SAMS</h1> -->
                    <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../SourceImg/InfoPicture/Info1.jpg" class="d-inline" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="../SourceImg/InfoPicture/Info2.jpg" class="d-inline" alt="">
                            </div>
                            <div class="carousel-item">
                                <img src="../SourceImg/InfoPicture/Info3.jpg" class="d-inline" alt="">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>

                    <div class="Btn-container">
                        <!-- Button 1 -->
                        <a href="StaffLogin.php" class="button">
                            <div class="button__content">
                                <span class="button__text">Staff Dashboard</span>
                                <i class="ri-download-cloud-fill button__icon"></i>

                                <div class="button__reflection-1"></div>
                                <div class="button__reflection-2"></div>
                            </div>

                            <img src="../SourceImg/star.png" alt="none" class="button__star-1">
                            <img src="../SourceImg/star.png" alt="none" class="button__star-2">
                            <img src="../SourceImg/circle.png" alt="none" class="button__circle-1">
                            <img src="../SourceImg/circle.png" alt="none" class="button__circle-2">
                            <img src="../SourceImg/diamond.png" alt="none" class="button__diamond">
                            <img src="../SourceImg/triangle.png" alt="none" class="button__triangle">

                            <div class="button__shadow"></div>
                        </a>

                        <!-- Button 2 -->
                        <a href="ManagementLogin.php" class="button">
                            <div class="button__content">
                                <span class="button__text">Management Dashboard</span>
                                <i class="ri-download-cloud-fill button__icon"></i>

                                <div class="button__reflection-1"></div>
                                <div class="button__reflection-2"></div>
                            </div>

                            <img src="../SourceImg/star.png" alt="none" class="button__star-1">
                            <img src="../SourceImg/star.png" alt="none" class="button__star-2">
                            <img src="../SourceImg/circle.png" alt="none" class="button__circle-1">
                            <img src="../SourceImg/circle.png" alt="none" class="button__circle-2">
                            <img src="../SourceImg/diamond.png" alt="none" class="button__diamond">
                            <img src="../SourceImg/triangle.png" alt="none" class="button__triangle">

                            <div class="button__shadow"></div>
                        </a>

                        <!-- Button 3 -->
                        <a href="AdminLogin.php" class="button">
                            <div class="button__content">
                                <span class="button__text">Admin Dashboard </span>
                                <i class="ri-download-cloud-fill button__icon"></i>

                                <div class="button__reflection-1"></div>
                                <div class="button__reflection-2"></div>
                            </div>

                            <img src="../SourceImg/star.png" alt="none" class="button__star-1">
                            <img src="../SourceImg/star.png" alt="none" class="button__star-2">
                            <img src="../SourceImg/circle.png" alt="none" class="button__circle-1">
                            <img src="../SourceImg/circle.png" alt="none" class="button__circle-2">
                            <img src="../SourceImg/diamond.png" alt="none" class="button__diamond">
                            <img src="../SourceImg/triangle.png" alt="none" class="button__triangle">

                            <div class="button__shadow"></div>
                        </a>
                </center>
            </div>
        </div>
    </div>
</body>
</html>

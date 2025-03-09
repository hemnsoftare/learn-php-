<?php
include 'config.php';
$url = basename($_SERVER['PHP_SELF']); // Get current page name
global $conn;


// basename slashake peshe ladada
echo "<br>";
echo $url;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="">
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="#">Teach Heim</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($url == 'home.php') ? 'text-success fw-bold' : ''; ?>" href="home.php">
                        <i class="bi bi-house-door"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($url == 'products.php') ? 'text-success fw-bold' : ''; ?>" href="products.php">
                        <i class="bi bi-box-seam"></i> Products
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($url == 'create_Porduct.php') ? 'text-success fw-bold' : ''; ?>" href="create_Porduct.php">
                        <i class="bi bi-plus-square"></i> Create Product
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($url == 'about.php') ? 'text-success fw-bold' : ''; ?>" href="about.php">
                        <i class="bi bi-info-circle"></i> About
                    </a>
                </li>
                <?php
                session_start();
                if (isset($_SESSION['username'])) {
                    echo '<li class="nav-item">
            <a class="nav-link ' . ($url == 'login.php' ? 'text-success fw-bold' : '') . '" href="?logout">
                <i class="bi bi-person"></i> Logout
            </a>
        </li>';
                } else {
                    echo '<li class="nav-item">
            <a class="nav-link ' . ($url == 'login.php' ? 'text-success fw-bold' : '') . '" href="login.php">
                <i class="bi bi-person"></i> Login
            </a>
        </li>';
                }
                ?>


                <li class="nav-item d-flex align-items-center ms-lg-3">
                    <span class="badge bg-secondary p-2">
                        <i class="bi bi-eye"></i> <?= getvistor() ?> Visitors
                    </span>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

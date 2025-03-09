<?php
include "includes/navbar.php";
global $conn;
$id  = $_GET['postID'];
echo $id;
$data = mysqli_query($conn, "SELECT * FROM food WHERE id='$id'");
$food = mysqli_fetch_assoc($data);
?>
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-6 col-sm-8"> <!-- Small Card Size -->
            <div class="card shadow-sm border-0 rounded-3">
                <img src="image/<?= htmlspecialchars($food['image']) ?>" class="card-img-top rounded-top" alt="Food Image" style="height: 200px; object-fit: cover;">

                <div class="card-body text-center p-3">
                    <h5 class="card-title text-primary fw-bold"><?= htmlspecialchars($food["name"]) ?></h5>
                    <p class="card-text text-muted small"><?= htmlspecialchars($food["details"]) ?></p>

                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="badge bg-warning text-dark px-2 py-1 fs-6">Expires: <?= htmlspecialchars($food["expire_date"]) ?></span>
                        <span class="badge bg-success px-2 py-1 fs-6">Price: $<?= htmlspecialchars($food["price"]) ?></span>
                    </div>

                    <p class="text-muted mt-2 small">Product ID: <?= htmlspecialchars($food["id"]) ?></p>

                    <a href="products.php" class="btn btn-outline-secondary btn-sm rounded-pill mt-2">⬅ Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


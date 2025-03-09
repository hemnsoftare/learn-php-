<?php
include 'includes/navbar.php';
// require 'includes/delete.inc.php'

?>
<?php
echo "hihihi";
echo  $_SESSION['username'];
?>
<form method="GET" action="">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search for food..." aria-label="Search">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>
<?php
session_start(); // REQUIRED: Start the session at the top of the file

global $conn;
$url = $_SERVER['PHP_SELF'];  // Use in navbar

// Delete record if 'delete' is set in the URL
if (isset($_GET['delete']) && isset($_SESSION["role"]) && $_SESSION["role"] === "admin") {
    $id = intval($_GET['delete']);

    // Fetch the image name before deleting the record
    $getImage = mysqli_query($conn, "SELECT image FROM food WHERE id='$id'");
    $row = mysqli_fetch_assoc($getImage);
    if ($row && file_exists("image/" . $row['image'])) {
        unlink("image/" . $row['image']); // Delete image from folder
    }

    // Delete the record
    $deleteQuery = "DELETE FROM food WHERE id = $id";
    mysqli_query($conn, $deleteQuery);
}

$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, clear($_GET['search']));
}

// Fetch records from the database
$query = "SELECT * FROM food WHERE price > 0 ORDER BY price DESC";
if ($search != "") {
    $query = "SELECT * FROM food WHERE name LIKE '%$search%' AND price > 0 ORDER BY price DESC";
}

$result = mysqli_query($conn, $query);
$foods = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    <?php foreach ($foods as $food) { ?>
        <div class="col">
            <div class="card shadow-sm">
                <img src="image/<?= htmlspecialchars($food['image']) ?>" class="card-img-top" alt="Food Image" style="height: 200px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary"><?= htmlspecialchars($food["name"]) ?></h5>
                    <p class="card-text"><?= htmlspecialchars($food["details"]) ?></p>
                    <p class="text-muted">Expires on: <?= htmlspecialchars($food["expire_date"]) ?></p>
                    <p class="card-text">Price: <?= htmlspecialchars($food["price"]) ?></p>
                    <p class="card-text">ID: <?= htmlspecialchars($food["id"]) ?></p>

                    <div class="d-flex justify-content-between gap-2">
                        <a href="/single_Products.php?postID=<?= $food['id'] ?>" class="btn btn-primary rounded-pill fs-6">View Details</a>

                        <?php if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") { ?>
                            <a href="products.php?delete=<?= $food['id'] ?>" class="btn btn-danger rounded-pill fs-6">Delete Food</a>
                            <a href="/create_Porduct.php?postID=<?= $food['id'] ?>" class="btn btn-warning rounded-pill fs-6">Edit Product</a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<?php
// use while
//    while ($row = mysqli_fetch_assoc($query)) {
//        echo '
//        <div class="col">
//            <div class="card shadow-sm">
//                <div class="card-body text-center">
//                    <h5 class="card-title text-primary">' . htmlspecialchars($row["name"]) . '</h5>
//                    <p class="card-text">' . htmlspecialchars($row["details"]) . '</p>
//                    <p class="text-muted">Expires on: ' . htmlspecialchars($row["expire_date"]) . '</p>
//                    <p class="card-text">Price: ' . htmlspecialchars($row["price"]) . '</p>
//                    <p class="card-text">ID: ' . htmlspecialchars($row["id"]) . '</p>
//                    <a href="products.php?delete=' . $row["id"] . '" class="btn btn-danger rounded-pill">Delete</a>
//                </div>
//            </div>
//        </div>';
//    }
    ?>


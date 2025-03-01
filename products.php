<?php
 include 'includes/navbar.php';
//require 'includes/delete.inc.php'
?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

    <?php
    global $conn;

    // Delete record if 'delete' is set in the URL
    if (isset($_GET['delete'])) {
        $id = intval($_GET['delete']);
        $deleteQuery = "DELETE FROM `food` WHERE id = $id";
        mysqli_query($conn, $deleteQuery); // Executes query but gives no feedback
    }


    // Fetch records from database
    $query = mysqli_query($conn, "SELECT * FROM `food` WHERE price > 500 ORDER BY price DESC");
    $foods = mysqli_fetch_all($query , MYSQLI_ASSOC  );
foreach ($foods as $food) {
    echo '
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title text-primary">' . htmlspecialchars($food["name"]) . '</h5>
                    <p class="card-text">' . htmlspecialchars($food["details"]) . '</p>
                    <p class="text-muted">Expires on: ' . htmlspecialchars($food["expire_date"]) . '</p>
                    <p class="card-text">Price: ' . htmlspecialchars($food["price"]) . '</p>
                    <p class="card-text">ID: ' . htmlspecialchars($food["id"]) . '</p>
                    <a href="products.php?delete=' . $food["id"] . '" class="btn btn-danger rounded-pill">Delete item</a>
                </div>
            </div>
        </div>';
}

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
</div>


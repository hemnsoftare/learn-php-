<?php
include 'includes/navbar.php';
global $conn;
if (isset($_POST['add'])) {
    echo "add" ;
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $price =  mysqli_real_escape_string($conn, $_POST['price']);
    $date = mysqli_real_escape_string($conn, $_POST['expire_Date']);
    $details =  mysqli_real_escape_string($conn, $_POST['details']);
    $query = "INSERT INTO food (name, price, details, expire_date) VALUES ('$name', $price, '$details', '$date')";
    mysqli_query($conn , $query);
    echo "add " ;
    header("location:products.php");
    exit();
}
?>
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient text-white text-center py-3" style="background: linear-gradient(45deg, #007bff, #6610f2);">
            <h4 class="fw-bold mb-0 text-dark" >🍽️ Add New Food Item</h4>
        </div>
        <div class="card-body p-4">
            <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Food Name</label>
                    <input type="text" class="form-control shadow-sm rounded-pill px-3" id="name" name="name" required>
                </div>

                <div class="mb-3">
                    <label for="expire_date" class="form-label fw-bold">Expiration Date</label>
                    <input type="date" class="form-control shadow-sm rounded-pill px-3" id="date" name="expire_date" required>
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label fw-bold">Details</label>
                    <textarea class="form-control shadow-sm rounded-3 px-3" id="details" name="details" rows="3" required></textarea>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price ($)</label>
                    <input type="number" class="form-control shadow-sm rounded-pill px-3" id="price" name="price" min="1" required>
                </div>

                <button type="submit" name="add" class="btn btn-success w-100 py-2 shadow-sm rounded-pill fw-bold">✅ Add Food</button>
            </form>
        </div>
    </div>
</div>

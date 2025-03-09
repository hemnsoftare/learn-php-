<?php
include 'includes/navbar.php';
global $conn;
$id = isset($_GET['postID']) ? htmlspecialchars($_GET['postID']) : '';
if (isset($_POST['add'])) {
    echo "add";
    // Sanitize inputs
    $name = clear($conn, $_POST['name']);
    $price = clear($conn, $_POST['price']);
    $date = clear($conn, $_POST['expire_date']);
    $details = clear($conn, $_POST['details']);
    // File upload
    $file = $_FILES['file'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    echo $fileName . ' ' . $fileType . ' ' . $fileSize . ' ' . $fileError; // Correct concatenation
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allowed = array('jpg', 'jpeg', 'png', 'svg', 'gif');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10000000) {
                echo "add file";
                $fileNewName = rand() . '.' . $fileActualExt;
                $fileDestination = 'image/' . $fileNewName;
                // Insert into the database first
                $query = "";
                if (!empty($id)) {
                    $query = "UPDATE food SET  name = '$name', price = $price, details = '$details',  expire_date = '$date',  image = '$fileNewName' WHERE id = $id";
                } else {
                    $query = "INSERT INTO food (name, price, details, expire_date, image) VALUES ('$name', $price, '$details', '$date', '$fileNewName')";
                }
                if (mysqli_query($conn, $query)) {
                    // Move file only if DB insert is successful
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo "Food added successfully!";
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            } else {
                echo "File size too large!";
            }
        } else {
            echo "Error uploading file!";
        }
    } else {
        echo "Invalid file type!";
    }
}
//    $query = "INSERT INTO food (name, price, details, expire_date) VALUES ('$name', $price, '$details', '$date')";
//    header("location:products.php");
$row = [];
if ($id !==""){
    $query = "SELECT * FROM food WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    print_r($row);
}
?>
<div class="container mt-5">
    <div class="card shadow-lg lg-col-4 border-0 rounded-4">
        <div class="card-header bg-gradient text-white text-center py-3" style="background: linear-gradient(45deg, #007bff, #6610f2);">
            <h4 class="fw-bold mb-0 text-dark" > <?= $id ? "update the food item" : "add new food item" ?> </h4>
        </div>
        <div class="card-body p-4">
<!--            agar batwae file upload bkay dabi la naw formake bnusi enctype-->
            <form method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">Food Name</label>
                    <input type="text"  class="form-control shadow-sm rounded-pill px-3" id="name" name="name" required value=<?= $row['name']? $row['name'] : "" ?> >
                </div>

                <div class="mb-3">
                    <label for="expire_date" class="form-label fw-bold">Expiration Date</label>
                    <input type="date" class="form-control shadow-sm rounded-pill px-3" id="expire_date" name="expire_date" required value=<?= $row['expire_date']? $row['expire_date'] : "" ?>  >
                </div>

                <div class="mb-3">
                    <label for="details" class="form-label fw-bold">Details</label>
                    <textarea class="form-control shadow-sm rounded-3 px-3" id="details" name="details" rows="3" required>
                     <?= isset($row['details']) ? htmlspecialchars($row['details']) : "" ?>
               </textarea>
                </div
                <div class="mb-3">
                    <label for="price" class="form-label fw-bold">Price ($)</label>
                    <input  type="number" class="form-control shadow-sm rounded-pill px-3" id="price" name="price" min="1" required value=<?= $row['price']? $row['price'] : "" ?> >
                </div>
                <input type="file"  class="form-control" id="fileInput" name="file" required value=<?= $row['image']? $row['image'] : "" ?> >
                <label class="input-group-text bg-success text-white" for="fileInput">
                    <i class="bi bi-upload"></i> Upload
                </label>
                <br>
                <button type="submit" name="add" class="btn btn-success w-100 py-2 shadow-sm rounded-pill fw-bold"> <?=
                    $id ? "Update" : "Add new food" ?>
                </button>
            </form>
        </div>
    </div>

</div>

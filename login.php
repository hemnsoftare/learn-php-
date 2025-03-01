<?php
ob_start();
include 'includes/navbar.php';

?>
<?php

$errors = ["result" => ["email" => "", "password" => ""]];

if (isset($_POST['login'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    if (empty($email)) {
        $errors["result"]["email"] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["result"]["email"] = "Invalid email format";
    }

    if (empty($password)) {
        $errors["result"]["password"] = "Password is required";
    }

//     Only redirect if there are no errors
    if (empty($errors["result"]["email"]) && empty($errors["result"]["password"])) {
        header("Location: home.php");
        exit();
    }

}
 ?>

<div class="container mt-5">
    <div class="card p-4 shadow-lg rounded">
        <h2 class="text-center mb-4">Lssogin</h2>
dfasdddsssssssffffff
        <form  method="POST">

            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label fw-bold">Email</label>
                <div class="col-sm-10">
                    <input type="text" name="email" class="form-control border rounded" id="staticEmail" placeholder="Enter your email">
                </div>
                <p class="text-danger"><?php echo $errors["result"]["email"]; ?></p>
            </div>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label fw-bold">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter your password">
                </div>
                <p class="text-danger"><?php echo $errors["result"]["password"]; ?></p>
            </div>

            <div class="text-center">
                <button name="login" type="submit"  class="btn btn-primary w-100">Login</button>
            </div>
        </form>
    </div>
</div>

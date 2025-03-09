    <?php
    include 'includes/navbar.php';
    ?>
    <?php
    ob_start();
    session_start();
        global $conn;
    $errors = ["result" => ["email" => "", "password" => ""]];
    if (isset($_POST['submite'])) {
        $email = clear($_POST['Username']);
        $password = clear($_POST['Password']);
        if (empty($email)) {
            $errors["result"]["email"] = "user name  is required";
        }
        if (empty($password)) {
            $errors["result"]["password"] = "Password is required";
        }
        if (empty($errors["result"]["email"]) && empty($errors["result"]["password"])) {
            echo "<br>";
            echo " in if " ;
            $query = "SELECT * FROM user WHERE username='$email' AND password='$password'";
            echo "result";
            $data = mysqli_query($conn, $query);
            if (mysqli_num_rows($data) == 1) {
                while ($row = mysqli_fetch_assoc($data)) {
                    echo $row['username'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['role'] = $row['role'];
                    echo "<br>";
                    echo $_SESSION['username'];
            header("Location: products.php");
            exit();
                }}else{
                    header("Location: login.php");
            }}}?>
    
    <div class="container text-center mt-4 bg-light p-4">
        <script src="/lib/login.js" >   </script>
        <button class="user btn btn-primary m-3" style="width: 200px; height: 50px;">users</button>
        <button class="admin btn btn-secondary m-3" style="width: 200px; height: 50px;">Admin</button>

        <div class="row justify-content-center">
            <?php
            $i = 0;
            while ($i <= 1) {
                $buttonClass = $i === 0 ? 'btn-primary' : 'btn-warning';
                $buttonName = "submite";
                ?>
                <form action="" method="POST" class="<?= $i === 0 ? 'fuser' : 'fadmin d-none' ?> m-2 col-lg-4 bg-white p-4 radius-10 shadow-sm">
                    <input type="text" name="Username" placeholder="Username" class="form-control form-control-lg radius-10 mt-2">
                    <input type="password" placeholder="Password" name="Password" class="form-control form-control-lg radius-10 mt-2">
                    <input type="hidden" name="role" value="<?= $i ===0 ?"user" : "admin" ?>">
                    <button class="btn <?= $buttonClass ?> w-100 mt-3 radius-10" name="<?= $buttonName ?>">Login</button>

                </form>
                <?php
                $i++;
            }
            ?>
        </div>
    </div>



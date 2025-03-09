            <?php
            session_start();
            // Disable error reporting for production (enable it for debugging)
            error_reporting(0);

            // Establish database connection
            $conn = mysqli_connect('localhost', 'root', '', 'market');
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }else
                echo "data base connected";
            echo "hihihih";
            // Function to sanitize input data
            function clear($data){
                global $conn;
                return ( mysqli_real_escape_string($conn, htmlspecialchars(trim($data))));
            }

            // Get user IP address
            $ip = $_SERVER['REMOTE_ADDR'];
                echo $ip;
            // Check if IP exists in the `viewer` table
            $query = mysqli_query($conn, "SELECT * FROM `viewer` WHERE `ip` = '$ip'");


            if (mysqli_num_rows($query) == 0) {
                // Insert IP into the database
                mysqli_query($conn, "INSERT INTO `viewer` (`ip`) VALUES ('$ip')");
                echo "Your IP has been logged in the database.";
            } else {
           echo "Your IP is already recorded.";
            }

            function getvistor(){
                global $conn;
                echo "<br>";
               return mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `viewer`"));
            }

            if(isset($_GET['logout'])){
                echo "is logout " ;
                session_unset();
            unset($_SESSION['username']);

            header("Location: /home.php");
            }

            ?>
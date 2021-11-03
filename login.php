<?php include "include/header.php"; ?>
<?php
session_start();
?>
    <div class="link">
        <a href="index.php">Home</a>
    </div>



    <?php
    
    // enter to dashboard by uesing:
    // email => iti@gmail.com
    // password => 123

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $stmt = $connection -> prepare("SELECT * FROM admins WHERE email = ? AND password = ?");
        $stmt-> execute(array($email, $password));

        $count = $stmt-> rowCount();

        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
        if($count > 0 ){
            $_SESSION['name'] = $row['username'];
            header("location:admin/dashboard.php");
        }else{
            echo "NOT FOUND";
        }
    }
    ?>


    <form class="form" action="login.php" method="POST">
        <h2>Login</h2>
        <div class="input">
            <label for="email">Your email: </label>
            <input type="email" name="email" >
        </div>
        <div class="input">
            <label for="password">Password: </label>
            <input type="password" name="password" >
        </div>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
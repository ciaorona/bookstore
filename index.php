<?php include "include/header.php"; ?>
<?php
session_start();
?>
    <section>
        <div class="img_background">
            <img src="image/backg.jpg" alt="">
        </div>
        <div class="login">
            <?php
            if(isset($_SESSION['name'])){
                echo '<a href="admin/dashboard.php">Your Dashboard</a> ';
            }else{
                echo '<a href="login.php">Login As a Admin</a>';
            }
            ?>
        </div>
        <?php

        $query = "SELECT * FROM book_info WHERE book_name =  "
        ?>
        <div class="container">
            <div class="content">
                <h1>Enter Book Name Do You Need?</h1>
                <form action="result.php" method="POST">
                    <div class="search">
                        <input type="search" name="book_name" id="" placeholder="Book Name">
                            <button>Search</button>
                    </div>
                </form>   
            </div>
        </div>

    </section>
</body>
</html>
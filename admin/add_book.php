<?php include "include/header.php"; 
session_start();
?>

    <header>
        <div class="name">
            <h3>Dear, <?php echo $_SESSION['name'] ?></h3>
        </div>
        <div class="links">
            <a href="../index.php">Home</a>
            <a href="add_book.php?logout">LogOut</a>
        </div>
    </header>

    <?php include "include/logout.php"; ?>

    <?php

    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $booknumber = $_POST['booknumber'];
        $bookname = $_POST['bookname'];
        $authorname = $_POST['authorname'];
        $edition = $_POST['edition'];
        $submission = $_POST['submission'];

        $stmt = $connection-> prepare("INSERT INTO book_info(book_number, book_name, author_name, edition, submission) VALUE(?,?,?,?,?)");
        $stmt->execute(array($booknumber, $bookname, $authorname, $edition, $submission));
        if($stmt){
            header("location:dashboard.php");
        }else{
            echo " NOT SAVED DETE";
        }

    }
    ?>
    <form action="add_book.php" method="POST">
        <h2>Add Book</h2>
        <div class="input"> 
            <label for="">Book Number: </label>
            <input type="number" name="booknumber" min="0" id="" value="1">
         </div>
        <div class="input"> 
            <label for="">Book Name: </label>
            <input type="text" name="bookname" id="">
         </div>
        <div class="input"> 
            <label for="">Author Name: </label>
            <input type="text" name="authorname" id="">
         </div>
        <div class="input"> 
            <label for="">Edition:</label>
            <input type="number" name="edition" min="0" id="" value="1">
         </div>
        <div class="input"> 
            <label for="">Submission:</label>
            <input type="number" name="submission" min="0" id="" value="1">
         </div>
         <button>Add Book</button>
         <!-- <input type="button" value="Add Book"> -->
    </form>
</body>
</html>
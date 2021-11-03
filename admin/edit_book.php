<?php include "include/header.php"; 
session_start();
?>

    <header>
        <div class="name">
            <h3>Dear, <?php echo $_SESSION['name'] ?></h3>
        </div>
        <div class="links">
            <a href="../index.php">Home</a>
            <a href="edit_book.php?logout">LogOut</a>
        </div>
    </header>

    <?php include "include/logout.php"; ?>
    <?php

     

        $book_id = $_GET['book_id'];
        $stmt = $connection->prepare("SELECT * FROM book_info WHERE book_id= ?");
        $stmt ->execute(array($book_id));
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            ?>
            <form action="edit_book.php?book_id=<?php echo $book_id?>" method="POST">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        $booknumber = $_POST['booknumber'];
                        $bookname = $_POST['bookname'];
                        $authorname = $_POST['authorname'];
                        $edition = $_POST['edition'];
                        $submission = $_POST['submission'];

                        $stmt = $connection-> prepare("UPDATE book_info SET book_number =?, book_name=?, author_name=?, edition=?, submission=? WHERE book_id =? ");
                        $stmt->execute(array($booknumber, $bookname, $authorname, $edition, $submission, $book_id));
                        if($stmt){
                            header("location:dashboard.php");
                        }else{
                            echo " NOT SAVED DETE";
                        }
                    }
                ?>
                    <h2>Edit Book</h2>
                    <div class="input"> 
                        <label for="">Book Number: </label>
                        <input type="number" name="booknumber" min="0" id="" value="<?php echo $row['book_number'] ?>">
                    </div>
                    <div class="input"> 
                        <label for="">Book Name: </label>
                        <input type="text" name="bookname" id="" value="<?php echo $row['book_name']?>">
                    </div>
                    <div class="input"> 
                        <label for="">Author Name: </label>
                        <input type="text" name="authorname" id="" value="<?php echo $row['author_name'] ?>">
                    </div>
                    <div class="input"> 
                        <label for="">Edition:</label>
                        <input type="number" name="edition" min="0" id="" value="<?php echo $row['edition'] ?>">
                    </div>
                    <div class="input"> 
                        <label for="">Submission:</label>
                        <input type="number" name="submission" min="0" id="" value="<?php echo $row['submission'] ?>">
                    </div>
                    <button>Update Book</button>
            </form>

            <?php
        }
        
    ?>
    
</body>
</html>
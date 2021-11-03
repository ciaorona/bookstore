<?php include "include/header.php"; ?>

    <div class="link">
        <a href="index.php">Home</a>
    </div>

    <div class="result">
    <?php 
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $book_name = trim($_POST['book_name']);

        $query = "SELECT * FROM book_info WHERE book_name LIKE concat('%', ?, '%')";
        $stmt = $connection ->prepare($query);
        $stmt->execute(array($book_name));
        $count = $stmt-> rowCount();

        if($count> 0){
            while($row = $stmt ->fetch(PDO::FETCH_ASSOC)){
                ?>
           
            <div class="book_info">
                <div><span>  <?php echo $row['book_name']?> </span> </div>
                <div><span>Author:  </span><?php echo $row['author_name']?></div>
                <div><span>Edition:  </span><?php echo $row['edition']?></div>
                <div><span>Submission:  </span><?php echo $row['submission']?></div>
            </div>
            <?php  
            }
            }else{
        
                echo '<h2 style="text-align: center;" class="book_info">there are no books by this name</h2>';
            }

    }
    ?>
    </div>
</body>
</html>
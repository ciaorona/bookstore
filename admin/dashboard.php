
<?php include "include/header.php"; 
session_start();
?>
    <header>
        <div class="name">
            <h3>Dear, <?php echo $_SESSION['name']?></h3>
        </div>
        <div class="links">
            <a href="../index.php">Home</a>
            <a href="dashboard.php?logout">LogOut</a>
        </div>
    </header>

    <?php include "include/logout.php";?>

    <a class="add_book" href="add_book.php">Add Book</a>
    <table>
        <tr>
            <th>Number</th>
            <th>Book name</th>
            <th>Aurther</th>
            <th>submation</th>
            <th>edition</th>
        </tr>
        <tr>
    <?php
    $stmt = $connection ->prepare("SELECT * FROM book_info");
    $stmt->execute();
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)){
    ?>
            <td><?php echo $row['book_number']?></td>
            <td><?php echo $row['book_name']?></td>
            <td><?php echo $row['author_name']?></td>
            <td><?php echo $row['edition']?></td>
            <td><?php echo $row['submission']?></td>
            <td> <a href="edit_book.php?source=edit_book&book_id=<?php echo $row['book_id'] ?>">Edit</a> </td>
            <td> <a href="?delete=<?php echo $row['book_id'] ?>">Delete</a></td>
        </tr>
    <?php }?>
    <?php
        if(isset($_GET['delete'])){
            $id = $_GET['delete'];
            $query = "DELETE  FROM book_info  WHERE book_id = ?";  
            $delete = $connection->prepare($query);
            $result = $delete->execute(array($id));
            header("location:dashboard.php");
        }
    ?>
    </table>
</body>
</html>

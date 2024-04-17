<?php
include 'db.php';
include 'functions.php';
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="book.css">
    <title>Delete Book</title>
</head>
<body>
    <div>
        <h1>DELETE BOOKS</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>
                Id:
                <select name="id">
                    <?php
                    deleteBooks();
                    ?>
                </select><br>
            </label>
            <input type="submit" name="submit" value="DELETE">
        </form>
    </div>
    <script src="delete.js"></script>
</body>
</html>
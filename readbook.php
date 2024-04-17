<?php
include 'db.php';
include 'functions.php'
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="book.css">
    <title>Reading database</title>
</head>

<body>
    <div class="container">
        <h1>Books from Booksite</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
                <th>Description</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            
            <?php
                readData();
            ?>
        </table>
        <a id="createbook" href="createbook.php">CREATE BOOK</a>
    </div>
</body>

</html>
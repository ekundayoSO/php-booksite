<?php
include 'db.php';

# APPLICATION OF CRUD

# CREATE => C
function createBooks()
{

    global $connection;

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['publishing_year'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];

        $query = "INSERT INTO books(title, author, publishing_year, genre, description) ";
        $query .= "VALUES('$title', '$author', $year, '$genre', '$description')";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {

            echo "<p style='color:green'>New book is created successfully!</p>" . "<br>";
        }
    }
}

# READ => R
function readData()
{

    global $connection;

    $query = "SELECT * FROM books";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query failed" . mysqli_error($connection));
    }
    while ($row = mysqli_fetch_assoc($result)) {
?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['publishing_year']; ?></td>
            <td><?php echo $row['genre']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><a id="edit" href="updatebook.php?id=<?php echo $row['id']; ?>">Edit</a></td>
            <td><a id="delete" href="deletebook.php?id=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
<?php
    }
}

# UPDATE => U
function updateBook()
{

    global $connection;

    $query = "SELECT * FROM books";
    $result = mysqli_query($connection, $query);

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $year = $_POST['publishing_year'];
        $genre = $_POST['genre'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $query = "UPDATE books SET ";
        $query .= "title = '$title', ";
        $query .= "author = '$author', ";
        $query .= "publishing_year = $year, ";
        $query .= "genre = '$genre', ";
        $query .= "description = '$description' ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            // Redirect before any output
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

# DELETE => D
function deleteBooks()
{

    global $connection;

    $query = "SELECT * FROM books";
    $result = mysqli_query($connection, $query);

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];

        $query = "DELETE FROM books ";
        $query .= "WHERE id = $id ";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed" . mysqli_error($connection));
        } else {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit();
        }
    }

    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

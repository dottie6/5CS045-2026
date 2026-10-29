


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List of All My Movies</title>
</head>
<body>

<h1>List of ALL my movies!!!</h1>

<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Connect to database
include("db.php");

// Check database connection
if (!isset($mysqli) || !$mysqli) {
    die("Database connection failed. Check db.php.");
}

// Run SQL query
$sql = "SELECT Movie_name, Genre, Price, `Date of release`
        FROM movies";

$results = mysqli_query($mysqli, $sql);

if (!$results) {
    die("SQL error: " . mysqli_error($mysqli));
}
?>

<table border="1">
    <tr>
        <th>Movie name</th>
        <th>Genre</th>
        <th>Price</th>
        <th>Date of release</th>
    </tr>

    <?php while ($a_row = mysqli_fetch_assoc($results)): ?>
    <tr>
        <td><?php echo htmlspecialchars($a_row['Movie_name']); ?></td>
        <td><?php echo htmlspecialchars($a_row['Genre']); ?></td>
        <td>&pound;<?php echo number_format((float)$a_row['Price'], 2); ?></td>
        <td>
            <?php
            echo date(
                "d/m/Y",
                strtotime($a_row['Date of release'])
            );
            ?>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php
mysqli_free_result($results);
mysqli_close($mysqli);
?>

</body>
</html>

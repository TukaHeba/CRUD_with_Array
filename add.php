<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $specialty = $_POST['specialty'];

    $_SESSION['details'][] = [
        'full_name' => $full_name,
        'age' => $age,
        'specialty' => $specialty
    ];

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Intern</title>
</head>
<body>
    <h1>Add New Intern</h1>
    <form method="POST" action="add.php">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" required><br><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" required><br><br>

        <label for="specialty">Specialty:</label><br>
        <input type="text" id="specialty" name="specialty" required><br><br>

        <input type="submit" value="Add Intern">
    </form>
    <br>
    <a href="index.php">Back to List</a>
</body>
</html>

<?php
session_start();

if (!isset($_GET['id']) || !isset($_SESSION['details'][$_GET['id']])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];
$detail = $_SESSION['details'][$id];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $age = $_POST['age'];
    $specialty = $_POST['specialty'];

    $_SESSION['details'][$id] = [
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
    <title>Edit Intern</title>
</head>
<body>
    <h1>Edit Intern</h1>
    <form method="POST" action="edit.php?id=<?php echo $id; ?>">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($detail['full_name']); ?>" required><br><br>

        <label for="age">Age:</label><br>
        <input type="number" id="age" name="age" value="<?php echo htmlspecialchars($detail['age']); ?>" required><br><br>

        <label for="specialty">Specialty:</label><br>
        <input type="text" id="specialty" name="specialty" value="<?php echo htmlspecialchars($detail['specialty']); ?>" required><br><br>

        <input type="submit" value="Update Intern">
    </form>
    <br>
    <a href="index.php">Back to List</a>
    
</body>
</html>

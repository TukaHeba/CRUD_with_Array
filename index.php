<?php
session_start();

if (!isset($_SESSION['details'])) {
    $_SESSION['details'] = [];
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    unset($_SESSION['details'][$id]);
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interns Management</title>
</head>
<body>
    <h1>Interns List</h1>
    <table border="1">
        <tr>
            <th>Full Name</th>
            <th>Age</th>
            <th>Specialty</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($_SESSION['details'] as $id => $detail): ?>
        <tr>
            <td><?php echo htmlspecialchars($detail['full_name']); ?></td>
            <td><?php echo htmlspecialchars($detail['age']); ?></td>
            <td><?php echo htmlspecialchars($detail['specialty']); ?></td>
            <td>
                <a href="edit.php?id=<?php echo $id; ?>">Edit</a>
                <a href="index.php?delete=<?php echo $id; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <br>
    <a href="add.php">Add New Intern</a>
</body>
</html>

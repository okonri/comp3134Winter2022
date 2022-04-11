<?php
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

$rows = [];

if (isset($_GET['name'])) {
    $name = $_GET['name'];

    $conn = new PDO("mysql:host=localhost;dbname=usersDB", "newuser", "password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM users WHERE firstname LIKE :firstname AND active=1");
    $stmt->bindParam('firstname', $name);
    $stmt->execute();
    $rows = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Get Users</title>
    <style>
    table,
    tr,
    th,
    td {
        border: 2px ridge #000800;
    }
    </style>
</head>

<body>
    <form method="get">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rows as $row) : ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['firstname'] ?></td>
                <td><?= $row['lastname'] ?></td>
                <td><?= $row['active'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>
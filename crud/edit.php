<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the existing message
    $sql = "SELECT * FROM contacts WHERE id = $id";
    $result = $conn->query($sql);
    $message = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message_content = $_POST['message'];

    $sql = "UPDATE contacts SET name = '$name', email = '$email', message = '$message_content' WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        header("Location: contact_process.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Message</title>
</head>
<body>
    <h2>Edit Message</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $message['id'] ?>">
        <label for="name">Name</label>
        <input type="text" name="name" value="<?= $message['name'] ?>" required><br>
        <label for="email">Email</label>
        <input type="email" name="email" value="<?= $message['email'] ?>" required><br>
        <label for="message">Message</label>
        <textarea name="message" required><?= $message['message'] ?></textarea><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tenant_id = $_POST['tenant_id'];
    $message = $_POST['message'];

    $sql = "INSERT INTO notifications (tenant_id, message) VALUES ('$tenant_id', '$message')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Notification sent successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notification</title>
</head>
<body>
    <h2>Send Notification</h2>
    <form action="send_notification.php" method="POST">
        <label for="tenant_id">Select Tenant:</label>
        <select name="tenant_id" id="tenant_id">
            <?php
            $result = $conn->query("SELECT * FROM tenants");
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['name']."</option>";
            }
            ?>
        </select><br><br>

        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea><br><br>

        <button type="submit">Send Notification</button>
    </form>
</body>
</html>

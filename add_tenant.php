<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $property_id = $_POST['property_id'];

    $sql = "INSERT INTO tenants (name, contact, property_id) VALUES ('$name', '$contact', '$property_id')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Tenant added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Tenant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Add Tenant</h2>
        <div class="card p-4">
            <form action="add_tenant.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Tenant Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="contact" class="form-label">Tenant Contact</label>
                    <input type="text" id="contact" name="contact" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="property_id" class="form-label">Assign Property</label>
                    <select id="property_id" name="property_id" class="form-select">
                        <?php
                        $result = $conn->query("SELECT * FROM properties");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['name']} (UGX {$row['rent_amount']})</option>";
                        }
                        ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Add Tenant</button>
            </form>
        </div>
    </div>
</body>
</html>

<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $rent_amount = $_POST['rent_amount'];

    $sql = "INSERT INTO properties (name, rent_amount) VALUES ('$name', '$rent_amount')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Property added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Property</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h2>Add Property</h2>
        <div class="card p-4">
            <form action="add_property.php" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Property Name</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="rent_amount" class="form-label">Rent Amount (UGX)</label>
                    <input type="number" id="rent_amount" name="rent_amount" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Add Property</button>
            </form>
        </div>
    </div>
</body>
</html>

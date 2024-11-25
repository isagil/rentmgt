<?php
include 'db.php';

$result = $conn->query("SELECT * FROM tenants");

echo "<h2>Manage Tenants</h2>";
echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Contact</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['name']."</td>
    <td>".$row['contact']."</td>
    </tr>";
}

echo "</table>";
?>

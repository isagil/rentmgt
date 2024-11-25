<?php
include 'db.php';

$result = $conn->query("SELECT * FROM properties");

echo "<h2>Manage Properties</h2>";
echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Rent Amount</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['name']."</td>
    <td>".$row['rent_amount']."</td>
    </tr>";
}

echo "</table>";
?>

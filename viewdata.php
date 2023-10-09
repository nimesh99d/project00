<!DOCTYPE html>
<html>
<head>
  <title>Student Data</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
      color: #588c7e;
      font-family: monospace;
      font-size: 25px;
      text-align: left;
    }
    th, td {
      padding: 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    th {
      background-color: #588c7e;
      color: white;
    }
    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h2>Student Data</h2>
  <table>
    <tr>
      <th>Student ID</th>
      <th>Full Name</th>
      <th>Email</th>
      <th>Phone Number</th>
      <th>Birth Date</th>
      <th>Gender</th>
      <th>Street Address</th>
      <th>Region</th>
      <th>Postal Code</th>
    </tr>

    <?php
    $conn = mysqli_connect("localhost", "root", "abc123", "registerdb");

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM regdata_table";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["student_id"]. "</td><td>" . $row["full_name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["phone_number"]. "</td><td>" . $row["birth_date"]. "</td><td>" . $row["gender"]. "</td><td>" . $row["street_address"]. "</td><td>" . $row["region"]. "</td><td>" . $row["postal_code"]. "</td></tr>";
      }
      echo "</table>";
    } else {
      echo "No data found";
    }
    $conn->close();
    ?>
  </table>
</body>
</html>

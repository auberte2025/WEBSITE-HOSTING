<!DOCTYPE html>
<html lang="rw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Students - L4SOD</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        h2 { color: #2c3e50; margin-bottom: 10px; }
        
        /* Container ituma buto na title biba mu murongo */
        .header-container {
            width: 95%;
            max-width: 1000px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        table {
            width: 95%;
            max-width: 1000px;
            border-collapse: collapse;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        th {
            background-color: #2c3e50;
            color: white;
            padding: 18px;
            text-align: left;
            font-size: 14px;
        }
        td {
            padding: 15px;
            border-bottom: 1px solid #edf2f7;
            font-size: 15px;
            color: #4a5568;
        }
        tr:hover { background-color: #f8fafc; }

        /* Buttons Style */
        .btn {
            padding: 8px 16px;
            text-decoration: none;
            font-size: 13px;
            border-radius: 6px;
            color: white;
            display: inline-block;
            transition: all 0.3s ease;
        }
        .btn-add { 
            background-color: #27ae60; 
            font-weight: bold;
            padding: 10px 20px;
        }
        .btn-add:hover { background-color: #219150; transform: translateY(-2px); }
        .btn-view { background-color: #3498db; }
        .btn-edit { background-color: #f1c40f; color: #2d3436; }
        .btn-delete { background-color: #e74c3c; }
        .btn:hover { opacity: 0.8; transform: translateY(-1px); }
        .no-data { color: #a0aec0; margin-top: 30px; font-style: italic; }
    </style>
</head>
<body>
    <div class="header-container">
        <h2>Students List</h2>
        <a href="add.php" class="btn btn-add">+ Add New Student</a>
    </div>
    <?php
    $server = "127.0.0.1";
    $name = "root";
    $password = "";
    $db = "l4sod";
    $connection = mysqli_connect($server, $name, $password, $db);
    if (!$connection) {
        die("<div class='no-data'>Connection failed: " . mysqli_connect_error() . "</div>");
    }
    $sql = "SELECT student_id, student_name, class FROM students";
    $result = mysqli_query($connection, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<thead>
                <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th style='text-align: center;'>Actions</th>
                </tr>
              </thead>
              <tbody>";
        while ($rows = mysqli_fetch_assoc($result)) {
            $id = $rows["student_id"];
            echo "<tr>";
            echo "<td>" . $id . "</td>";
            echo "<td>" .($rows["student_name"]) . "</td>";
            echo "<td>" . ($rows["class"]) . "</td>";
            echo "<td style='text-align: center;'>
                    <a href='view.php?id=$id' class='btn btn-view'>View</a>
                    <a href='edit.php?id=$id' class='btn btn-edit'>Edit</a>
                    <a href='delete.php?id=$id' class='btn btn-delete' onclick=''>Delete</a>
                  </td>";
            echo "</tr>";
        }
        echo "</tbody></table>";
    } else {
        echo "<p class='no-data'>No students found in the database.</p>";
    }
    mysqli_close($connection);
    ?>

</body>
</html>
<?php
$server = "127.0.0.1";
$user = "root";
$password = "";
$db = "l4sod";
$connection = mysqli_connect($server, $user, $password, $db);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
$error_msg = "";
$success_msg = "";
if (isset($_POST["add"])) {
    $name = mysqli_real_escape_string($connection, $_POST["name"]);
    $class = mysqli_real_escape_string($connection, $_POST["class"]);
    if (!empty($name) && !empty($class)) {
        $query = "INSERT INTO STUDENTS (Student_name, Class) VALUES ('$name', '$class')";
        
        if (mysqli_query($connection, $query)) {
            $success_msg = "student was successfull added in system!";
            header("location:DATABASECONNECTION BY PHP.PHP");
            exit();
        } else {
            $error_msg = "wrong inserted in system: " . mysqli_error($connection);
        }
    } else {
        $error_msg = "fill all field ploperly!";
    }
}
?>
<!DOCTYPE html>
<html lang="rw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD new students</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }
        body {
            background: linear-gradient(135deg, #17c0eb 0%, #2541dd 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #333;
        }
        .card {
            background: #ffffff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .card h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #4a4a4a;
            font-size: 22px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 7px;
            font-weight: 600;
            font-size: 14px;
            color: #555;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e1e1;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #667eea;
            box-shadow: 0 0 8px rgba(102, 126, 234, 0.2);
        }

        input[type="submit"] {
            width: 100%;
            padding: 13px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        input[type="submit"]:hover {
            background: #5a67d8;
            transform: translateY(-2px);
        }

        .error-box {
            background: #fff5f5;
            color: #c53030;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid #c53030;
            text-align: center;
        }

        .success-box {
            background: #f0fff4;
            color: #2f855a;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            border-left: 4px solid #38a169;
            text-align: center;
        }

        @media (max-width: 480px) {
            .card {
                margin: 20px;
                padding: 25px;
            }
        }
    </style>
</head>
<body>
<div class="card">
    <h2>Add Student</h2>
    <?php if ($error_msg != ""): ?>
        <div class="error-box">
            <?php echo $error_msg; ?>
        </div>
    <?php endif; ?>
    <?php if ($success_msg != ""): ?>
        <div class="success-box">
            <?php echo $success_msg; ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="">
        <div class="form-group">
            <label for="name">Full Names</label>
            <input type="text" id="name" name="name" placeholder="Write student name" required>
        </div>
        <div class="form-group">
            <label for="class">Class Name</label>
            <input type="text" id="class" name="class" placeholder="Write class name" required>
        </div>
        <input type="submit" name="add" value="Add as New Student">
    </form>
</div>
</body>
</html>
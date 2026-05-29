<?php
require 'db.php';

$stmt = $pdo->query("SELECT * FROM students");
$students = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Management</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f9;
            padding: 30px;
        }

        .container {
            width: 90%;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .add-btn {
            display: inline-block;
            padding: 10px 15px;
            background: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .add-btn:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th {
            background: #007bff;
            color: white;
            padding: 12px;
        }

        table td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        .edit-btn {
            background: #ffc107;
            color: black;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
            margin-right: 5px;
        }

        .edit-btn:hover {
            background: #e0a800;
        }

        .delete-btn {
            background: #dc3545;
            color: white;
            padding: 6px 10px;
            text-decoration: none;
            border-radius: 5px;
        }

        .delete-btn:hover {
            background: #c82333;
        }
    </style>
</head>

<body>

<div class="container">
    <h2>Student Management System</h2>

    <a href="create.php" class="add-btn">+ Add Student</a>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Actions</th>
        </tr>

        <?php foreach ($students as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= htmlspecialchars($s['name']) ?></td>
            <td><?= htmlspecialchars($s['email']) ?></td>
            <td><?= htmlspecialchars($s['course']) ?></td>

            <td>
                <a class="edit-btn" href="edit.php?id=<?= $s['id'] ?>">
                    Edit
                </a>

                <a class="delete-btn"
                   href="delete.php?id=<?= $s['id'] ?>"
                   onclick="return confirm('Are you sure?')">
                    Delete
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
</div>

</body>
</html>
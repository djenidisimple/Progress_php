<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To do list</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php
        include "../To-Do List.php";
        createTable();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = $_POST['task'];
            addTask($task);
        }
    ?>
    <h1>To Do List</h1>
    <form method="POST" action="">
        <input type="text" name="task" placeholder="Add a new task" required>
        <button type="submit">Add</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>id</th>
                <th>Task</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $tasks = getTasks();
                foreach ($tasks as $task) {
                    echo "<tr>";
                    echo "<td>" . $task['id'] . "</td>";
                    echo "<td>" . $task['task'] . "</td>";
                    echo "<td>" . $task['status'] . "</td>";
                    echo "<td>";
                    echo "<a href='edit.php?id=" . $task['id'] . "'>Edit</a>";
                    echo "<a href='delete.php?id=" . $task['id'] . "'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>
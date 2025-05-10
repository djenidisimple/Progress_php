<?php
    if (!isset($_GET['id'])) {
        echo "404 Not Found";
        exit();
    }
    include "../To-Do List.php";
    $id = $_GET['id'];
    $task = getTask($id);
    $succes = $error = null;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $taskName = $_POST['task'];
        $status = $_POST['status'];
        if (empty($taskName)) {
            $error = "Task name cannot be empty.";
        } elseif (strlen($taskName) > 255) {
            $error = "Task name is too long.";
        } else {
            updateTask($id, $taskName, $status);
            $succes = "Task updated successfully.";
        }
        // header("Location: To-Do%20ListView.php");
    }
?>
<h1>Edit Task</h1>
<form method="POST" action="">
    <?php
        if ($succes) {
            echo "<p style='color: green;'>$succes</p>";
        }
        if ($error) {
            echo "<p style='color: red;'>$error</p>";
        }
    ?>
    <label>Tache: </label>
    <input type="text" name="task" value="<?php echo htmlentities($task['task']); ?>" required>
    <label>Etat: </label>
    <select name="status">
        <option value="pending" <?php if ($task['status'] == 'pending') echo 'selected'; ?>>Pending</option>
        <option value="completed" <?php if ($task['status'] == 'completed') echo 'selected'; ?>>Completed</option>
    </select>
    <button type="submit">Update</button>
</form>
<a href="To-Do%20ListView.php">Back to To Do List</a>
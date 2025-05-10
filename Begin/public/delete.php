<?php
    include "../To-Do List.php";
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        deleteTask($id);
        header("Location: To-Do%20ListView.php");
        exit();
    } else {
        echo "404 Not Found";
    }
?>
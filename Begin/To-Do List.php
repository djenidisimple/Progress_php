<?php 
// To-Do List
// Preparation of connexion to the database
if (isset($url)) {
    require_once "../Config/config.php";
} else {
    require_once "../../Config/config.php";
}
function connexion(): PDO
{
    try {
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . "", "root", DB_PASS);
        return $conn;
    } catch (PDOException $e) {
        return "Connection failed: " . $e->getMessage();
    }
}
function getCustomer($name, $psw): bool
{
    try {
        $conn = connexion();
        $sql = "SELECT * FROM customer WHERE name = :name";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':name', $name);
        $stmt->execute();
        $password = $stmt->fetch(PDO::FETCH_ASSOC)['psw'];
        return password_verify($psw, $password);
    } catch (PDOException $e) {
        return false;
    }
}
function createTable(): void
{
    try {
        $conn = connexion();
        $sql = "CREATE TABLE IF NOT EXISTS todo (
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            task VARCHAR(255) NOT NULL,
            status ENUM('pending', 'completed') DEFAULT 'pending'
        )";
        $conn->exec($sql);
    } catch (PDOException $e) {
        echo "Error creating table: " . $e->getMessage();
    }
}
function addTask(string $task): void
{
    $conn = connexion();
    $sql = "INSERT INTO todo (task) VALUES (:task)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':task', $task);
    $stmt->execute();
}
function getTasks(): array
{
    $conn = connexion();
    $sql = "SELECT * FROM todo";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getTask(int $id): array
{
    $conn = connexion();
    $sql = "SELECT * FROM todo WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
function updateTask(int $id, string $task, string $status): void
{
    $conn = connexion();
    $sql = "UPDATE todo SET task = :task, status = :status WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':task', $task);
    $stmt->bindParam(':status', $status);
    $stmt->execute();
}
function deleteTask(int $id): void
{
    $conn = connexion();
    $sql = "DELETE FROM todo WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}
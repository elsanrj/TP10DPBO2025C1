<?php
require_once 'config/Database.php';

class Game {
    private $conn;
    private $table = 'game';

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT g.*, d.name as developer_name, p.name as publisher_name 
                 FROM " . $this->table . " g 
                 JOIN developer d ON g.developer_id = d.id 
                 JOIN publisher p ON g.publisher_id = p.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $query = "SELECT g.*, d.name as developer_name, p.name as publisher_name 
                 FROM " . $this->table . " g 
                 JOIN developer d ON g.developer_id = d.id 
                 JOIN publisher p ON g.publisher_id = p.id
                 WHERE g.id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $description, $developer_id, $publisher_id) {
        $query = "INSERT INTO " . $this->table . " (name, description, developer_id, publisher_id) VALUES (:name, :description, :developer_id, :publisher_id)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':developer_id', $developer_id);
        $stmt->bindParam(':publisher_id', $publisher_id);
        return $stmt->execute();
    }

    public function update($id, $name, $description, $developer_id, $publisher_id) {
        $query = "UPDATE " . $this->table . " SET name = :name, description = :description, developer_id = :developer_id, publisher_id = :publisher_id WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':developer_id', $developer_id);
        $stmt->bindParam(':publisher_id', $publisher_id);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}
?>
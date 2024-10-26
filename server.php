<?php
class Database {
    private $host = 'localhost';
    private $username = 'root';
    private $password = 'admin1234';
    private $database = 'crud_db';
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Method to fetch all Data
    public function getAllContacts() {
        return $this->conn->query("SELECT * FROM contacts");
    }

    // add a new contact
    public function addContact($name, $email, $phone, $address) {
        $stmt = $this->conn->prepare("INSERT INTO contacts (name, email, phone, address) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $name, $email, $phone, $address);
        return $stmt->execute();
    }

    // update a contact 
    public function updateContact($id, $name, $email, $phone, $address) {
        $stmt = $this->conn->prepare("UPDATE contacts SET name=?, email=?, phone=?, address=? WHERE id=?");
        $stmt->bind_param("ssssi", $name, $email, $phone, $address, $id);
        return $stmt->execute();
    }

    // delete a contact
    public function deleteContact($id) {
        $stmt = $this->conn->prepare("DELETE FROM contacts WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}

// Calling function
$db = new Database();
?>

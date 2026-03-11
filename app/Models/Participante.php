<?php
class Participante {
    private $conn;
    private $table_name = "participantes";

    public $id;
    public $nome;
    public $email;
    public $telefone;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create() {
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, email=:email, telefone=:telefone";
        $stmt = $this->conn->prepare($query);

        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->telefone=htmlspecialchars(strip_tags($this->telefone));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":telefone", $this->telefone);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, email = :email, telefone = :telefone WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->telefone=htmlspecialchars(strip_tags($this->telefone));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':telefone', $this->telefone);
        $stmt->bindParam(':id', $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $this->id=htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    function readOne() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->nome = $row['nome'];
        $this->email = $row['email'];
        $this->telefone = $row['telefone'];
    }
}
?>
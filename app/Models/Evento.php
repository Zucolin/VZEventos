<?php
class Evento {
    private $conn;
    private $table_name = "eventos";

    public $id;
    public $nome;
    public $descricao;
    public $data;
    public $horario;
    public $local;
    public $max_participantes;

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
        $query = "INSERT INTO " . $this->table_name . " SET nome=:nome, descricao=:descricao, data=:data, horario=:horario, local=:local, max_participantes=:max_participantes";
        $stmt = $this->conn->prepare($query);

        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->descricao=htmlspecialchars(strip_tags($this->descricao));
        $this->data=htmlspecialchars(strip_tags($this->data));
        $this->horario=htmlspecialchars(strip_tags($this->horario));
        $this->local=htmlspecialchars(strip_tags($this->local));
        $this->max_participantes=htmlspecialchars(strip_tags($this->max_participantes));

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":data", $this->data);
        $stmt->bindParam(":horario", $this->horario);
        $stmt->bindParam(":local", $this->local);
        $stmt->bindParam(":max_participantes", $this->max_participantes);

        if($stmt->execute()) {
            return true;
        }
        return false;
    }

    function update() {
        $query = "UPDATE " . $this->table_name . " SET nome = :nome, descricao = :descricao, data = :data, horario = :horario, local = :local, max_participantes = :max_participantes WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $this->nome=htmlspecialchars(strip_tags($this->nome));
        $this->descricao=htmlspecialchars(strip_tags($this->descricao));
        $this->data=htmlspecialchars(strip_tags($this->data));
        $this->horario=htmlspecialchars(strip_tags($this->horario));
        $this->local=htmlspecialchars(strip_tags($this->local));
        $this->max_participantes=htmlspecialchars(strip_tags($this->max_participantes));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(':nome', $this->nome);
        $stmt->bindParam(':descricao', $this->descricao);
        $stmt->bindParam(':data', $this->data);
        $stmt->bindParam(':horario', $this->horario);
        $stmt->bindParam(':local', $this->local);
        $stmt->bindParam(':max_participantes', $this->max_participantes);
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
        $this->descricao = $row['descricao'];
        $this->data = $row['data'];
        $this->horario = $row['horario'];
        $this->local = $row['local'];
        $this->max_participantes = $row['max_participantes'];
    }
}
?>
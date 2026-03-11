<?php
class Inscricao {
    private $conn;
    private $table_name = "inscricoes";

    public $id;
    public $evento_id;
    public $participante_id;

    public function __construct($db) {
        $this->conn = $db;
    }

    function read() {
        $query = "SELECT i.id, e.nome as evento, p.nome as participante FROM " . $this->table_name . " i
                  LEFT JOIN eventos e ON i.evento_id = e.id
                  LEFT JOIN participantes p ON i.participante_id = p.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    function create() {
        // Verifica se o participante já está inscrito no evento
        if ($this->isAlreadyRegistered()) {
            return false;
        }
    
        // Verifica se o número máximo de participantes foi atingido
        if ($this->isEventFull()) {
            return false;
        }
    
        $query = "INSERT INTO " . $this->table_name . " SET evento_id=:evento_id, participante_id=:participante_id";
        $stmt = $this->conn->prepare($query);
    
        $this->evento_id = htmlspecialchars(strip_tags($this->evento_id));
        $this->participante_id = htmlspecialchars(strip_tags($this->participante_id));
    
        $stmt->bindParam(":evento_id", $this->evento_id);
        $stmt->bindParam(":participante_id", $this->participante_id);
    
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    
    function isAlreadyRegistered() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE evento_id = ? AND participante_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->evento_id);
        $stmt->bindParam(2, $this->participante_id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
    
    function isEventFull() {
        // Obtem o número máximo de participantes do evento
        $query_max = "SELECT max_participantes FROM eventos WHERE id = ?";
        $stmt_max = $this->conn->prepare($query_max);
        $stmt_max->bindParam(1, $this->evento_id);
        $stmt_max->execute();
        $row_max = $stmt_max->fetch(PDO::FETCH_ASSOC);
        $max_participantes = $row_max['max_participantes'];
    
        // Conta o número de inscritos no evento
        $query_count = "SELECT COUNT(*) as total_inscritos FROM " . $this->table_name . " WHERE evento_id = ?";
        $stmt_count = $this->conn->prepare($query_count);
        $stmt_count->bindParam(1, $this->evento_id);
        $stmt_count->execute();
        $row_count = $stmt_count->fetch(PDO::FETCH_ASSOC);
        $total_inscritos = $row_count['total_inscritos'];
    
        if ($total_inscritos >= $max_participantes) {
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

    function getParticipantsByEvent($evento_id) {
        $query = "SELECT p.nome, p.email, p.telefone FROM participantes p
                  JOIN inscricoes i ON p.id = i.participante_id
                  WHERE i.evento_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $evento_id);
        $stmt->execute();
        return $stmt;
    }
}
?>
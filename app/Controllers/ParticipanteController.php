<?php
include_once __DIR__ . '/../database.php';
include_once __DIR__ . '/../models/Participante.php';

class ParticipanteController {
    private $db;
    private $participante;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->participante = new Participante($this->db);
    }

    public function index() {
        $stmt = $this->participante->read();
        view('participantes/index.php', ['stmt' => $stmt]);
    }

    public function create() {
        if($_POST) {
            $this->participante->nome = $_POST['nome'];
            $this->participante->email = $_POST['email'];
            $this->participante->telefone = $_POST['telefone'];
            if($this->participante->create()) {
                header("Location: " . BASE_URL . "/participantes");
            }
        }
        view('participantes/create.php');
    }

    public function edit($id) {
        $this->participante->id = $id;
        if($_POST) {
            $this->participante->nome = $_POST['nome'];
            $this->participante->email = $_POST['email'];
            $this->participante->telefone = $_POST['telefone'];
            if($this->participante->update()) {
                header("Location: " . BASE_URL . "/participantes");
            }
        }
        $this->participante->readOne();
        view('participantes/edit.php', ['participante' => $this->participante]);
    }

    public function delete($id) {
        $this->participante->id = $id;
        if($this->participante->delete()) {
            header("Location: " . BASE_URL . "/participantes");
        }
    }
}
?>
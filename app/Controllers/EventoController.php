<?php
include_once __DIR__ . '/../database.php';
include_once __DIR__ . '/../models/Evento.php';

class EventoController {
    private $db;
    private $evento;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->evento = new Evento($this->db);
    }

    public function index() {
        $stmt = $this->evento->read();
        view('eventos/index.php', ['stmt' => $stmt]);
    }

    public function create() {
        if($_POST) {
            $this->evento->nome = $_POST['nome'];
            $this->evento->descricao = $_POST['descricao'];
            $this->evento->data = $_POST['data'];
            $this->evento->horario = $_POST['horario'];
            $this->evento->local = $_POST['local'];
            $this->evento->max_participantes = $_POST['max_participantes'];
            if($this->evento->create()) {
                header("Location: " . BASE_URL . "/eventos");
            }
        }
        view('eventos/create.php');
    }

    public function edit($id) {
        $this->evento->id = $id;
        if($_POST) {
            $this->evento->nome = $_POST['nome'];
            $this->evento->descricao = $_POST['descricao'];
            $this->evento->data = $_POST['data'];
            $this->evento->horario = $_POST['horario'];
            $this->evento->local = $_POST['local'];
            $this->evento->max_participantes = $_POST['max_participantes'];
            if($this->evento->update()) {
                header("Location: " . BASE_URL . "/eventos");
            }
        }
        $this->evento->readOne();
        view('eventos/edit.php', ['evento' => $this->evento]);
    }

    public function delete($id) {
        $this->evento->id = $id;
        if($this->evento->delete()) {
            header("Location: " . BASE_URL . "/eventos");
        }
    }
}
?>
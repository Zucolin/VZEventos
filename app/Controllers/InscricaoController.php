<?php
include_once __DIR__ . '/../database.php';
include_once __DIR__ . '/../models/Inscricao.php';
include_once __DIR__ . '/../models/Evento.php';
include_once __DIR__ . '/../models/Participante.php';

class InscricaoController {
    private $db;
    private $inscricao;
    private $evento;
    private $participante;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->inscricao = new Inscricao($this->db);
        $this->evento = new Evento($this->db);
        $this->participante = new Participante($this->db);
    }

    public function index() {
        $stmt = $this->inscricao->read();
        view('inscricoes/index.php', ['stmt' => $stmt]);
    }

    public function create() {
        if($_POST) {
            $this->inscricao->evento_id = $_POST['evento_id'];
            $this->inscricao->participante_id = $_POST['participante_id'];
            if($this->inscricao->create()) {
                header("Location: " . BASE_URL . "/inscricoes");
            } else {
                echo "Erro ao inscrever participante.";
            }
        }
        $stmt_eventos = $this->evento->read();
        $stmt_participantes = $this->participante->read();
        view('inscricoes/create.php', [
            'stmt_eventos' => $stmt_eventos,
            'stmt_participantes' => $stmt_participantes
        ]);
    }

    public function delete($id) {
        $this->inscricao->id = $id;
        if($this->inscricao->delete()) {
            header("Location: " . BASE_URL . "/inscricoes");
        }
    }

    public function listByEvent($evento_id) {
        $stmt = $this->inscricao->getParticipantsByEvent($evento_id);
        view('inscricoes/list_by_event.php', ['stmt' => $stmt]);
    }
}
?>
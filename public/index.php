<?php
// Habilitar a exibição de erros para depuração (remover em produção)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . '/../app/database.php';
include_once __DIR__ . '/../app/controllers/EventoController.php';
include_once __DIR__ . '/../app/controllers/ParticipanteController.php';
include_once __DIR__ . '/../app/controllers/InscricaoController.php';

/**
 * Função auxiliar para renderizar uma view de forma fácil.
 * @param string $path O caminho para o arquivo da view dentro da pasta 'views'.
 * @param array $data Um array de dados para tornar disponível para a view.
 */
function view($path, $data = []) {
    // Transforma as chaves do array em variáveis (ex: $data['stmt'] vira $stmt).
    extract($data);

    // Constrói o caminho completo para o arquivo da view.
    // A pasta é 'views' (minúsculo) com base nos arquivos de contexto.
    $fullPath = __DIR__ . '/../app/views/' . $path;

    // Inclui o arquivo da view.
    require $fullPath;
}

// Define a URL base da aplicação para construir links e redirecionamentos de forma segura.
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
$baseUri = rtrim($scriptName, '/');
define('BASE_URL', $protocol . $host . $baseUri);

// Processa a rota a partir da URL, removendo a base.
$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$route = '/';
if (substr($requestPath, 0, strlen($baseUri)) == $baseUri) {
    $route = substr($requestPath, strlen($baseUri));
}
$route = trim($route, '/');
$segments = explode('/', $route);

// Redireciona explicitamente a raiz para eventos/index
if ($route === '') {
    header("Location: " . BASE_URL . "/eventos");
    exit;
}

// Roteamento
$controller_slug = !empty($segments[0]) ? $segments[0] : 'eventos';
$action = $segments[1] ?? 'index';
$id = $segments[2] ?? null;

$controller_map = [
    'eventos' => 'EventoController',
    'participantes' => 'ParticipanteController',
    'inscricoes' => 'InscricaoController'
];

$controller_name = $controller_map[$controller_slug] ?? '';

if (class_exists($controller_name)) {
    $controller = new $controller_name();
    if (method_exists($controller, $action)) {
        $controller->$action($id);
    } else {
        http_response_code(404);
        echo "404 - Action not found";
    }
} else {
    http_response_code(404);
    echo "404 - Controller not found";
}
?>
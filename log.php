<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if ($data) {

    $nome = $data["name"] ?? "";
    $whatsapp = $data["whatsapp"] ?? "";

    $dataHora = date("d/m/Y H:i:s");

    $linha = "[$dataHora] Nome: $nome | WhatsApp: $whatsapp\n";

    file_put_contents("clientes.log", $linha, FILE_APPEND);

    echo json_encode([
        "status" => "ok"
    ]);

} else {

    echo json_encode([
        "status" => "erro"
    ]);

}

?>

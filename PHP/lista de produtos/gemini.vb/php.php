<?phP
    header("Content-Type: application/json");

    $mensagem = $_POST["mensagem"] ?? "";

    $api_key = "AIzaSyAHd_JHE-Mmss6fDIS077-V5kZ5V4uqpSc";

    $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-2.0-flash:generateContent?key=" . $api_key;

    $prompt_iot = "
    você é um assistente virtual que explica conceitos basicos de enfermagem com Iot.
    Fale sempre de forma simples, como se estivesse falando para iniciantes.
    Dê exemplos práticos de como: a internet das coisas está sendo usada no campo da enfermagem.
    Responda SEMPRE de forma bem resumida (no máximo 3 frases). Use apenas texto simples, sem negrito, sem asteriscos e sem formatação. 
    
    Mensagem: $mensagem
    ";
    
    $data = [
        "contents" => [
            [
                "parts" => [
                    ["text" => $prompt_iot]
                ]
            ]
        ]
    ];



$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if(curl_errno($ch)){
    echo json_encode(["resposta" => "❌ Erro ao conectar à IA: " . curl_error($ch)]);
    exit;
}

curl_close($ch);

$json = json_decode($response, true);

$resposta = $json["candidates"][0]["content"]["parts"][0]["text"]
    ?? "❌ A IA não respondeu. verifique sua API KEY.";

echo json_encode(["resposta" => $resposta]);
    
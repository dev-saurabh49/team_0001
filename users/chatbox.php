<?php
header('Content-Type: application/json');
$data = json_decode(file_get_contents("php://input"), true);
$userMessage = $data['message'] ?? '';

$apiKey = "YOUR_OPENAI_API_KEY"; // Replace with your key

$ch = curl_init("https://api.openai.com/v1/chat/completions");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json",
    "Authorization: Bearer $apiKey"
]);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
    "model" => "gpt-3.5-turbo",
    "messages" => [["role" => "user", "content" => $userMessage]]
]));

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);
$botReply = $result['choices'][0]['message']['content'] ?? "Sorry, I couldn't understand.";

echo json_encode(["reply" => $botReply]);

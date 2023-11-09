<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["translate"])) {
    $text = $_GET["text"];
    $targetLanguage = $_GET["fr"]; // The target language to translate to, e.g., "fr" for French

    // Google Translate API endpoint
    $url = "https://translation.googleapis.com/language/translate/v2?key=YOUR_API_KEY";

    // Prepare the request data
    $data = array(
        "q" => $text,
        "target" => $targetLanguage
    );

    // Send a POST request to Google Translate API
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    // Parse the JSON response and return translated text
    $translatedText = json_decode($response, true)["data"]["translations"][0]["translatedText"];
    echo $translatedText;
    exit();
}
?>

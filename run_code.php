<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $language = $_POST['language'];
    $code = $_POST['code'];
    $input = $_POST['sample_input'];
    $expected = $_POST['expected_output'];

    // JDoodle API credentials (get these from your JDoodle account)
    $clientId = "36f75eff1fd83a7d7cbd80e98750bd30";
    $clientSecret = "1ce7b1f4b996b11bda1a5cb486272a527efa7561e780d18aeb6cb1c439c36672";

    $program = [
        "script" => $code,
        "language" => $language,
        "versionIndex" => "0",
        "stdin" => $input,
        "clientId" => $clientId,
        "clientSecret" => $clientSecret
    ];

    $ch = curl_init("https://api.jdoodle.com/v1/execute");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($program));

    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    echo "<h2>Result</h2>";
    echo "<b>Actual Output:</b><pre>" . htmlspecialchars($result['output']) . "</pre>";
    echo "<b>Expected Output:</b><pre>" . htmlspecialchars($expected) . "</pre>";

    if (trim($expected) === trim($result['output'])) {
        echo "<h3 style='color:green;'>✅ Correct</h3>";
    } else {
        echo "<h3 style='color:red;'>❌ Incorrect</h3>";
    }
}
?>





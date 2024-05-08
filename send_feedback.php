<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the feedback message
    $feedbackMessage = $_POST["feedback-name"];
    $feedbackMessage = $_POST["feedback-message"];

    // Path to the file where feedback messages will be stored
    $file = "feedbacks.txt";

    // Append the feedback message to the file
    file_put_contents($file, $feedbackMessage . PHP_EOL, FILE_APPEND | LOCK_EX);

    // Return success response
    echo json_encode(array("status" => "success", "message" => "Feedback saved successfully!"));
} else {
    // Redirect if accessed directly
    header("Location: index.html");
    exit();
}
?>

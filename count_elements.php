<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    $elementName = $_POST['element'];

    // Validate the URL
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        echo json_encode(array(
            'error' => 'Invalid URL format.'
        ));
        exit; // Exit the script
    }

    // Validate the HTML element name (e.g., only allow letters, numbers, and underscores)
    if (!preg_match('/^[a-zA-Z0-9_]+$/', $elementName)) {
        echo json_encode(array(
            'error' => 'Invalid HTML element name.'
        ));
        exit; // Exit the script
    }

    // Define database connection parameters
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'element_counter_db';

    // Create a new MySQLi instance with error handling
    $mysqli = new mysqli($host, $username, $password, $database);

    // Check the connection and handle errors
    if ($mysqli->connect_error) {
        echo json_encode(array(
            'error' => 'Database connection failed: ' . $mysqli->connect_error
        ));
        exit; // Exit the script
    }

    $startTime = microtime(true);

    // Fetch the HTML content of the URL
    $htmlContent = file_get_contents($url);

    if ($htmlContent === false) {
        echo json_encode(array(
            'error' => 'Unable to fetch the HTML content of the URL.'
        ));
    } else {
        $dom = new DOMDocument();
        @$dom->loadHTML($htmlContent);
        $elementCount = count($dom->getElementsByTagName($elementName));

        $responseTime = round((microtime(true) - $startTime) * 1000);

        // Insert request data into the 'requests' table
        $sql = "INSERT INTO requests (domain, url, element, duration) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);

        // Check for a prepared statement error
        if ($stmt === false) {
            echo json_encode(array(
                'error' => 'Database error: ' . $mysqli->error
            ));
            exit; // Exit the script
        }

        $stmt->bind_param("sssi", $domain, $url, $elementName, $responseTime);

        $domain = parse_url($url, PHP_URL_HOST);
        $stmt->execute();

        // Check for a statement execution error
        if ($stmt->error) {
            echo json_encode(array(
                'error' => 'Database error: ' . $stmt->error
            ));
            exit; // Exit the script
        }

        $stmt->close();

        // Return the response as JSON
        $response = array(
            'url' => $url,
            'timestamp' => date('d/m/Y H:i'),
            'response_time' => $responseTime,
            'element_count' => $elementCount
        );

        echo json_encode($response);
    }

    // Close the database connection
    $mysqli->close();
} else {
    // Handle invalid request method
    http_response_code(405); // Method Not Allowed
    echo json_encode(array(
        'error' => 'Invalid request method.'
    ));
}
?>

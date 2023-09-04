<?php
// Include the header HTML
include('header.html');

// Connect to the database
$mysqli = new mysqli('localhost', 'root', '', 'element_counter_db');
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Fetch general statistics
$generalStats = fetchGeneralStatistics($mysqli);

// Fetch domain statistics
$domainStats = fetchDomainStatistics($mysqli);

// Close the database connection
$mysqli->close();
?>

<h1>General Statistics</h1>
<p><?php echo $generalStats; ?></p>

<h1>Domain Statistics</h1>
<p><?php echo $domainStats; ?></p>

<?php
// Include the footer HTML
include('footer.html');
?>

<?php
require_once("/var/www/config.php");

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit('POST request method required');
}


  // Create Connection
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);



  // Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



  // Generate unique submission ID
$submission_id = uniqid();



  // Handle file uploads
$plcFile = $_FILES['plcFile']['name'];
$supplementaldocs = $_FILES['supplementaldocs']['name'];
$target_dir = "/var/www/PLC-Code-Repo/uploads/"; // Specify target directory for uploads
move_uploaded_file($_FILES['plcFile']['tmp_name'], $target_dir . $plcFile);
move_uploaded_file($_FILES['supplementaldocs']['tmp_name'], $target_dir . $supplementaldocs);



  // Update SQL file
$sqlFilePath = "/var/www/PLC-Code-Repo/uploads/inputcoderepo.sql"; // Path to your SQL file
$sqlFile = fopen($sqlFilePath, 'a'); // Open the SQL file for appending data



  // Validate file types and sizes for PLC file
$plcFileActualExt = strtolower(pathinfo($plcFile, PATHINFO_EXTENSION));
$plcFileallowed = array('acd', 'l5x', 'l5k', 'rss', 'dmd', 'xef', 'dcf', 'apr', 'zap13', 'project', 'xml');
$plcFileSize = $_FILES['plcFile']['size'];
$plcFileError = $_FILES['plcFile']['error'];



  // Validate file types and sizes for Supplemental Docs
$supplementaldocsActualExt = strtolower(pathinfo($supplementaldocs, PATHINFO_EXTENSION));
$supplementaldocsAllowed = array('pdf', 'jpg', 'png', 'txt');
$supplementaldocsSize = $_FILES['supplementaldocs']['size'];
$supplementaldocsError = $_FILES['supplementaldocs']['error'];

$errors = []; // Array to store error messages



  // Validate file types and sizes for PLC file
if (!in_array($plcFileActualExt, $plcFileallowed)) {
    $errors[] = "You cannot upload PLC files of this type!";
} elseif ($plcFileError !== 0) {
    $errors[] = "There was an error uploading your PLC file!";
} elseif ($plcFileSize > 5000000) {
    $errors[] = "Your PLC file is too big!";
}



  // Check file types and sizes for Supplemental Docs
if (!in_array($supplementaldocsActualExt, $supplementaldocsAllowed)) {
    $errors[] = "You cannot upload Supplemental Docs of this type!";
} elseif ($supplementaldocsError !== 0) {
    $errors[] = "There was an error uploading your supplemental file!";
} elseif ($supplementaldocsSize > 4000000) {
    $errors[] = "Your supplemental file is too big!";
}



  // Check if there are any errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . "<br>";
    }
    // Optionally, you can provide a link back to the upload form or another page
    echo '<a href="uploadp.php">Go back</a>';
} else {
    // Proceed with database insertion and redirection
    // Retrieve Dropdown selections
    $dropdown1 = $_POST['vendor'];
    $dropdown2 = $_POST['lang'];
    $dropdown3 = $_POST['IndProfOrStu'];
    $dropdown4 = $_POST['RealWorldSys'];



  // Prepare SQL statement using prepared statement
    $sql = "INSERT INTO submission_form (submissionID, programfile, supplementalfile, vendor, lang, programmertype, realworldsys)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $submission_id, $plcFile, $supplementaldocs, $dropdown1, $dropdown2, $dropdown3, $dropdown4);



  // New Execute SQL query
    if ($stmt->execute()) {
        // Close prepared statement
        $stmt->close();
        // Close SQL file
        fclose($sqlFile);
        // Redirect to success page
        header("Location: success.html?uploadsuccess");
        exit(); // Terminate script execution after redirection
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}



  // Close database connection
$conn->close();
?>


// Example Code to disallow certain characters in file name and add a "(1)" at the end of a file if it already exists:
/*Where should this be placed?

// Replace any characters not \w- in the original filename
$pathinfo = pathinfo($_FILES["image"]["name"]);

$base = $pathinfo["filename"];

$base = preg_replace("/[^\w-]/", "_", $base);

$filename = $base . "." . $pathinfo["extension"];

$destination = __DIR__ . "/uploads/" . $filename;

// Add a numeric suffix if the file already exists
$i = 1;

while (file_exists($destination)) {

    $filename = $base . "($i)." . $pathinfo["extension"];
    $destination = __DIR__ . "/uploads/" . $filename;

    $i++;
}

if ( ! move_uploaded_file($_FILES["image"]["tmp_name"], $destination)) {

    exit("Can't move uploaded file");

}
*/
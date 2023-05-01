<?php
// Establish a connection to the database
include "connexion.php";

// Get the ID of the record to be deleted
$id = $_GET["id"];

// Delete the record from the database
$sql = "DELETE FROM revenue WHERE id='$id'";

if (mysqli_query($db, $sql)) {
    header("Location: revenues.php");
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . mysqli_error($db);
}

// Close the connection
mysqli_close($db);
?>
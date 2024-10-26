<?php
include 'server.php';

$id = $_GET['id'];
if ($db->deleteContact($id)) {
    header("Location: index.php");
} else {
    echo "Error deleting contact.";
}
?>

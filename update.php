<?php
include 'server.php';

$id = $_GET['id'];
$result = $db->conn->query("SELECT * FROM contacts WHERE id=$id");
$contact = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($db->updateContact($id, $name, $email, $phone, $address)) {
        header("Location: index.php");
    } else {
        echo "Error updating contact.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold text-center mb-6">Edit Contact</h2>
        <form method="POST" class="bg-white p-6 rounded shadow-md w-1/2 mx-auto">
            <label>Name:</label>
            <input type="text" name="name" value="<?php echo $contact['name']; ?>" class="w-full border mb-4 px-2 py-1" required>
            
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $contact['email']; ?>" class="w-full border mb-4 px-2 py-1" required>
            
            <label>Phone:</label>
            <input type="text" name="phone" value="<?php echo $contact['phone']; ?>" class="w-full border mb-4 px-2 py-1" required>
            
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo $contact['address']; ?>" class="w-full border mb-4 px-2 py-1" required>
            
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Update</button>
        </form>
    </div>
</body>
</html>

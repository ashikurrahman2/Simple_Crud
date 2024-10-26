<?php
include 'server.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if ($db->addContact($name, $email, $phone, $address)) {
        header("Location: index.php");
    } else {
        echo "Error adding contact.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold text-center mb-6">Add Contact</h2>
        <form method="POST" class="bg-white p-6 rounded shadow-md w-1/2 mx-auto">
            <label>Name:</label>
            <input type="text" name="name" class="w-full border mb-4 px-2 py-1" required>
            
            <label>Email:</label>
            <input type="email" name="email" class="w-full border mb-4 px-2 py-1" required>
            
            <label>Phone:</label>
            <input type="text" name="phone" class="w-full border mb-4 px-2 py-1" required>
            
            <label>Address:</label>
            <input type="text" name="address" class="w-full border mb-4 px-2 py-1" required>
            
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Save</button>
        </form>
    </div>
</body>
</html>

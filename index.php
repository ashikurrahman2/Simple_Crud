<?php include 'server.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contacts</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.3/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-10">
        <h2 class="text-3xl font-bold text-center mb-6">Contacts</h2>
        <div class="flex justify-end mb-4">
            <a href="create.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Contact</a>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Phone</th>
                    <th class="py-2 px-4 border-b">Address</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $db->getAllContacts();
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td class='py-2 px-4 border-b'>{$row['name']}</td>";
                        echo "<td class='py-2 px-4 border-b'>{$row['email']}</td>";
                        echo "<td class='py-2 px-4 border-b'>{$row['phone']}</td>";
                        echo "<td class='py-2 px-4 border-b'>{$row['address']}</td>";
                        echo "<td class='py-2 px-4 border-b'>
                            <a href='update.php?id={$row['id']}' class='bg-yellow-500 hover:bg-yellow-700 text-white py-1 px-2 rounded'>Edit</a>
                            <a href='delete.php?id={$row['id']}' class='bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded'>Delete</a>
                        </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5' class='text-center py-4'>No contacts found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

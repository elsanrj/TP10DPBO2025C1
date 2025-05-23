<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Publisher List</h2>
<a href="index.php?entity=publisher&action=add" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Add</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Name</th>
        <th class="border p-2">Location</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($publisherList as $pub): ?>
    <tr>
        <td class="border p-2"><?php echo $pub['name']; ?></td>
        <td class="border p-2"><?php echo $pub['location']; ?></td>
        <td class="border p-2 flex gap-2">
            <a href="index.php?entity=publisher&action=edit&id=<?php echo $pub['id']; ?>" class="bg-yellow-500 hover:bg-yellow-700 text-white py-2 px-4 rounded">Edit</a>
            <a href="index.php?entity=publisher&action=delete&id=<?php echo $pub['id']; ?>" class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
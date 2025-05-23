<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4">Game List</h2>
<a href="index.php?entity=game&action=add" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4 inline-block">Add</a>
<table class="w-full border">
    <tr class="bg-gray-200">
        <th class="border p-2">Name</th>
        <th class="border p-2">Description</th>
        <th class="border p-2">Developer</th>
        <th class="border p-2">Publisher</th>
        <th class="border p-2">Actions</th>
    </tr>
    <?php foreach ($gameList as $game): ?>
    <tr>
        <td class="border p-2"><?php echo $game['name']; ?></td>
        <td class="border p-2"><?php echo $game['description']; ?></td>
        <td class="border p-2"><?php echo $game['developer_name']; ?></td>
        <td class="border p-2"><?php echo $game['publisher_name']; ?></td>
        <td class="border p-2 flex gap-2">
            <a href="index.php?entity=game&action=edit&id=<?php echo $game['id']; ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded">Edit</a>
            <a href="index.php?entity=game&action=delete&id=<?php echo $game['id']; ?>" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded" onclick="return confirm('Are you sure?');">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php
require_once 'views/template/footer.php';
?>
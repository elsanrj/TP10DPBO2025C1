<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($publisher) ? 'Edit Publisher' : 'Add Publisher'; ?></h2>
<form action="index.php?entity=publisher&action=<?php echo isset($publisher) ? 'update&id=' . $publisher['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="<?php echo isset($publisher) ? $publisher['name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Location:</label>
        <input type="text" name="location" value="<?php echo isset($publisher) ? $publisher['location'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
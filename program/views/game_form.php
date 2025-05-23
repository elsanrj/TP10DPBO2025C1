<?php
require_once 'views/template/header.php';
?>

<h2 class="text-xl mb-4"><?php echo isset($game) ? 'Edit Game' : 'Add Game'; ?></h2>
<form action="index.php?entity=game&action=<?php echo isset($game) ? 'update&id=' . $game['id'] : 'save'; ?>" method="POST" class="space-y-4">
    <div>
        <label class="block">Name:</label>
        <input type="text" name="name" value="<?php echo isset($game) ? $game['name'] : ''; ?>" class="border p-2 w-full" required>
    </div>
        <div>
        <label class="block">Description:</label>
        <input type="text" name="description" value="<?php echo isset($game) ? $game['description'] : ''; ?>" class="border p-2 w-full" required>
    </div>
    <div>
        <label class="block">Developer:</label>
        <select name="developer_id" class="border p-2 w-full" required>
            <?php foreach ($developers as $dev): ?>
            <option value="<?php echo $dev['id']; ?>" <?php echo isset($game) && $game['developer_id'] == $dev['id'] ? 'selected' : ''; ?>><?php echo $dev['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label class="block">Publisher:</label>
        <select name="publisher_id" class="border p-2 w-full" required>
            <?php foreach ($publishers as $pub): ?>
            <option value="<?php echo $pub['id']; ?>" <?php echo isset($game) && $game['publisher_id'] == $pub['id'] ? 'selected' : ''; ?>><?php echo $pub['name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
</form>

<?php
require_once 'views/template/footer.php';
?>
<?php defined('_JEXEC') or die; ?>
<h1>Manage Easy Chef Recipes</h1>
<table>
    <tr>
        <th>Title</th>
        <th>Category</th>
        <th>State</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($this->items as $item): ?>
        <tr>
            <td><?php echo $this->escape($item->title); ?></td>
            <td><?php echo $this->getCategoryTitle($item->catid); ?></td>
            <td><?php echo $item->published ? 'Published' : 'Pending'; ?></td>
            <td>
                <a href="<?php echo JRoute::_('index.php?option=com_easy_chef&task=recipes.approve&id=' . $item->id); ?>">Approve</a>
                <a href="<?php echo JRoute::_('index.php?option=com_easy_chef&task=recipe.edit&id=' . $item->id); ?>">Edit</a>
                <a href="<?php echo JRoute::_('index.php?option=com_easy_chef&task=recipe.delete&id=' . $item->id); ?>">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="<?php echo JRoute::_('index.php?option=com_easy_chef&task=recipes.export'); ?>">Export to CSV</a>
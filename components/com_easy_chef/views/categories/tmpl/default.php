<?php defined('_JEXEC') or die; ?>
<h1>Easy Chef Categories</h1>
<?php $layout = $this->params->get('category_layout', 'list'); ?>
<?php if ($layout == 'grid'): ?>
    <div class="category-grid">
        <?php foreach ($this->items as $item): ?>
            <div class="category-card">
                <h2><?php echo $this->escape($item->title); ?></h2>
                <p><a href="<?php echo JRoute::_('index.php?option=com_easy_chef&view=recipes&catid=' . $item->id); ?>">View Recipes</a></p>
            </div>
        <?php endforeach; ?>
    </div>
    <style>
    .category-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
    .category-card { border: 1px solid #ccc; padding: 10px; text-align: center; }
    </style>
<?php else: ?>
    <ul class="category-list">
        <?php foreach ($this->items as $item): ?>
            <li>
                <h2><?php echo $this->escape($item->title); ?></h2>
                <p><a href="<?php echo JRoute::_('index.php?option=com_easy_chef&view=recipes&catid=' . $item->id); ?>">View Recipes</a></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
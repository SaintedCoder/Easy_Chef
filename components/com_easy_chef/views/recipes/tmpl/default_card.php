<?php defined('_JEXEC') or die; ?>
<div class="recipe-grid">
    <?php foreach ($this->items as $item): ?>
        <div class="recipe-card">
            <h2><?php echo $this->escape($item->title); ?></h2>
            <?php if ($item->picture): ?>
                <img src="<?php echo $item->picture; ?>" alt="<?php echo $item->title; ?>">
            <?php endif; ?>
            <p><a href="<?php echo JRoute::_('index.php?option=com_easy_chef&view=recipe&id=' . $item->id); ?>">View Recipe</a></p>
        </div>
    <?php endforeach; ?>
</div>
<style>
.recipe-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 20px; }
.recipe-card { border: 1px solid #ccc; padding: 10px; text-align: center; }
</style>
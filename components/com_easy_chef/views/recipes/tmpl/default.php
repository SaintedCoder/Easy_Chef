<?php defined('_JEXEC') or die; ?>
<h1>Easy Chef Recipes</h1>
<div>
    <input type="text" id="search-input" placeholder="Search recipes or articles...">
    <div id="search-results"></div>
</div>
<script>
document.getElementById('search-input').addEventListener('input', function() {
    let query = this.value;
    if (query.length > 2) {
        fetch('index.php?option=com_easy_chef&task=search.ajax&format=raw&query=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                let resultsDiv = document.getElementById('search-results');
                resultsDiv.innerHTML = '';
                data.forEach(item => {
                    let div = document.createElement('div');
                    div.textContent = item.title + (item.type === 'recipe' ? ' (Recipe)' : ' (Article)');
                    resultsDiv.appendChild(div);
                });
            });
    }
});
</script>
<?php $layout = $this->params->get('layout', 'list'); ?>
<?php if ($layout == 'card'): ?>
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
<?php else: ?>
    <ul class="recipe-list">
        <?php foreach ($this->items as $item): ?>
            <li>
                <h2><?php echo $this->escape($item->title); ?></h2>
                <p><a href="<?php echo JRoute::_('index.php?option=com_easy_chef&view=recipe&id=' . $item->id); ?>">View Recipe</a></p>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
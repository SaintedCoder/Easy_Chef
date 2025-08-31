<?php defined('_JEXEC') or die; ?>
<form action="<?php echo JRoute::_('index.php?option=com_easy_chef&task=recipe.save'); ?>" method="post" enctype="multipart/form-data">
    <?php if (JFactory::getUser()->guest): ?>
        <fieldset>
            <legend>Register to Submit</legend>
            <label>Username</label><input type="text" name="jform[register_username]" required>
            <label>Email</label><input type="email" name="jform[register_email]" required>
            <label>Password</label><input type="password" name="jform[register_password]" required>
        </fieldset>
    <?php endif; ?>
    <fieldset>
        <legend>Recipe Details</legend>
        <label>Title</label><input type="text" name="jform[title]" required>
        <label>Category</label>
        <select name="jform[catid]" required>
            <?php foreach ($this->categories as $category): ?>
                <option value="<?php echo $category->id; ?>"><?php echo $category->title; ?></option>
            <?php endforeach; ?>
        </select>
        <label>Cuisine</label>
        <select name="jform[cuisine_id]" required>
            <?php foreach ($this->cuisines as $cuisine): ?>
                <option value="<?php echo $cuisine->id; ?>"><?php echo $cuisine->name; ?></option>
            <?php endforeach; ?>
        </select>
        <label>Serving Type</label>
        <select name="jform[serving_type_id]" required>
            <?php foreach ($this->serving_types as $type): ?>
                <option value="<?php echo $type->id; ?>"><?php echo $type->name; ?></option>
            <?php endforeach; ?>
        </select>
        <label>Servings</label><input type="number" name="jform[serving_qty]" value="1" min="1">
        <label>Prep Time (minutes)</label><input type="number" name="jform[prep_time]">
        <label>Cook Time (minutes)</label><input type="number" name="jform[cook_time]">
        <label>Rest Time (minutes)</label><input type="number" name="jform[rest_time]">
        <label>Ingredients (one per line: qty unit name)</label>
        <textarea name="jform[ingredients]" required placeholder="e.g., 1.5 Cup Flour"></textarea>
        <label>Instructions</label><textarea name="jform[instructions]" required></textarea>
        <label>Tags</label><input type="text" name="jform[tags]">
        <label>Image</label><input type="file" name="picture">
        <input type="submit" value="Submit Recipe">
        <?php echo JHtml::_('form.token'); ?>
    </fieldset>
</form>
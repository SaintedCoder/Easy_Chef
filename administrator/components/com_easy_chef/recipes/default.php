<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

HTMLHelper::_('behavior.multiselect');
?>

<div class="container-fluid">
    <h1><?php echo Text::_('Easy Chef - Recipe Management'); ?></h1>
    <div class="alert alert-success">
        <h4>Component Successfully Installed!</h4>
        <p>Your Easy Chef component is now working with Joomla 5.3.3!</p>
        <p>Database tables created:</p>
        <ul>
            <li>#__easychef_recipes</li>
            <li>#__easychef_categories</li>
            <li>#__easychef_ingredients</li>
            <li>#__easychef_ingredientsgroups</li>
            <li>#__easychef_cuisines</li>
            <li>#__easychef_servingtypes</li>
        </ul>
    </div>
</div>
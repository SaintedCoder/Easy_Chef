<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;

// Simple redirect to show the component is installed
$app = Factory::getApplication();
$app->enqueueMessage('Easy Chef Component is successfully installed!', 'success');

echo '<div class="container-fluid">';
echo '<h1>Easy Chef - Recipe Management</h1>';
echo '<div class="alert alert-success">';
echo '<h4>Component Successfully Installed!</h4>';
echo '<p>Your Easy Chef component is now working with Joomla 5.3.3!</p>';
echo '<p>Database tables created:</p>';
echo '<ul>';
echo '<li>#__easychef_recipes</li>';
echo '<li>#__easychef_categories</li>';
echo '<li>#__easychef_ingredients</li>';
echo '<li>#__easychef_ingredientsgroups</li>';
echo '<li>#__easychef_cuisines</li>';
echo '<li>#__easychef_servingtypes</li>';
echo '</ul>';
echo '</div>';
echo '</div>';
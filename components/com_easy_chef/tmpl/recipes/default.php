<?php
defined('_JEXEC') or die;

use Joomla\CMS\HTML\HTMLHelper;
use Joomla\CMS\Language\Text;

HTMLHelper::_('behavior.multiselect');
?>

<div class="container-fluid">
    <h1><?php echo Text::_('Easy Chef - Recipe Management'); ?></h1>
    <p><?php echo Text::_('Welcome to Easy Chef component!'); ?></p>
    
    <div class="alert alert-info">
        <h4>Component Successfully Installed!</h4>
        <p>Your Easy Chef component is now installed and working.</p>
        <p>This is your main recipes management page.</p>
    </div>
</div>
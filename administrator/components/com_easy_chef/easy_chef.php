<?php
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

$controller = BaseController::getInstance('EasyChef');
$input = Factory::getApplication()->input;
$task = $input->getCmd('task', 'display');

$controller->execute($task);
$controller->redirect();
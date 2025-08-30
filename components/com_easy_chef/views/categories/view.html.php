<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView;

class EasyChefViewCategories extends HtmlView
{
    protected $items;
    protected $params;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        $this->params = JFactory::getApplication()->getParams();
        parent::display($tpl);
    }
}
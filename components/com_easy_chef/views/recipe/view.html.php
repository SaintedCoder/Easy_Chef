<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView;

class EasyChefViewRecipes extends HtmlView
{
    protected $items;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        parent::display($tpl);
    }

    public function getCategoryTitle($catid)
    {
        $db = JFactory::getDbo();
        $query = $db->getQuery(true)
            ->select('title')
            ->from($db->quoteName('#__easy_chef_categories'))
            ->where($db->quoteName('id') . ' = ' . (int)$catid);
        return $db->setQuery($query)->loadResult();
    }
}
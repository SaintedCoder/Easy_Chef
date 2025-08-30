<?php
use Joomla\CMS\Factory;
defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView;

class EasyChefViewRecipe extends HtmlView
{
    protected $items;

    public function display($tpl = null)
    {
        $this->items = $this->get('Items');
        parent::display($tpl);
    }

    public function getCategoryTitle($catid)
    {
    $db = Factory::getDbo();
        $query = $db->getQuery(true)
            ->select('title')
            ->from($db->quoteName('#__joomrecipe_categories'))
            ->where($db->quoteName('id') . ' = ' . (int)$catid);
        return $db->setQuery($query)->loadResult();
    }
}
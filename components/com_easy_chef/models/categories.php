<?php
use Joomla\CMS\Factory;
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\ListModel;

class EasyChefModelCategories extends ListModel
{
    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__joomrecipe_categories'))
            ->where($db->quoteName('published') . ' = 1');
        return $query;
    }
}
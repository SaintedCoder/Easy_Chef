<?php
use Joomla\CMS\Factory;
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\ListModel;

class EasyChefModelRecipes extends ListModel
{
    public function __construct($config = [])
    {
        if (empty($config['filter_fields'])) {
            $config['filter_fields'] = ['id', 'title', 'catid', 'published'];
        }
        parent::__construct($config);
    }

    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('r.*, c.title AS category_title')
            ->from($db->quoteName('#__joomrecipe_recipes', 'r'))
            ->leftJoin($db->quoteName('#__joomrecipe_categories', 'c') . ' ON r.catid = c.id')
            ->where($db->quoteName('r.published') . ' = 1');

        $catid = $this->getState('filter.catid');
        if ($catid) {
            $query->where($db->quoteName('r.catid') . ' = ' . (int)$catid);
        }

        return $query;
    }
}
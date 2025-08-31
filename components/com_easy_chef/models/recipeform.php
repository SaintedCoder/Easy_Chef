<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\Model\FormModel;

class EasyChefModelRecipeform extends FormModel
{
    public function getCategories()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('id, title')
            ->from($db->quoteName('#__easy_chef_categories'))
            ->where($db->quoteName('published') . ' = 1');
        return $db->setQuery($query)->loadObjectList();
    }

    public function getCuisines()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('id, name')
            ->from($db->quoteName('#__easy_chef_cuisines'))
            ->where($db->quoteName('published') . ' = 1');
        return $db->setQuery($query)->loadObjectList();
    }

    public function getServingTypes()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true)
            ->select('id, name')
            ->from($db->quoteName('#__easy_chef_servingtypes'))
            ->where($db->quoteName('published') . ' = 1');
        return $db->setQuery($query)->loadObjectList();
    }
}
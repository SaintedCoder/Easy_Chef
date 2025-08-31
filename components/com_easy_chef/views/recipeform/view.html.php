<?php
defined('_JEXEC') or die;
use Joomla\CMS\MVC\View\HtmlView;

class EasyChefViewRecipeform extends HtmlView
{
    protected $categories;
    protected $cuisines;
    protected $serving_types;

    public function display($tpl = null)
    {
        $model = $this->getModel();
        $this->categories = $model->getCategories();
        $this->cuisines = $model->getCuisines();
        $this->serving_types = $model->getServingTypes();
        parent::display($tpl);
    }
}
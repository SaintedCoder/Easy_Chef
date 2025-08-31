<?php
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\AdminController;

class EasyChefControllerRecipes extends AdminController
{
    public function approve()
    {
        $app = Factory::getApplication();
        $id = $app->input->getInt('id');
        $db = Factory::getDbo();
        $query = $db->getQuery(true)
            ->update($db->quoteName('#__easy_chef_recipes'))
            ->set($db->quoteName('published') . ' = 1')
            ->where($db->quoteName('id') . ' = ' . (int)$id);
        $db->setQuery($query)->execute();
        $app->enqueueMessage('Recipe approved.');
        $this->setRedirect(JRoute::_('index.php?option=com_easy_chef&view=recipes'));
    }

    public function export()
    {
        $db = Factory::getDbo();
        $query = $db->getQuery(true)
            ->select('*')
            ->from($db->quoteName('#__easy_chef_recipes'));
        $recipes = $db->setQuery($query)->loadAssocList();

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="recipes_export.csv"');
        $output = fopen('php://output', 'w');
        fputcsv($output, ['ID', 'Title', 'Category ID', 'Created By', 'Created', 'Published']);
        foreach ($recipes as $recipe) {
            fputcsv($output, [$recipe['id'], $recipe['title'], $recipe['catid'], $recipe['created_by'], $recipe['created'], $recipe['published']]);
        }
        fclose($output);
        exit;
    }
}
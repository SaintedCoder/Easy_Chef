<?php
defined('_JEXEC') or die;
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\FormController;

class EasyChefControllerRecipe extends FormController
{
    public function save($key = null, $urlVar = null)
    {
        $app = Factory::getApplication();
        $input = $app->input;
        $data = $input->post->get('jform', [], 'array');
        $user = Factory::getUser();

        if ($user->guest) {
            jimport('joomla.user.helper');
            $userData = [
                'username' => $data['register_username'],
                'email' => $data['register_email'],
                'password' => $data['register_password'],
                'name' => $data['register_username'],
            ];
            $newUser = new JUser();
            if ($newUser->bind($userData) && $newUser->save()) {
                $credentials = ['username' => $userData['username'], 'password' => $userData['password']];
                $app->login($credentials);
                $data['created_by'] = $newUser->id;
            } else {
                $app->enqueueMessage('Registration failed.', 'error');
                $this->setRedirect(JRoute::_('index.php?option=com_easy_chef&view=recipeform'));
                return;
            }
        } else {
            $data['created_by'] = $user->id;
        }

        $data['published'] = 0; // Pending approval
        $data['created'] = Factory::getDate()->toSql();
        $data['alias'] = JFilterOutput::stringURLSafe($data['title']);

        // Handle image upload
        $file = $input->files->get('picture');
        if ($file['name']) {
            $userFolder = JPATH_ROOT . '/images/easy_chef/users/' . $data['created_by'] . '/';
            JFolder::create($userFolder);
            $filename = JFile::makeSafe($file['name']);
            $dest = $userFolder . $filename;
            JFile::upload($file['tmp_name'], $dest);
            $data['picture'] = 'images/easy_chef/users/' . $data['created_by'] . '/' . $filename;
        }

        // Process ingredients
        $ingredients = explode("\n", trim($data['ingredients']));
        $data['ingredients_list'] = [];
        foreach ($ingredients as $index => $line) {
            $parts = preg_split('/\s+/', trim($line), 3);
            if (count($parts) >= 3) {
                $data['ingredients_list'][] = [
                    'qty' => $parts[0],
                    'unit' => $parts[1],
                    'name' => $parts[2],
                    'ordering' => $index + 1
                ];
            }
        }
        unset($data['ingredients']);

        $model = $this->getModel('Recipe');
        if ($model->save($data)) {
            $app->enqueueMessage('Recipe submitted for approval.');
        } else {
            $app->enqueueMessage('Error saving recipe.', 'error');
        }

        $this->setRedirect(JRoute::_('index.php?option=com_easy_chef&view=recipes'));
    }
}
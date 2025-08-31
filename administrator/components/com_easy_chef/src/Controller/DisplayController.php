<?php
namespace Joomla\Component\EasyChef\Administrator\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;

class DisplayController extends BaseController
{
    protected $default_view = 'recipes';
    
    public function display($cachable = false, $urlparams = [])
    {
        return parent::display($cachable, $urlparams);
    }
}
Update these files and push to GitHub. This should fix both the JSON installation error AND the 404 component error!

Aug 30, 09:21 PM

Copy
Scroll to bottom
Agent is waiting...
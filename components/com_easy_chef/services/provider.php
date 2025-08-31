<?php
defined('_JEXEC') or die;

use Joomla\CMS\Extension\ComponentInterface;
use Joomla\CMS\Extension\Service\Provider\ComponentDispatcherFactory;
use Joomla\CMS\Extension\Service\Provider\MVCFactory;
use Joomla\CMS\MVC\Factory\MVCFactoryInterface;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class implements ServiceProviderInterface
{
    public function register(Container $container)
    {
        $container->registerServiceProvider(new MVCFactory('\\Joomla\\Component\\EasyChef'));
        $container->registerServiceProvider(new ComponentDispatcherFactory('\\Joomla\\Component\\EasyChef'));
        
        $container->set(
            ComponentInterface::class,
            function (Container $container) {
                $component = new \Joomla\CMS\Extension\Component(
                    $container->get(\Joomla\CMS\MVC\Factory\MVCFactoryInterface::class)
                );
                
                return $component;
            }
        );
    }
};
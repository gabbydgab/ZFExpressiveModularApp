<?php

namespace App\Factory;

use Interop\Container\ContainerInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Expressive\Template\TemplateRendererInterface;
use Dashboard\Action\DashboardPageAction;

class ActionPageFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $router   = $container->get(RouterInterface::class);
        $template = ($container->has(TemplateRendererInterface::class))
            ? $container->get(TemplateRendererInterface::class)
            : null;
        
        return new $requestedName($router, $template);
    }
}

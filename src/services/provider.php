<?php
/**
 * @package site.module mod_boxesghsvs for Joomla!
 * @version See mod_boxesghsvs.xml
 * @author G@HService Berlin Neukölln, Volkmar Volli Schlothauer
 * @copyright Copyright (C) 2023, G@HService Berlin Neukölln, Volkmar Volli Schlothauer. All rights reserved.
 * @license GNU GPLv3 http://www.gnu.org/licenses/gpl-3.0.html; See LICENSE.txt
 * @authorUrl http://ghsvs.de
 */
defined('_JEXEC') or die;

use Joomla\CMS\Extension\Service\Provider\HelperFactory;
use Joomla\CMS\Extension\Service\Provider\Module;
use Joomla\CMS\Extension\Service\Provider\ModuleDispatcherFactory;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;

return new class () implements ServiceProviderInterface
{
	/**
		* Registers the service provider with a DI container.
		*
		* @param   Container  $container  The DI container.
		*
		* @return  void
		*
		* @since  4.2.6
		*/
	public function register(Container $container)
	{
		$container->registerServiceProvider(new ModuleDispatcherFactory('\\GHSVS\\Module\\BoxesGhsvs'));
		$container->registerServiceProvider(new HelperFactory('\\GHSVS\\Module\\BoxesGhsvs\\Site\\Helper'));
		$container->registerServiceProvider(new Module());
	}
};

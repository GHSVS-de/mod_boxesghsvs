<?php
/**
 * @package site.module mod_boxesghsvs for Joomla!
 * @version See mod_boxesghsvs.xml
 * @author G@HService Berlin Neukölln, Volkmar Volli Schlothauer
 * @copyright Copyright (C) 2023, G@HService Berlin Neukölln, Volkmar Volli Schlothauer. All rights reserved.
 * @license GNU GPLv3 http://www.gnu.org/licenses/gpl-3.0.html; See LICENSE.txt
 * @authorUrl http://ghsvs.de
 */

namespace GHSVS\Module\BoxesGhsvs\Site\Dispatcher;

\defined('_JEXEC') or die;

use Joomla\CMS\Dispatcher\AbstractModuleDispatcher;
use Joomla\CMS\Helper\HelperFactoryAwareInterface;
use Joomla\CMS\Helper\HelperFactoryAwareTrait;

class Dispatcher extends AbstractModuleDispatcher implements HelperFactoryAwareInterface
{
	use HelperFactoryAwareTrait;

	protected function getLayoutData()
	{
		/*
		parent returns:
		'module'   => $this->module,
		'app'      => $this->app,
		'input'    => $this->input,
		'params'   => new Registry($this->module->params),
		'template' => $this->app->getTemplate()
		*/
		$data = parent::getLayoutData();
		$params = $data['params'];
		$displayData = $this->getHelperFactory()->getHelper(
			'BoxesGhsvsHelper', $data)->getDisplayData($data['params'], $data['app']);

		return array_merge($data, $displayData);
	}
}

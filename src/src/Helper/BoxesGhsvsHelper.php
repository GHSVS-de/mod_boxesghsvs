<?php
/**
 * @package site.module mod_boxesghsvs for Joomla!
 * @version See mod_boxesghsvs.xml
 * @author G@HService Berlin Neukölln, Volkmar Volli Schlothauer (ghsvs.de)
 * @copyright Copyright (C) 2023, G@HService Berlin Neukölln, Volkmar Volli Schlothauer. All rights reserved.
 * @license GNU GPLv3 http://www.gnu.org/licenses/gpl-3.0.html; See LICENSE.txt
 * @authorUrl http://www.ghsvs.de
 */
?>
<?php

namespace GHSVS\Module\BoxesGhsvs\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;
use Joomla\Registry\Registry;

class BoxesGhsvsHelper
{
	public function getDisplayData(Registry $moduleParams): array
	{
		return [
			'link' => $this->getLink($moduleParams),
			'headline' => $this->getIconClass($moduleParams),
			'image' => $this->getLabelling ($moduleParams),
			'text' => $this->getTitleAttr ($moduleParams),
		];
	}

	private function getLink(): string
	{
		return (string) new Uri(Route::_('index.php?'));
	}

	/**
	 * Get the icon class of the button.
	 *
	 * @param   Registry  $params  The module parameters.
	 *
	 * @return  string    The icon class of the button or empty string.
	 */
	private function getIconClass(Registry $moduleParams) : string
	{
		$iconClass = trim($moduleParams->get('iconClass', 'icon-home'));

		return $this->clean($iconClass);
	}

	/**
	 * Get the labelling of the button. Also language strings are allowed.
	 *
	 * @param   Registry  $params  The module parameters.
	 *
	 * @return  string    The translated label of the button or empty string.
	 */
	private function getLabelling(Registry $moduleParams) : string
	{
		$labelling = trim($moduleParams->get(
			'labelling',
			'MOD_BOXESGHSVS_ADMINISTRATION'
		));

		return $this->clean($labelling);
	}

	/**
	 * Get the text of title attribute of the button link. Also language strings are allowed.
	 *
	 * @param   Registry  $params  The module parameters.
	 *
	 * @return  string    The translated text of title attribute of the button link or empty string.
	 */
	private function getTitleAttr(Registry $moduleParams) : string
	{
		$titleAttr = trim($moduleParams->get(
			'titleAttr',
			'MOD_BOXESGHSVS_NEW_TAB'
		));

		return $this->clean($titleAttr);
	}

	private function clean(String $string) : string
	{
		return empty($string) ? '' : htmlspecialchars( Text::_($string), ENT_QUOTES,
			'UTF-8');
	}
}

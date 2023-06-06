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
use Joomla\Component\Content\Site\Helper\RouteHelper;
use Joomla\Registry\Registry;

class BoxesGhsvsHelper
{
	public function getDisplayData(Registry $moduleParams, Object $module, $app): array
	{
		$link = $this->getLink($moduleParams, null, $app);

		return [
			'link' => $link[0],
			'linktype' => $link[1],
			'linktarget' => $link[2],
			'linktext' => $this->getLinktext($moduleParams),
			'title' => $this->getTitle($module),
			'modId' => $this->getModId($module),
			'image' => $this->getImage($moduleParams),
			'text' => $this->getText($moduleParams),
			'wa' => $this->getWa($app, $module->module),
		];
	}

	private function getTitle(Object $module): string
	{
		$title = trim($module->title);
		return $this->clean($title);
	}

	private function getModId(Object $module): string
	{
		return $module->module . $module->id;
	}

	private function getLink(Registry $params, $module, $app): array
	{
		$linkType = '';
		$link = '';
		$target = '';

		if ($id = (int) $params->get('linkMenu', 0))
		{
			$link = Route::_('index.php?Itemid=' . $id);
			$linkType = 'linkMenu';
		}
		elseif ($id = (int) $params->get('linkArticle', 0))
		{
			$article = $app->bootComponent('com_content')->getMVCFactory()
				->createModel('Article', 'Site', ['ignore_request' => true]);
			$article->setState('article.id', (int) $id);
			$article->setState('params', $app->getParams());
			$article = $article->getItem();
			$link = Route::_(RouteHelper::getArticleRoute($id, $article->catid));
			$linkType = 'linkArticle';
		}
		elseif ($link = trim($params->get('linkYoutube', ''))) {
			$linkType = 'linkYoutube';
			$target = ' target=_blank';
		}
		elseif ($link = trim($params->get('linkExternal', ''))) {
			$linkType = 'linkExternal';
			$target = ' target=_blank';
		}

		return [$link, $linkType, $target];
	}

	/**
	 * Get the editor text of the entry.
	 *
	 * @param   Registry  $params  The module parameters.
	 *
	 * @return  string    The editor text like entered.
	 */
	private function getText(Registry $params) : string
	{
		$text = trim($params->get('text', ''));
		return $text;
	}

	private function getLinktext(Registry $params) : string
	{
		$linktext = Text::_($params->get('linktext', 'MOD_BOXESGHSVS_MORE'));
		return $linktext;
	}

	private function getImage(Registry $params) : string
	{
		$image = trim($params->get('image', ''));

		return $image;
	}

	private function clean(String $string) : string
	{
		return empty($string) ? '' : htmlspecialchars( Text::_($string), ENT_QUOTES,
			'UTF-8');
	}

	private function getWa($app, $moduleName)
	{
		$wa = $app->getDocument()->getWebAssetManager();
		// Searches in media/
		$wa->getRegistry()->addExtensionRegistryFile($moduleName);
		return $wa;
	}
}

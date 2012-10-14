<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2012 Leo Feyer
 * 
 * @package Tags_news
 * @link    http://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Contao\TagListNews'        => 'system/modules/tags_news/classes/TagListNews.php',

	// Modules
	'Contao\ModuleTagCloudNews' => 'system/modules/tags_news/modules/ModuleTagCloudNews.php',
));

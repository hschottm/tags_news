<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Helmut Schottmüller 2008
 * @author     Helmut Schottmüller <helmut.schottmueller@aurealis.de>
 * @package    tags
 * @license    LGPL
 * @filesource
 */

/**
 * Class tl_module_tags_news
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2008
 * @author     Helmut Schottmüller <helmut.schottmueller@aurealis.de>
 * @package    Controller
 */
class tl_module_tags_news extends tl_module
{
	/**
	 * Return available news archives
	 *
	 * @return array Array of news archives
	 */
	public function getNewsArchives()
	{
		$objTable = $this->Database->prepare("SELECT id, title FROM tl_news_archive ORDER BY title")
			->execute();
		$tables = array();
		if ($objTable->numRows)
		{
			while ($objTable->next())
			{
				$tables[$objTable->id] = $objTable->title;
			}
		}
		return $tables;
	}
}

/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['tagcloudnews']    = '{title_legend},name,headline,type;{size_legend},tag_maxtags,tag_buckets,tag_named_class,tag_show_reset;{template_legend:hide},cloud_template;{tagextension_legend},tag_related,tag_topten;{redirect_legend},tag_jumpTo,keep_url_params;{datasource_legend},tag_news_archives;{expert_legend:hide},cssID';


/**
 * Add fields to tl_module
 */

$GLOBALS['TL_DCA']['tl_module']['fields']['tag_news_archives'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['tag_news_archives'],
	'inputType'               => 'checkbox',
	'options_callback'        => array('tl_module_tags_news', 'getNewsArchives'),
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);

?>
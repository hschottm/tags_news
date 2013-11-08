<?php

/**
 * @copyright  Helmut Schottmüller 2008-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm>
 * @package    tags
 * @license    LGPL
 * @filesource
 */

/**
 * Class tl_module_tags_news
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Helmut Schottmüller 2008-2013
 * @author     Helmut Schottmüller <https://github.com/hschottm>
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
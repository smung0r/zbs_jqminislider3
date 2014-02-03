<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2010 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  byte solution Hannes Schulze - 2012 - 
 * @author     Hannes Schulze <hannes.schulze@byte-solution.net> 
 * @package    jqminislider 
 * @license    LGPL 
 * @filesource
 */


/**
 * Table tl_bsminislider_elements 
 */
$GLOBALS['TL_DCA']['tl_bsminislider_elements'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_bsminislider',
		'sql'			      => array
						(
							'keys' => array
							(
								'id' => 'primary'
							)
						),
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'flag'			  => 11,
			
			'fields'                  => array('sorting'),
			'headerFields'            => array('title', 'speed', 'height', 'width', 'random'),
//			'panelLayout'             => 'filter;search,limit'
			'child_record_callback'	  => array('tl_bsminislider_elements', 'listElements')
		),
		'label' => array
		(
			'fields'                  => array('singlSRC'),
			'format'                  => '%s',
		),
		
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider_elements']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider_elements']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider_elements']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider_elements']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
//		'__selector__'	=>	array('controls', 'effects_extended', 'thumbnails'),
		
		'default'       => 'singleSRC, duration, link, alttext'
	),

	
	// Fields
	'fields' => array
	(
		'id'     => array
		(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),
		'tstamp' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		
		'pid' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'sorting' => array
		(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider_elements']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'mandatory'=>true, 'tl_class'=>'clr'),
			'sql'			  => "varchar(255) NOT NULL default ''"
		),
		'duration' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider_elements']['duration'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'rgxp'=>'digit'),
			'sql'			  => "varchar(255) NOT NULL default ''"
		),
		'link' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider_elements']['link'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array( 'maxlength'=>255),
			'sql'			  => "varchar(255) NOT NULL default ''"
		),
		'alttext' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider_elements']['alttext'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
			'sql'			  => "varchar(255) NOT NULL default ''"
		)
         )
);
	
class tl_bsminislider_elements extends Backend
{
	/**
	 * List MiniSlider Elements
	 * @param array
	 * @return string
	 */
	public function listElements($arrRow)
	{
	    $this->loadLanguageFile('tl_bsminislider_elements');
	    $objFile = \FilesModel::findByPk($arrRow['singleSRC']);  
	    $image_path = $objFile->path;  
	    $strRet = '<div><p>'.$GLOBALS['TL_LANG']['tl_bsminislider_elements']['duration'][0].': '.$arrRow['duration']. '</p>'. $this->generateImage($image_path) .'</div>';
	    return $strRet;
	    
	}
	
	
}

?>
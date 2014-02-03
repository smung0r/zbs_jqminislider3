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
 * Table tl_bsminislider 
 */
$GLOBALS['TL_DCA']['tl_bsminislider'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ctable'                      => array('tl_bsminislider_elements'),
		'sql'			      => array
						(
							'keys' => array
							(
								'id' => 'primary'
							)
						),
		'switchToEdit'                => true,
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 1,
			'fields'                  => array('title'),
			'flag'                    => 1,
//			'panelLayout'             => 'filter;search,limit'
		),
		'label' => array
		(
			'fields'                  => array('title'),
			'format'                  => '%s',
//			'label_callback'	  => array('tl_bsminislider', 'createLabel')
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
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider']['edit'],
				'href'                => 'table=tl_bsminislider_elements',
				'icon'                => 'edit.gif'
			),
			'editheader' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider']['editheader'],
				'href'                => 'act=edit',
				'icon'                => 'header.gif',
				'attributes'          => 'class="edit-header"'
			),			
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider']['copy'],
				'href'                => 'act=copy',
				'icon'                => 'copy.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_bsminislider']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array
	(
//		'__selector__'	=>	array('controls', 'effects_extended', 'thumbnails'),
		
		'default'       => 'title,  speed,  width, height, random'
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
	    
		'title' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider']['title'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255),
			'sql'			  => "varchar(255) NOT NULL default ''"
		),  
		'speed' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider']['speed'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>10, 'rgxp'=>'digit'),
			'sql'			  => "int(10) unsigned NOT NULL default '0'"
		),
		'width' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider']['width'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>10, 'rgxp'=>'digit', 'tl_class'=>'w50'),
			'sql'			  => "int(10) unsigned NOT NULL default '0'"
		),
		'height' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider']['height'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>10, 'rgxp'=>'digit', 'tl_class'=>'w50'),
			'sql'			  => "int(10) unsigned NOT NULL default '0'"
		),
		'random' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_bsminislider']['random'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'clr'),
			'sql'                     => "char(1) NOT NULL default ''"
		),
		
         )
);
	
//s
?>
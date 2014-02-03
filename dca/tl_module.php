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
 * Add a palette to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['zbs_jqminislider'] = '{title_legend},name,type,headline;{config_legend},zbsminislider;{expert_legend:hide},cssID,space';


/**
 * Add fields to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['zbs_jqminislider'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['zbs_jqminislider'],
	'exclude'                 => true,
	'inputType'               => 'radio',
	'foreignKey'              => 'tl_bsminislider.title',
	'eval'                    => array('mandatory'=>true),
	'sql'			  => "int(10) unsigned NOT NULL default '0'"
);

?>

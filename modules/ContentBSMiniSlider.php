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

class ContentBSMiniSlider extends ContentElement
{
	
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_bsminislider';

	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		// Create Preview when inserted as CE
		
		if (TL_MODE == 'BE')
		{
			$GLOBALS['TL_JAVASCRIPT'][] ='http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js';

//			$objTemplate = new \BackendTemplate('be_wildcard');
//
//			$objSlider = $this->Database->prepare('SELECT * FROM tl_bsminislider WHERE id = ?')->execute($this->zbs_jqminislider);
//	    
//			if($objSlider->numRows == 0)
//			{
//			    return "";
//			}
//			$objSlider->next();
//			
//			$objTemplate->wildcard = '### ' . utf8_strtoupper($objSlider->title) . ' ###';
//			$objTemplate->title = 'MiniSlider: ' . $objSlider->title;
//
//			return $objTemplate->parse();
		}
		
		return parent::generate();
	}
	
	/**
	 * Generate module
	 */
	protected function compile()
	{
	    $strSliderId = 'logoSlider_'.$this->id;
	    $objSlider = $this->Database->prepare('SELECT * FROM tl_bsminislider WHERE id = ?')->execute($this->zbs_jqminislider);
	    
	    if($objSlider->numRows == 0)
            {
		return "";
	    }
	    $objSlider->next();
	    $strOrder = "";
	    if($objSlider->random)
	    {
		$strOrder = 'ORDER BY RAND()';
	    }
	    $objImages = $this->Database->prepare('SELECT * FROM tl_bsminislider_elements WHERE pid = ? '. $strOrder)->execute($this->zbs_jqminislider);
	    
	    if($objImages->numRows == 0)
	    {
		return "";
	    }
	    
	    $arrImages = array();
	    while($objImages->next())
	    {
		
		$arrImage = array();
		$arrImage = $objImages->row();
		$objFile = \FilesModel::findByPk($arrImage['singleSRC']);  
		$image_path = $objFile->path;  
		$arrImage['resizedImage'] = $this->getImage($image_path, $objSlider->width, $objSlider->width->height);
		$arrImage['renderedImage'] = $this->generateImage($arrImage['resizedImage'], $arrImage['alttext']);		
		$arrImages[] = $arrImage;
	    }
	    $this->Template->images = $arrImages;
	    $this->Template->sliderId = $strSliderId;
	    
	    $GLOBALS['TL_CSS'][] = 'system/modules/zbs_jqminislider3/assets/minislider.css';
	    
	    $GLOBALS['TL_JAVASCRIPT'][] ='system/modules/zbs_jqminislider3/assets/logoSlider.js';
	    
	    
	    $strJsBottom = "<script type=\"text/javascript\">
			    jQuery(document).ready(function(){
				jQuery('#".$strSliderId."').logoSlider({
				    speed: ".$objSlider->speed."
				});
			    });
			    </script>";
	    $this->Template->jsCode = $strJsBottom;
	    $this->Template->containerHeight = $objSlider->height;
	    $this->Template->containerWidth = $objSlider->width;
	}
}

?>

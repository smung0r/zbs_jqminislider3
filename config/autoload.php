<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Zbs_jqminislider
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Modules
	'ContentBSMiniSlider' => 'system/modules/zbs_jqminislider3/modules/ContentBSMiniSlider.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'ce_bsminislider' => 'system/modules/zbs_jqminislider3/templates',
));

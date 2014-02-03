<?php

/**
 * Back end modules
 */


array_insert($GLOBALS['BE_MOD']['content'], 99, array
(
	'tl_bsminislider' => array
	(
		'tables'     => array('tl_bsminislider', 'tl_bsminislider_elements'),
		'icon'       => 'system/modules/zbs_jqminislider3/assets/icon_minislider.png',
	)
));


/**
 * Content elements
 */
array_insert($GLOBALS['TL_CTE']['slider'], 4, array(
    'zbs_jqminislider' => 'ContentBSMiniSlider'
));

?>
<?php

require_once 'const.php';

//load lib
require_once 'lib/google-fonts.php';
require_once 'lib/helpers-functions.php';

//load widgets
require_once 'widgets/load.php';

//load shortcodes
require_once 'lib/shortcode-interface.php';
require_once 'shortcodes/shortcodes-functions.php';

//load post-post-types
require_once 'lib/post-type-interface.php';
require_once 'post-types/post-types-functions.php';
require_once 'post-types/post-types-register.php'; //this has to be loaded last

//load import
require_once 'import/grandprix-import.php';
require_once 'import/grandprix-import-functions.php';

//load export
require_once 'backup/functions.php';

//load reviews
if ( file_exists( GRANDPRIX_CORE_ABS_PATH . '/like' ) ) {
	require_once 'like/load.php';
}

//load reviews
if ( file_exists( GRANDPRIX_CORE_ABS_PATH . '/reviews' ) ) {
	require_once 'reviews/load.php';
}
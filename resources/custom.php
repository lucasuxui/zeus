<?php

/** 
 *  CPT (Post-types and Taxonomies)
*/
define('CPT_DIR', trailingslashit( get_template_directory() . '/lib/cpt'));

require_once CPT_DIR . 'post-type.php';

require_once CPT_DIR . 'taxonomy.php';

/** 
 *  WP-ADMIN Custom Style
*/

define('WP_ADMIN_CUSTOM', trailingslashit( get_template_directory() . '/lib/admin'));

require_once WP_ADMIN_CUSTOM . 'wp-admin.php';

/** 
*  METABOX CLASS (Fields + Taxonomies Fields)
*/

if (is_admin()):

define('RWMBC_DIR', trailingslashit( get_template_directory() . '/lib/metabox'));
  
require_once RWMBC_DIR . 'settings.php';

require_once RWMBC_DIR . 'metabox-single.php';

require_once RWMBC_DIR . 'metabox-page.php';

require_once RWMBC_DIR . 'metabox-taxonomy.php';


endif;
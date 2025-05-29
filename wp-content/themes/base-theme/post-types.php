<?php

$staff = new CPT([
	'post_type_name'=>'staff',
	'singular'=>'Staff',
	'plural'=>'Staff',
	'slug'=>'staff',
],[
  'has_archive'=>true,
  'capability_type'     => array('staff','staffs'),
  'map_meta_cap'        => true,
]);

        function cp_check_perms() {
            $admin_caps = array (
  0 => 'staff',
  1 => 'staffs',
);
        	if ( is_admin() ){
        		$admins = get_role('administrator');
        		foreach ($admin_caps as $cap_post_type){
        			foreach ( array('publish','delete','delete_others','delete_private','delete_published','edit','edit_others','edit_private','edit_published','read_private') as $cap ) {
        				$admins->add_cap("{$cap}_{$cap_post_type}");
        			}
        		}
        	}
        }
        add_action('wp_dashboard_setup', 'cp_check_perms');

$staff->register_taxonomy([
	'taxonomy_name'=>'staff_category',
	'singular'=>'Staff Category',
	'plural'=>'Staff Categories',
	'slug'=>'staff-categories',

]);
<?php

namespace App\ACF;

//** Set save location of ACF **/
add_filter('acf/settings/save_json', __NAMESPACE__ . '\\acf_json_save');
function acf_json_save($path)
{
    $path = get_stylesheet_directory() . '/public/acf_json/';
    return $path;
}

add_filter('acf/settings/load_json', __NAMESPACE__ . '\\acf_json_load');
function acf_json_load($paths)
{
    unset($paths[0]);
    $paths[] = get_stylesheet_directory() . '/public/acf_json/';

    return $paths;
}

/**** register  ACF theme options ******/

if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => 'Theme General Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect'   => false
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Theme Header Footer Settings',
        'menu_title'  => 'Header and Footer',
        'parent_slug' => 'theme-general-settings',
    ));
}
/**
 * Function that will update ACF fields via JSON file update
 */
function auto_sync_fields()
{
    // vars
    $groups = acf_get_field_groups();
    $sync   = array();

    // bail early if no field groups
    if (empty($groups)) {
        return;
    }

    // find JSON field groups which have not yet been imported
    foreach ($groups as $group) {
        // vars
        $local    = acf_maybe_get($group, 'local', false);
        $modified = acf_maybe_get($group, 'modified', 0);
        $private  = acf_maybe_get($group, 'private', false);

        // ignore DB / PHP / private field groups
        if ($local !== 'json' || $private) {
            // do nothing
        } elseif ( ! $group['ID']) {
            $sync[$group['key']] = $group;
        } elseif ($modified && $modified > get_post_modified_time('U', true, $group['ID'], true)) {
            $sync[$group['key']] = $group;
        }
    }

    // bail if no sync needed
    if (empty($sync)) {
        return;
    }

    if ( ! empty($sync)) { //if( ! empty( $keys ) ) {
        // vars
        $new_ids = array();

        foreach ($sync as $key => $v) { //foreach( $keys as $key ) {
            // append fields
            if (acf_have_local_fields($key)) {
                $sync[$key]['fields'] = acf_get_local_fields($key);
            }
            // import
            $field_group = acf_import_field_group($sync[$key]);
        }
    }
}

add_action('admin_init', __NAMESPACE__ . '\\auto_sync_fields');





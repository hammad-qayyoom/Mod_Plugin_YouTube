<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('mod_myplugin', get_string('pluginname', 'mod_myplugin'));
    
    $settings->add(new admin_setting_configtext('mod_myplugin/name',
        get_string('name', 'mod_myplugin'),
        get_string('configname', 'mod_myplugin'),
        '',
        PARAM_TEXT
    ));
    
    $settings->add(new admin_setting_configtext('mod_myplugin/youtubeurl',
        get_string('youtubeurl', 'mod_myplugin'),
        get_string('configyoutubeurl', 'mod_myplugin'),
        '',
        PARAM_URL
    ));
    
    $ADMIN->add('modsettings', $settings);
}

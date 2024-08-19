<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('mod_youtubeplugin', get_string('pluginname', 'mod_youtubeplugin'));
    
    $settings->add(new admin_setting_configtext('mod_youtubeplugin/name',
        get_string('name', 'mod_youtubeplugin'),
        get_string('configname', 'mod_youtubeplugin'),
        '',
        PARAM_TEXT
    ));
    
    $settings->add(new admin_setting_configtext('mod_youtubeplugin/youtubeurl',
        get_string('youtubeurl', 'mod_youtubeplugin'),
        get_string('configyoutubeurl', 'mod_youtubeplugin'),
        '',
        PARAM_URL
    ));
    
    $ADMIN->add('modsettings', $settings);
}

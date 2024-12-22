<?php

use Events\EventsPlugin;


/**
 * Plugin Name: Custom Events Plugin
 * Description: A custom plugin to manage events with CRUD functionality.
 * Version: 1.0.0
 * Author: Zakaria Elkashef
 * Author URI: https://github.com/DevZakariaElkashef/events
 */


// prevent client users
if (!defined('ABSPATH')) die('Direct script access disallowed.');


// Initialize the plugin on the `plugins_loaded` hook
new EventsPlugin();



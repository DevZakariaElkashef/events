<?php

namespace Events\Database\Migrations;

class CreateEventTagRelationsTable
{
    public static function up()
    {
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $table = $wpdb->prefix . 'event_tag_relations';

        $sql = "CREATE TABLE $table (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            event_id BIGINT UNSIGNED NOT NULL,
            tag_id BIGINT UNSIGNED NOT NULL,
            created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (event_id) REFERENCES {$wpdb->prefix}events(id) ON DELETE CASCADE,
            FOREIGN KEY (tag_id) REFERENCES {$wpdb->prefix}event_tags(id) ON DELETE CASCADE
        ) $charset_collate;";

        require_once ABSPATH . 'wp-admin/includes/upgrade.php';
        dbDelta($sql);
    }

    public static function down()
    {
        global $wpdb;
        $wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}event_tag_relations");
    }
}

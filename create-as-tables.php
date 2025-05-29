<?php
// Load WordPress to get database configuration
require_once( dirname( __FILE__ ) . '/wp-load.php' );

// Set up HTML output
header('Content-Type: text/html; charset=utf-8');
echo "<!DOCTYPE html><html><head><title>Create Action Scheduler Tables</title>";
echo "<style>body{font-family:sans-serif;max-width:800px;margin:0 auto;padding:20px;line-height:1.6}
pre{background:#f5f5f5;padding:10px;overflow:auto;border:1px solid #ddd}
.success{color:green;font-weight:bold}.error{color:red;font-weight:bold}</style>";
echo "</head><body>";
echo "<h1>Create Action Scheduler Tables</h1>";

// Get the database prefix
global $wpdb;
$prefix = $wpdb->prefix;

// SQL statements to create Action Scheduler tables
$tables = array(
    'actionscheduler_actions' => "CREATE TABLE IF NOT EXISTS {$prefix}actionscheduler_actions (
        action_id bigint(20) unsigned NOT NULL auto_increment,
        hook varchar(191) NOT NULL,
        status varchar(20) NOT NULL,
        scheduled_date_gmt datetime NULL default NULL,
        scheduled_date_local datetime NULL default NULL,
        args varchar(191) NULL default NULL,
        schedule longtext NULL,
        group_id bigint(20) unsigned NOT NULL default 0,
        attempts int(11) NOT NULL default 0,
        last_attempt_gmt datetime NULL default NULL,
        last_attempt_local datetime NULL default NULL,
        claim_id bigint(20) unsigned NOT NULL default 0,
        extended_args varchar(8000) NULL default NULL,
        PRIMARY KEY  (action_id),
        KEY hook (hook),
        KEY status (status),
        KEY scheduled_date_gmt (scheduled_date_gmt),
        KEY args (args),
        KEY group_id (group_id),
        KEY last_attempt_gmt (last_attempt_gmt),
        KEY claim_id_status_scheduled_date_gmt (claim_id, status, scheduled_date_gmt)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
    
    'actionscheduler_claims' => "CREATE TABLE IF NOT EXISTS {$prefix}actionscheduler_claims (
        claim_id bigint(20) unsigned NOT NULL auto_increment,
        date_created_gmt datetime NULL default NULL,
        PRIMARY KEY  (claim_id),
        KEY date_created_gmt (date_created_gmt)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
    
    'actionscheduler_groups' => "CREATE TABLE IF NOT EXISTS {$prefix}actionscheduler_groups (
        group_id bigint(20) unsigned NOT NULL auto_increment,
        slug varchar(255) NOT NULL,
        PRIMARY KEY  (group_id),
        KEY slug (slug(191))
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;",
    
    'actionscheduler_logs' => "CREATE TABLE IF NOT EXISTS {$prefix}actionscheduler_logs (
        log_id bigint(20) unsigned NOT NULL auto_increment,
        action_id bigint(20) unsigned NOT NULL,
        message text NOT NULL,
        log_date_gmt datetime NULL default NULL,
        log_date_local datetime NULL default NULL,
        PRIMARY KEY  (log_id),
        KEY action_id (action_id),
        KEY log_date_gmt (log_date_gmt)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;"
);

// Check existing tables
$existing_tables = array();
foreach (array_keys($tables) as $table) {
    $table_name = $prefix . $table;
    $table_exists = $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name;
    
    if ($table_exists) {
        $existing_tables[] = $table;
        echo "<p>✅ <span class='success'>Table {$table_name} already exists.</span></p>";
    } else {
        echo "<p>❌ <span class='error'>Table {$table_name} is missing.</span></p>";
    }
}

// Create missing tables
$created_tables = array();
$failed_tables = array();

foreach ($tables as $table => $sql) {
    if (!in_array($table, $existing_tables)) {
        $table_name = $prefix . $table;
        
        // Execute the SQL to create the table
        $result = $wpdb->query($sql);
        
        if ($result !== false) {
            $created_tables[] = $table;
            echo "<p>✅ <span class='success'>Successfully created table: {$table_name}</span></p>";
        } else {
            $failed_tables[] = $table;
            echo "<p>❌ <span class='error'>Failed to create table: {$table_name}</span></p>";
            echo "<p>Error: " . $wpdb->last_error . "</p>";
        }
    }
}

// Insert default group if needed
if (in_array('actionscheduler_groups', $created_tables) || in_array('actionscheduler_groups', $existing_tables)) {
    $default_group = $wpdb->get_var("SELECT group_id FROM {$prefix}actionscheduler_groups WHERE slug = 'default'");
    
    if (empty($default_group)) {
        $wpdb->insert(
            $prefix . 'actionscheduler_groups',
            array('slug' => 'default'),
            array('%s')
        );
        
        if ($wpdb->insert_id) {
            echo "<p>✅ <span class='success'>Created default group in actionscheduler_groups table.</span></p>";
        } else {
            echo "<p>❌ <span class='error'>Failed to create default group in actionscheduler_groups table.</span></p>";
        }
    } else {
        echo "<p>✅ <span class='success'>Default group already exists in actionscheduler_groups table.</span></p>";
    }
}

// Summary
echo "<h2>Summary</h2>";
if (empty($failed_tables)) {
    if (empty($created_tables)) {
        echo "<p>✅ <span class='success'>All Action Scheduler tables already exist. No changes needed.</span></p>";
    } else {
        echo "<p>✅ <span class='success'>Successfully created all missing Action Scheduler tables.</span></p>";
    }
} else {
    echo "<p>❌ <span class='error'>Failed to create some tables: " . implode(', ', $failed_tables) . "</span></p>";
    echo "<p>Check database permissions and try again.</p>";
}

echo "<p><a href='" . admin_url() . "'>Return to WordPress Admin</a></p>";
echo "</body></html>";

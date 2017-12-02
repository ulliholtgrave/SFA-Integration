<?php 

global $tLMS_db_version;
$table_prefix = 'sfaTLMS';
$tLMS_db_version = '1.0';

/**
 * Creates a database with the prefix 'sfatLMS' and three fields:
 *  id: auto-incrementing ID
 *  mail: the mail of the user
 *  passwrd: the TLMS password of the user
 */
function createDatabase() {
    global $wpdb;
    global $tLMS_db_version;

    $table_name = $wpdb->prefix . $table_prefix;

    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT, 
        mail text NOT NULL,
        passwrd text NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $sql );
    add_option( 'tLMS_db_version', $tLMS_db_version );
}

/**
 * Adds a new user to the database (if a user with that mail does not already exist)
 */
function addUserToDatabase($email, $password){
    $table_name = $wpdb->prefix . $table_prefix;
    
    $wpdb->insert(
        $table_name, 
        array( 
            'mail' => $email, 
            'passwrd' => $password, 
        )
    );
}

/**
 * Returns the email and password corresponding to the requested email.
 * Returns an empty string if user was not found. 
 */
function getTLMSPasswordByMail($email){
    $password = "";

    // How to get?

    return $password;
}

/**
 * Checks if the user is already in the database.
 * Returns true if he is already registered in the database.
 * Returns false if he is not registered in the database.
 */
function isUserInDatabase($email){
    $isInDatabase = FALSE;

    // How to check?

    return $isInDatabase;
}


/**
 * Updates what?
 */
function updateDB($talentLMSUser){
    global $wpdb;
    $table_name = $wpdb->prefix . $table_prefix;

    if (is_array($talentLMSUser)) {
        foreach ($talentLMSUser as $User) {
            $wpdb->insert(
                $table_name,
                array('mail' => $user['email'])
            )
        }
    }
}

?>
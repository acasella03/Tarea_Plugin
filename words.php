<?php
/**
 * @package Hello_Words
 * @version 1.0.0
 */
/*
Plugin Name: Hello Words
Plugin URI: http://wordpress.org/plugins/hello-words/
Description: Esto no es solo un plugin, esto simboliza la esperanza y el entusiasmo de un nuevo comienzo. ¡Hola, mundo!
Author: Angi Casella
Version: 1.0.0
Author URI: http://angi.casella/
*/

/**
 * Función que se ejecuta al activar el plugin
 */
function activate_words_plugin() {
    createTable();
    insertarDatosTabla();
}

/**
 * Carga tabla wp_dam con las palabras que se han cambiado
 */
function createTable(){
    global $wpdb;
    $table_name = $wpdb->prefix . 'malsonante';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        palabra varchar(255) NOT NULL,
        reemplazo varchar(255) NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}

/**
 * Inserta en la tabla wp_malsonante las palabras que se han cambiado con SQL
 */
function insertarDatosTabla() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'malsonante';

    // Verificar si la tabla ya existe
    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        // Si no existe, crearla
        createTable();
    }

    $palabras = array(
        array('mear', 'pis'),
        array('caca', 'popo'),
        array('teta', 'pechuga'),
        array('culo', 'pompis'),
        array('ano', 'trasero')
    );

    // Verificar si ya existen datos en la tabla
    $data_exists = $wpdb->get_var("SELECT COUNT(*) FROM $table_name");

    // Si hay datos, eliminar la tabla y volver a crearla
    if ($data_exists > 0) {
        $wpdb->query("DROP TABLE IF EXISTS $table_name");
        createTable();
    }

    // Insertar datos en la tabla
    foreach ($palabras as $palabra) {
        $wpdb->insert(
            $table_name,
            array('palabra' => $palabra[0], 'reemplazo' => $palabra[1]),
            array('%s', '%s')
        );
    }
}


add_action('plugins_loaded', 'activate_words_plugin');


/**
 * Cambia la palabra WordPress por WordPressDAM
 * @param $text
 * @return array|string|string[]
 */
function renym_wordpress_typo_fix( $text ) {
    return str_replace( 'WordPress', 'WordPressDAM', $text);
}

add_filter( 'the_content', 'renym_wordpress_typo_fix' );

/**
 * Cambia un array de palabras por otro array de palabras distintas
 */
/*function renym_words_replace($text) {
    $array1= array("pipi","caca","teta","culo","ano");
    $array2= array("pepa","popo","pechuga","pompis","trasero");
    return str_replace($array1, $array2, $text);
}

add_filter('the_content', 'renym_words_replace');*/

/**
 * Cambia las palabras de la tabla wp_malsonante por su reemplazo
 */
function renym_words_replace_db($text) {
    global $wpdb;
    $table_name = $wpdb->prefix . 'malsonante';
    $palabras = $wpdb->get_results("SELECT palabra, reemplazo FROM $table_name");
    foreach ($palabras as $palabra) {
        $text = str_replace($palabra->palabra, $palabra->reemplazo, $text);
    }
    return $text;
}

add_filter('the_content', 'renym_words_replace_db');
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
function renym_words_replace($text) {
    $array1= array("pipi","caca","teta","culo","ano");
    $array2= array("pepa","popo","pechuga","pompis","trasero");
    return str_replace($array1, $array2, $text);
}

add_filter('the_content', 'renym_words_replace');
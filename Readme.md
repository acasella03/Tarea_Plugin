# Tarea: Plugin de WordPress

Un **plugin de WordPress** es un conjunto de archivos que se integran con el sistema 
de gestión de contenidos WordPress para agregar nuevas funciones o modificar las 
existentes en un sitio web. Los plugins permiten a los usuarios extender y personalizar 
las capacidades de WordPress sin tener que modificar el núcleo del software.

## Conceptos clave sobre los plugins de WordPress:
1. **Funcionalidad Adicional:**<br> 
    Los plugins pueden agregar una amplia variedad de funciones a un sitio de WordPress.
    Esto podría incluir desde pequeñas modificaciones, como cambiar el texto en el pie de 
    página, hasta funciones más complejas, como la integración de formularios de contacto, 
    galerías de imágenes, sistemas de reserva, etc.
<br><br>
2. **Independientes del Tema:**<br>
   Los plugins son independientes del tema utilizado en WordPress. Esto significa que puedes
   cambiar el aspecto visual de tu sitio (cambiando el tema) sin perder las funciones proporcionadas 
   por los plugins. La funcionalidad del sitio no está vinculada al diseño.
<br><br>
3. **Fácil Instalación y Activación:**<br>
   Los usuarios pueden instalar y activar plugins con facilidad desde el panel de administración 
   de WordPress. No se requieren conocimientos de programación avanzados para utilizar plugins.
<br><br>
4. **Hooks y Filtros:**<br>
   Los plugins se integran en WordPress utilizando "hooks" y "filtros". Los hooks (ganchos) 
   son puntos específicos en el flujo de ejecución de WordPress donde el plugin puede agregar
   o modificar código. Los filtros permiten a los plugins modificar datos o resultados antes
   de que se presenten al usuario.
<br><br>
5. **Personalización y Extensión:**<br>
   Los plugins ofrecen una forma poderosa de personalizar y extender WordPress. Si una funcionalidad
   específica no está disponible en el núcleo de WordPress, los usuarios pueden buscar o desarrollar 
   un plugin para agregar esa funcionalidad.
<br><br>
6. **Comunidad de Desarrolladores:**<br>
   Existe una amplia comunidad de desarrolladores de plugins en WordPress. Muchos plugins 
   son de código abierto y se pueden encontrar en el repositorio oficial de plugins de WordPress, 
   facilitando su acceso y uso.
<br><br>
7. **Seguridad:**<br>
   Aunque los plugins pueden agregar funcionalidades valiosas, también es importante elegirlos 
   con precaución. Los plugins mal codificados o desactualizados pueden representar riesgos 
   de seguridad para tu sitio web. Es recomendable utilizar plugins populares, bien mantenidos 
   y revisar las revisiones y actualizaciones antes de instalarlos.
<br><br>

## Explicación del código:
1. Cambia la palabra "WordPress" por "WordPressDAM" en el contenido del sitio.
    ```
    /**
        * Cambia la palabra WordPress por WordPressDAM
        * @param $text
        * @return array|string|string[]
    */
   function renym_wordpress_typo_fix( $text ) {
         return str_replace( 'WordPress', 'WordPressDAM', $text);
   }
    
    // Agrega el filtro para modificar el contenido
    add_filter( 'the_content', 'renym_wordpress_typo_fix' );
    ```
2. Reemplaza algunas palabras específicas por otras en el contenido del sitio.
   ```
   /**
   * Cambia un array de palabras por otro array de palabras distintas
   */
   function renym_words_replace($text) {
       $array1= array("pipi","caca","teta","culo","ano");
       $array2= array("pepa","popo","pechuga","pompis","trasero");
       return str_replace($array1, $array2, $text);
   }
    
    // Agrega otro filtro para modificar el contenido
    add_filter('the_content', 'renym_words_replace'); 
    ```
<?php
/**
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package known
 */

?>



            <?php
            while (have_posts()): 

                the_post();

                the_content(); 
                         
            endwhile;
            ?>




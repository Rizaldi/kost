<?php 
class html {
    function redirect($url) {
         echo '<META HTTP-EQUIV="refresh" CONTENT="0;URL='.$url.'">';
         exit;
    }
}
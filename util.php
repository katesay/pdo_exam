<?php
    function p($msg) {
        echo ($msg);
    }

    function d($msg) {
        if(DEBUG === TRUE) {
            var_dump ($msg);
        }
    }

?>
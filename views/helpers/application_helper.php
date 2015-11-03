<?php
    function link_to($path, $str) {
        $a_tag = sprintf('<a href="%s">%s</a>',
            $path,
            $str
        );
        return $a_tag;
    }
?>

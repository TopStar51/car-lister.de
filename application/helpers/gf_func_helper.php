<?php

function gf_html_load_js($js)
{
    echo '<script src="'.base_url($js).'" type="text/javascript"></script>';
}

function gf_html_load_css($css)
{
    echo '<link rel="stylesheet" href="'.base_url($css).'">';
}

?>
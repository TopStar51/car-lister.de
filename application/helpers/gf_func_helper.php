<?php

function gf_html_load_js($js)
{
    echo '<script src="'.base_url($js).'" type="text/javascript"></script>';
}

function gf_html_load_css($css)
{
    echo '<link rel="stylesheet" href="'.base_url($css).'">';
}

function _l($key){
	$ci = & get_instance();
	echo $ci->lang->line($key);
}
?>
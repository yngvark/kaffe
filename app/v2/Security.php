<?php
function makeSafe($input) {
	$safeHtml = "";
	preg_match_all('/[0-9A-Za-z������., ]/',$input, $safeHtml)  ;
	return implode($safeHtml[0]);
}

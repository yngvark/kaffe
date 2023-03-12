<?php
function makeSafe($input) {
	$safeHtml = "";
	preg_match_all('/[0-9A-Za-zזרוֶ״ֵ., ]/',$input, $safeHtml)  ;
	return implode($safeHtml[0]);
}

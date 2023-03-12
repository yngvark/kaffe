<?php

class Controller {

	/**
	 * @return true if there exists a 'name' array in the POST.
	*/
	function nameIsInPost() {
		return (!empty($_POST) && !empty($_POST['name']) && is_array($_POST['name']));
	}
	
}
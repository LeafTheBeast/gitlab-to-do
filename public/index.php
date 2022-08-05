<?php

require "C:\laragon\www\gitlab-to-do\\vendor\autoload.php";

	
/*	function getFetch(string $url)
	{
		$formatedResponse = json_decode(file_get_contents($url));
		
		return $formatedResponse;
	}
	*/

$new = new \DataHandling\DataMapper('https://gitlab.com/groenielp/test_project/-/merge_requests/1/discussions.json?per_page=20');

$test = $new->format('https://gitlab.com/groenielp/test_project/-/merge_requests/1/discussions.json?per_page=20');

var_dump($test);
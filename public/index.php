<?php

require "C:\laragon\www\gitlab-to-do\\vendor\autoload.php";

$url = 'https://gitlab.com/groenielp/test_project/-/merge_requests/1';

$fileUrl = $url . '/discussions.json?per_page=20';

$new = new \DataHandling\DataMapper();

$test = $new->format($fileUrl);

foreach ($test as $foo)
{
	if ($foo->isSystem() === false)
	{
	echo $foo->getNote() . "<br>";
	}
}

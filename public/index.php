<?php

require "C:\laragon\www\gitlab-to-do\\vendor\autoload.php";

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>GitLab-ToDo</title>
</head>
<body>
<h1>Git Lab - To Do List Maker</h1>
<form action="index.php" method="post">
	<input type="text" name="url">
	<input type="submit" value="Create">
</form>

<?php

$check = new \DataHandling\DataMapper();

$add = '/discussions.json?per_page=20';

$list = $check->format($_POST['url'] . $add);


\ToDoCreater\ToDo::saveToDoList( $list , 'test');

$bar = \ToDoCreater\ToDo::readToDoList('test.json');

foreach ($bar as $item)
{
    $note = $item->note;
    $author = $item->author;
    
    echo <<<HTML
<ul>
    <li >$note</li>
    <li>$author</li>
</ul>
HTML;

}

$ankers = scandir(\ToDoCreater\ToDo::getSaveFilePath());

foreach ($ankers as $anker)
{
    echo <<<HTML
<a>$anker</a>
<br>
HTML;

}
?>
<div class="test">

</div>
<script>
$(".test").load("https://gitlab.com/groenielp/test_project/-/merge_requests/1/discussions.json?per_page=20")
</script>
</body>
</html>
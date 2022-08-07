<?php

require "C:\laragon\www\gitlab-to-do\\vendor\autoload.php";

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
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

echo $_POST['url'];

$check = new \DataHandling\DataMapper();

$add = '/discussions.json?per_page=20';

$list = $check->format($_POST['url'] . $add);


foreach ($test as $foo)
{
	echo $foo->getNote() . "<br>";
}
?>

</body>
</html>
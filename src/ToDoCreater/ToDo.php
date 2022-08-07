<?php

namespace ToDoCreater;

class ToDo
{
	
	const OUTPUT_FILE = '' ;
	
	
	private static array $toDoList;
	
	
	public static function createToDoList(array $instanceList)
	{
		static::$toDoList = static::validated($instanceList);
		

		

	}
	
	public static function readToDoList()
	{
	
	}
	
	public static function saveToDoList($instanceList, $name = 'name')
	{
		$saveFilesRaw = scandir(static::getSaveFilePath());
		
		$saveFiles = array_diff($saveFilesRaw, ['..', '.']);
		
		if (in_array($name, $saveFiles))
		{
			die();
		}
		else
		{
			file_put_contents($name, json_encode($instanceList));
		}
		
	}
	
	public static function deleteToDoList()
	{
	
	}
	
	private static function validated(array $instanceList): array
	{
		foreach ($instanceList as $instance)
		{
			$todoItems = null;
			
			if($instance->isSystem() === true)
			{
				$todoItems[] = null;
			}
			else
			{
				$todoItems[] = $instance;
			}
		}
		
		return $todoItems;
	}
	
	private static function getSaveFilePath(): string
	{
		$path = dirname(__DIR__, 2) . '\\data\\ToDoSave';
		
		return $path;
	}
}
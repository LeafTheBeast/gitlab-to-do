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
	
	public static function readToDoList($fileName):array
	{
		$path = static::getSaveFilePath();
		
		$fileData = file_get_contents($path . '\\' . $fileName);
		
		$format = json_decode($fileData);
		
		return $format;
	}
	
	public static function saveToDoList($instanceList, $name = 'name')
	{
		$path = static::getSaveFilePath();
		
		$saveFilesRaw = scandir(static::getSaveFilePath());
		
		$saveFiles = array_diff($saveFilesRaw, ['..', '.']);
		
		$encode = [];
		
		foreach ($instanceList as $instance)
		{
			$encode[] = ['note' => $instance->getNote() ,
						 'author' => $instance->getAuthor(),
						 'paths' => $instance->getPaths(),
						 'lines' => $instance->getLines()];
		}
		
		$jsonFormat = json_encode($encode);
		
		
		
		if (in_array($name, $saveFiles))
		{
			die();
		}
		else
		{
			file_put_contents($path . '\\' . $name . '.json', $jsonFormat);
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
	
	public static function getSaveFilePath(): string
	{
		$path = dirname(__DIR__, 2) . '\\data\\ToDoSave';
		
		return $path;
	}
}
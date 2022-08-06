<?php

namespace ToDoCreater\ToDo;

class ToDo
{
	private static array $toDoRaw;
	
	
	public static function getToDoList(array $instanceList): array
	{
		static::$toDoList = static::validated($instanceList);
		
		# ToDo
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
}
<?php

namespace DataHandling;

use DataHandling\Helpers\ResponsHelper;
use DataHandling\Models\DataModel;

class DataMapper
{
	public function format($url): array
	{
		$responseArrays = ResponsHelper::getData($url);
		$modelList      = [];
		
		
		foreach ($responseArrays as $responseArray)
		{
			$response     = $responseArray->notes[0];
			
			if (!isset($response->position))
			{
				$paths = [
					null,
					null
				];
				
				$lines = [
					null,
					null
				];
			}
			else
			{
				$responsePosi = $response->position;
				
				$paths = [
					$responsePosi->old_path,
					$responsePosi->new_path,
				];
				
				$lines = [
					$responsePosi->old_line,
					$responsePosi->new_line
				];
			}
			
			$modelList[] = (new DataModel(
				$response->note,
				$response->note_html,
				$response->resolved,
				$response->author->name,
				$paths,
				$lines
			));
		}
		
		return $modelList;
	}
}
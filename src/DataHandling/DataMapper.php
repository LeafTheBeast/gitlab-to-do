<?php

namespace DataHandling;

/**
 * The DataMapper class for format the given data into an array of instances
 */
class DataMapper
{
	/**
	 * Map the data from the GitLab discussion.json file into a workable format
	 *
	 * @param string $url URL of the GitLab merge request
	 *
	 * @return array List of DataModel instances
	 *
	 * @since 1.0.0
	 */
	public function format(string $url): array
	{
		$responseArrays = \DataHandling\Helpers\ResponsHelper::getData($url);
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
			
			$modelList[] = (new \DataHandling\Models\DataModel(
				$response->note,
				$response->note_html,
				$response->resolved,
				$response->author->name,
				$paths,
				$lines,
				$response->system,
				$response->emoji_awardable
			));
		}
		
		return $modelList;
	}
}
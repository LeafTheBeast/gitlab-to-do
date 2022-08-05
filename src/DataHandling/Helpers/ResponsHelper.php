<?php

namespace DataHandling\Helpers;

class ResponsHelper
{
	/**
	 * @var array|null Data from GitLab discussion file
	 *
	 * @since 1.0.0
	 */
	private static ?array $response = null;
	
	/**
	 * Get a list of GitLab discussion information
	 *
	 * @param   string $url GitLab discussion.json file
	 *
	 * @return array List of GitLab informations
	 *
	 * @since 1.0.0
	 */
	public static function getData(string $url): array
	{
		$response = file_get_contents($url);
		
		static::format($response);
		
		return static::$response;
	}
	
	/**
	 * Formats the raw json data into a workable array
	 *
	 * @param string $response
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	private static function format(string $response): void
	{
		static::$response = json_decode($response);
	}
}
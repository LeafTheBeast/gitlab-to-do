<?php

namespace DataHandling\Models;

class DataModel
{
	/**
	 * @var string Comment from the GitLab merge request
	 *
	 * @since 1.0.0
	 */
	private string $note;
	
	/**
	 * @var string HTML structure of the GitLab merge request comment
	 *
	 * @since 1.0.0
	 */
	private string $noteHtml;
	
	/**
	 * @var bool Status of the comment
	 *
	 * @since 1.0.0
	 */
	private bool $resolved;
	
	/**
	 * @var string Name of the comment author
	 *
	 * @since 1.0.0
	 */
	private string $author;
	
	/**
	 * @var ?array File Paths of the old and current files
	 *
	 * When the file didn't have changed
	 *
	 * @since 1.0.0
	 */
	private ?array $paths;
	
	/**
	 * @var array|null List containing old line and the current line, where the comment was set
	 *            When the lines didn't have changed, then the old_line will be null
	 *
	 * @since 1.0.0
	 */
	private ?array $lines;
	
	/**
	 * The DataModels constructor class
	 *
	 * @param   string $note
	 * @param   string $noteHtml
	 * @param   bool   $resolved
	 * @param   string $author
	 * @param   array  $paths
	 * @param   array  $lines
	 *
	 * @since 1.0.0
	 */
	public function __construct(
		string $note,
		string $noteHtml,
		bool $resolved,
		string $author,
		array $paths,
		array $lines
		
	)
	{
		$this->note     = $note;
		$this->noteHtml = $noteHtml;
		$this->resolved = $resolved;
		$this->author   = $author;
		$this->paths    = $paths;
		$this->lines    = $lines;
	}
	
	/**
	 * Get the text of a comment
	 *
	 * @return string
	 */
	public function getNote(): string
	{
		return $this->note;
	}
	
	/**
	 * Get the HTML structure of the comment
	 *
	 * @return string
	 */
	public function getNoteHtml(): string
	{
		return $this->noteHtml;
	}
	
	/**
	 * Get the resolved status of the comment
	 *
	 * @return bool
	 */
	public function isResolved(): bool
	{
		return $this->resolved;
	}
	
	/**
	 * Get the author of the comment
	 *
	 * @return string
	 */
	public function getAuthor(): string
	{
		return $this->author;
	}
	
	/**
	 * Get the old and new path of the file
	 *
	 * @return array
	 */
	public function getPaths(): array
	{
		return $this->paths;
	}
	
	/**
	 * Get the lines where the comment was set in the merge request
	 *
	 * @return array
	 */
	public function getLines(): array
	{
		return $this->lines;
	}
	
	
}
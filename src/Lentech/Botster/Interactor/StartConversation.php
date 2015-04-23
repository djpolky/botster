<?php

namespace Lentech\Botster\Interactor;

use Lentech\Botster\Repository;
use Lentech\Botster\Entity;

class StartConversation
{
	private $conversation_repository;
	
	public function __construct(Repository\Conversation $conversation_repository)
	{
		$this->conversation_repository = $conversation_repository;
	}
	
	/**
	 * Starts a new conversation.
	 * 
	 * @param string $ip IP address
	 * @param string $user_agent User agent
	 * @return int Conversation ID
	 */
	public function interact($ip, $user_agent)
	{
		// Create conversation entity
		$conversation = new Entity\Conversation([
			'ip' => $ip,
			'user_agent' => $user_agent,
		]);
		
		// Add conversation to database
		$this->conversation_repository->create($conversation);
		
		return $conversation->id;
	}
}
<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
	#[ORM\Id]
	#[ORM\GeneratedValue]
	#[ORM\Column]
	private int $id;

	#[ORM\Column]
	private string $firstname;

	#[ORM\Column]
	private string $lastname;

	#[ORM\Column]
	private string $username;

	#[ORM\Column]
	private string $password;

	#[ORM\Column(type: 'json')]
	private array $roles = [];


	/**
	 * @see UserInterface
	 */
	public function getRoles(): array
	{
		$roles = $this->roles;
		// guarantee every user at least has ROLE_USER
		$roles[] = 'ROLE_USER';

		return array_unique($roles);
	}

	public function setRoles(array $roles): self
	{
		$this->roles = $roles;

		return $this;
	}

	/**
	 * @see PasswordAuthenticatedUserInterface
	 */
	public function getPassword(): string
	{
		return $this->password;
	}

	public function setPassword(string $password): self
	{
		$this->password = $password;

		return $this;
	}
	/**
	 * @inheritDoc
	 */
	public function eraseCredentials(): void
	{
		return;
	}

	/**
	 * @inheritDoc
	 */
	public function getUserIdentifier(): string
	{
		return $this->username;
	}

	public function getPassword(): ?string
	{
		// TODO: Implement getPassword() method.
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{

		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId(int $id): self
	{
		$this->id = $id;
		return $this;

	}

	/**
	 * @return string
	 */
	public function getFirstname(): string
	{

		return $this->firstname;
	}

	/**
	 * @param string $firstname
	 */
	public function setFirstname(string $firstname): self
	{
		$this->firstname = $firstname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getLastname(): string
	{

		return $this->lastname;
	}

	/**
	 * @param string $lastname
	 */
	public function setLastname(string $lastname): self
	{
		$this->lastname = $lastname;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getUsername(): string
	{

		return $this->username;
	}

	/**
	 * @param string $username
	 */
	public function setUsername(string $username): self
	{
		$this->username = $username;
		return $this;
	}


}
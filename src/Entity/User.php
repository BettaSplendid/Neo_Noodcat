<?php

namespace App\Entity;

use \DateTime;
use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({"cashier" = "Cashier", "manager" = "Manager", "client" = "Client"})
 * @ORM\Table(name="User",uniqueConstraints={@ORM\UniqueConstraint(name="emailConstraint", columns={"email"})})
 */
abstract class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(length="100")
     */
    private string $lastname;

    /**
     * @ORM\Column(length="100")
     */
    private string $firstname;

    /**
     * @ORM\Column(length="100")
     */
    private string $email;

    /**
     * @ORM\Column(length="100")
     */
    private string $password;

    /**
     * @ORM\Column(type="date")
     */
    private DateTime $dateInscription;

    public function __construct(string $lastname, string $firstname, string $email, string $password, DateTime $dateInscription)
    {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->password = $password;
        $this->dateInscription = $dateInscription;
    }

    /**
     * Get the value of id
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of firstname
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of dateInscription
     */
    public function getDateInscription(): DateTime
    {
        return $this->dateInscription;
    }

    /**
     * Set the value of dateInscription
     *
     * @return  self
     */
    public function setDateInscription(DateTime $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }
}

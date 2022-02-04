<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Cat",uniqueConstraints={@ORM\UniqueConstraint(name="puceNumConstraint", columns={"puceNum"})})
 */
final class Cat {

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $cat_id;

    /**
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $puceNum;

    /**
     * @ORM\Column(length="100")
     */
    private string $description;

    /**
     * @ORM\ManyToOne(targetEntity="Bar") 
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="bar_id")
     */
    private Bar $enseigne;

     /**
     * @ORM\Column(length="100", nullable=true)
     */
    private string $statut;

    public function __construct(int $puceNum, string $description, Bar $enseigne)
    {
        $this->puceNum = $puceNum;
        $this->description = $description;
        $this->enseigne = $enseigne;
        $this->statut = "default value";
    }


    /**
     * Get the value of id
     */ 
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Get the value of puceNum
     */ 
    public function getPuceNum() : int
    {
        return $this->puceNum;
    }

    /**
     * Set the value of puceNum
     *
     * @return  self
     */ 
    public function setPuceNum(int $puceNum) : self
    {
        $this->puceNum = $puceNum;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription() : string
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription(string $description) : self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of enseigne
     */ 
    public function getEnseigne() : Bar
    {
        return $this->enseigne;
    }

    /**
     * Set the value of enseigne
     *
     * @return  self
     */ 
    public function setEnseigne(string $enseigne) : self
    {
        $this->enseigne = $enseigne;

        return $this;
    }

    /**
     * Get the value of statut
     */ 
    public function getStatut() : string
    {
        return $this->statut;
    }

    /**
     * Set the value of statut
     *
     * @return  self
     */ 
    public function setStatut(string $statut) : self
    {
        $this->statut = $statut;

        return $this;
    }
}
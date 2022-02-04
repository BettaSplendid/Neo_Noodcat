<?php

namespace App\Entity;

use \DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Reservation
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $reservation_d;
    /**
     * @ORM\Column(type="datetime")
     */
    private DateTime $ReservationTime;


    /**
     * @ORM\ManyToOne(targetEntity="Cashier")
     * @ORM\JoinColumn(name="cashier_id", referencedColumnName="id")
     */
    private Cashier $cashier;

    /**
     * @ORM\ManyToOne(targetEntity="Cat") 
     * @ORM\JoinColumn(name="cat_id", referencedColumnName="cat_id")
     */
    private Cat $cat;

    public function __construct(DateTime $ReservationTime)
    {
        $this->ReservationTime = $ReservationTime;
    }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of ReservationTime
     */
    public function getReservationTime(): DateTime
    {
        return $this->ReservationTime;
    }

    /**
     * Set the value of ReservationTime
     *
     * @return  self
     */
    public function setReservationTime(DateTime $ReservationTime)
    {
        $this->ReservationTime = $ReservationTime;

        return $this;
    }

    /**
     * Get the value of cashier
     */ 
    public function getCashier() : Cashier
    {
        return $this->cashier;
    }

    /**
     * Set the value of cashier
     *
     * @return  self
     */ 
    public function setCashier(Cashier $cashier) : self
    {
        $this->cashier = $cashier;

        return $this;
    }

    /**
     * Get the value of cat
     */ 
    public function getCat() : Cat
    {
        return $this->cat;
    }

    /**
     * Set the value of cat
     *
     * @return  self
     */ 
    public function setCat(Cat $cat) :self
    {
        $this->cat = $cat;

        return $this;
    }
}

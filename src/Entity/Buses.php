<?php

namespace App\Entity;

use App\Repository\BusesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BusesRepository::class)
 */
class Buses
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $busId;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $busName;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $seats;

    /**
     * @ORM\ManyToOne(targetEntity=BusesRoutes::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $busesRoutes;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $fare;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBusId(): ?string
    {
        return $this->busId;
    }

    public function setBusId(string $busId): self
    {
        $this->busId = $busId;

        return $this;
    }

    public function getBusName(): ?string
    {
        return $this->busName;
    }

    public function setBusName(string $busName): self
    {
        $this->busName = $busName;

        return $this;
    }

    public function getSeats(): ?string
    {
        return $this->seats;
    }

    public function setSeats(string $seats): self
    {
        $this->seats = $seats;

        return $this;
    }

    public function getBusesRoutes(): ?BusesRoutes
    {
        return $this->busesRoutes;
    }

    public function setBusesRoutes(?BusesRoutes $busesRoutes): self
    {
        $this->busesRoutes = $busesRoutes;

        return $this;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->busName;
        // to show the id of the Category in the select
        // return $this->id;
    }

    public function getFare(): ?string
    {
        return $this->fare;
    }

    public function setFare(string $fare): self
    {
        $this->fare = $fare;

        return $this;
    }

}

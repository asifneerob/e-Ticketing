<?php

namespace App\Entity;

use App\Repository\BusesRoutesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BusesRoutesRepository::class)
 */
class BusesRoutes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $routeId;

    /**
     * @ORM\Column(type="string", length=40)
     */
    private $routesFrom;

    /**
     * @ORM\Column(type="string", length=40)
     *
     */
    private $routesTo;

    /**
     * @ORM\Column(type="time")
     */
    private $time;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRouteId(): ?string
    {
        return $this->routeId;
    }

    public function setRouteId(string $routeId): self
    {
        $this->routeId = $routeId;

        return $this;
    }

    public function getRoutesFrom(): ?string
    {
        return $this->routesFrom;
    }

    public function setRoutesFrom(string $routesFrom): self
    {
        $this->routesFrom = $routesFrom;

        return $this;
    }

    public function getRoutesTo(): ?string
    {
        return $this->routesTo;
    }

    public function setRoutesTo(string $routesTo): self
    {
        $this->routesTo = $routesTo;

        return $this;
    }

    public function getTime(): ?\DateTimeInterface
    {
        return $this->time;
    }

    public function setTime(\DateTimeInterface $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function __toString(){
        // to show the name of the Category in the select
        return $this->routeId;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

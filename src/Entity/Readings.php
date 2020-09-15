<?php

namespace App\Entity;

use App\Repository\ReadingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReadingsRepository::class)
 */
class Readings
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $timestamp;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $temp_probe;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $temp_int;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $pressure_int;

    /**
     * @ORM\Column(type="decimal", precision=6, scale=2, nullable=true)
     */
    private $humidity_int;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTimestamp(): ?\DateTimeInterface
    {
        return $this->timestamp;
    }

    public function setTimestamp(\DateTimeInterface $timestamp): self
    {
        $this->timestamp = $timestamp;

        return $this;
    }

    public function getTempProbe(): ?string
    {
        return $this->temp_probe;
    }

    public function setTempProbe(string $temp_probe): self
    {
        $this->temp_probe = $temp_probe;

        return $this;
    }

    public function getTempInt(): ?string
    {
        return $this->temp_int;
    }

    public function setTempInt(string $temp_int): self
    {
        $this->temp_int = $temp_int;

        return $this;
    }

    public function getPressureInt(): ?string
    {
        return $this->pressure_int;
    }

    public function setPressureInt(string $pressure_int): self
    {
        $this->pressure_int = $pressure_int;

        return $this;
    }

    public function getHumidityInt(): ?string
    {
        return $this->humidity_int;
    }

    public function setHumidityInt(?string $humidity_int): self
    {
        $this->humidity_int = $humidity_int;

        return $this;
    }
}

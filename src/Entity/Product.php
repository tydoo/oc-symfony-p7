<?php

namespace App\Entity;

use DateTimeImmutable;
use ApiPlatform\Metadata\Get;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Repository\ProductRepository;
use ApiPlatform\Metadata\GetCollection;

#[ApiResource(
    operations: [
        new Get(),
        new GetCollection()
    ],
)]
#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(length: 255)]
    private ?string $model = null;

    #[ORM\Column(length: 255)]
    private ?string $processor = null;

    #[ORM\Column]
    private ?int $memory = null;

    #[ORM\Column(length: 255)]
    private ?string $os = null;

    #[ORM\Column]
    private ?int $rom = null;

    #[ORM\Column]
    private ?int $battery = null;

    #[ORM\Column]
    private ?int $price = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    private ?\DateTimeImmutable $releasedAt = null;

    public function getId(): ?int {
        return $this->id;
    }

    public function getBrand(): ?string {
        return $this->brand;
    }

    public function setBrand(string $brand): static {
        $this->brand = $brand;

        return $this;
    }

    public function getModel(): ?string {
        return $this->model;
    }

    public function setModel(string $model): static {
        $this->model = $model;

        return $this;
    }

    public function getProcessor(): ?string {
        return $this->processor;
    }

    public function setProcessor(string $processor): static {
        $this->processor = $processor;

        return $this;
    }

    public function getMemory(): ?int {
        return $this->memory;
    }

    public function setMemory(int $memory): static {
        $this->memory = $memory;

        return $this;
    }

    public function getOs(): ?string {
        return $this->os;
    }

    public function setOs(string $os): static {
        $this->os = $os;

        return $this;
    }

    public function getRom(): ?int {
        return $this->rom;
    }

    public function setRom(int $rom): static {
        $this->rom = $rom;

        return $this;
    }

    public function getBattery(): ?int {
        return $this->battery;
    }

    public function setBattery(int $battery): static {
        $this->battery = $battery;

        return $this;
    }

    public function getPrice(): ?int {
        return $this->price;
    }

    public function setPrice(int $price): static {
        $this->price = $price;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getReleasedAt(): ?\DateTimeImmutable {
        return $this->releasedAt;
    }

    public function setReleasedAt(\DateTimeImmutable $releasedAt): static {
        $this->releasedAt = $releasedAt;

        return $this;
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void {
        $this->createdAt = $this->createdAt ?? new DateTimeImmutable();
    }
}

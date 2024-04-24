<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

#[ORM\HasLifecycleCallbacks]
#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client {
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $expiredAt = null;

    /**
     * @var Collection<int, User>
     */
    #[ORM\OneToMany(
        targetEntity: User::class,
        mappedBy: 'client',
        orphanRemoval: true,
        cascade: ['persist', 'remove']
    )]
    private Collection $users;

    /**
     * @var Collection<int, Application>
     */
    #[ORM\OneToMany(
        targetEntity: Application::class,
        mappedBy: 'client',
        orphanRemoval: true,
        cascade: ['persist', 'remove']
    )]
    private Collection $applications;

    public function __construct() {
        $this->users = new ArrayCollection();
        $this->applications = new ArrayCollection();
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): static {
        $this->name = $name;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getExpiredAt(): ?\DateTimeImmutable {
        return $this->expiredAt;
    }

    public function setExpiredAt(\DateTimeImmutable $expiredAt): static {
        $this->expiredAt = $expiredAt;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection {
        return $this->users;
    }

    public function addUser(User $user): static {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setClient($this);
        }

        return $this;
    }

    public function removeUser(User $user): static {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getClient() === $this) {
                $user->setClient(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Application>
     */
    public function getApplications(): Collection {
        return $this->applications;
    }

    public function addApplication(Application $application): static {
        if (!$this->applications->contains($application)) {
            $this->applications->add($application);
            $application->setClient($this);
        }

        return $this;
    }

    public function removeApplication(Application $application): static {
        if ($this->applications->removeElement($application)) {
            // set the owning side to null (unless already changed)
            if ($application->getClient() === $this) {
                $application->setClient(null);
            }
        }

        return $this;
    }

    #[ORM\PrePersist]
    public function onPrePersist(): void {
        $this->createdAt = $this->createdAt ?? new DateTimeImmutable();
    }
}

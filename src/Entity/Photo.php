<?php

namespace App\Entity;

use App\Repository\PhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PhotoRepository::class)]
class Photo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(mappedBy: 'photo', cascade: ['persist', 'remove'])]
    private ?Actualites $actualites = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActualites(): ?Actualites
    {
        return $this->actualites;
    }

    public function setActualites(Actualites $actualites): static
    {
        // set the owning side of the relation if necessary
        if ($actualites->getPhoto() !== $this) {
            $actualites->setPhoto($this);
        }

        $this->actualites = $actualites;

        return $this;
    }
}

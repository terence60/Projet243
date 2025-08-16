<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieRepository::class)]
class Categorie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    /**
     * @var Collection<int, Actualites>
     */
    #[ORM\OneToMany(targetEntity: Actualites::class, mappedBy: 'categorie')]
    private Collection $actualites;

    public function __construct()
    {
        $this->actualites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * @return Collection<int, Actualites>
     */
    public function getActualites(): Collection
    {
        return $this->actualites;
    }

    public function addActualite(Actualites $actualite): static
    {
        if (!$this->actualites->contains($actualite)) {
            $this->actualites->add($actualite);
            $actualite->setCategorie($this);
        }

        return $this;
    }

    public function removeActualite(Actualites $actualite): static
    {
        if ($this->actualites->removeElement($actualite)) {
            // set the owning side to null (unless already changed)
            if ($actualite->getCategorie() === $this) {
                $actualite->setCategorie(null);
            }
        }

        return $this;
    }
}

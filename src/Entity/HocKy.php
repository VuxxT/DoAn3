<?php

namespace App\Entity;

use App\Repository\HocKyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HocKyRepository::class)]
class HocKy
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $TenHK = null;

    #[ORM\OneToMany(mappedBy: 'TenHK', targetEntity: Diem::class)]
    private Collection $diems;

    public function __construct()
    {
        $this->diems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTenHK(): ?string
    {
        return $this->TenHK;
    }

    public function setTenHK(string $TenHK): static
    {
        $this->TenHK = $TenHK;

        return $this;
    }
    public function __toString() {
        return $this->TenHK;
        return $this->diems;
    }

    /**
     * @return Collection<int, Diem>
     */
    public function getDiems(): Collection
    {
        return $this->diems;
    }

    public function addDiem(Diem $diem): static
    {
        if (!$this->diems->contains($diem)) {
            $this->diems->add($diem);
            $diem->setTenHK($this);
        }

        return $this;
    }

    public function removeDiem(Diem $diem): static
    {
        if ($this->diems->removeElement($diem)) {
            // set the owning side to null (unless already changed)
            if ($diem->getTenHK() === $this) {
                $diem->setTenHK(null);
            }
        }

        return $this;
    }
}

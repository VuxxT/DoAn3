<?php

namespace App\Entity;

use App\Repository\MonHocRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MonHocRepository::class)]
class MonHoc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $TenMonHoc = null;

    #[ORM\OneToMany(mappedBy: 'TenMonHoc', targetEntity: Diem::class)]
    private Collection $diems;

    #[ORM\OneToMany(mappedBy: 'TenMonHoc', targetEntity: LichHoc::class)]
    private Collection $lichHocs;

    public function __construct()
    {
        $this->diems = new ArrayCollection();
        $this->lichHocs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTenMonHoc(): ?string
    {
        return $this->TenMonHoc;
    }

    public function setTenMonHoc(string $TenMonHoc): static
    {
        $this->TenMonHoc = $TenMonHoc;

        return $this;
    }

    public function __toString() {
        return $this->TenMonHoc;
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
            $diem->setTenMonHoc($this);
        }

        return $this;
    }

    public function removeDiem(Diem $diem): static
    {
        if ($this->diems->removeElement($diem)) {
            // set the owning side to null (unless already changed)
            if ($diem->getTenMonHoc() === $this) {
                $diem->setTenMonHoc(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, LichHoc>
     */
    public function getLichHocs(): Collection
    {
        return $this->lichHocs;
    }

    public function addLichHoc(LichHoc $lichHoc): static
    {
        if (!$this->lichHocs->contains($lichHoc)) {
            $this->lichHocs->add($lichHoc);
            $lichHoc->setTenMonHoc($this);
        }

        return $this;
    }

    public function removeLichHoc(LichHoc $lichHoc): static
    {
        if ($this->lichHocs->removeElement($lichHoc)) {
            // set the owning side to null (unless already changed)
            if ($lichHoc->getTenMonHoc() === $this) {
                $lichHoc->setTenMonHoc(null);
            }
        }

        return $this;
    }
}

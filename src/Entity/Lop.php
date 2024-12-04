<?php

namespace App\Entity;

use App\Repository\LopRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LopRepository::class)]
class Lop
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $TenLop = null;

    #[ORM\Column]
    private ?int $SiSo = null;

    #[ORM\OneToMany(mappedBy: 'TenLop', targetEntity: LichHoc::class)]
    private Collection $lichHocs;

    #[ORM\OneToMany(mappedBy: 'TenLop', targetEntity: HocSinh::class)]
    private Collection $hocSinhs;

    public function __construct()
    {
        $this->lichHocs = new ArrayCollection();
        $this->hocSinhs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTenLop(): ?string
    {
        return $this->TenLop;
    }

    public function setTenLop(string $TenLop): static
    {
        $this->TenLop = $TenLop;

        return $this;
    }

    public function getSiSo(): ?int
    {
        return $this->SiSo;
    }

    public function setSiSo(int $SiSo): static
    {
        $this->SiSo = $SiSo;

        return $this;
    }

    public function __toString() {
        return $this->TenLop;
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
            $lichHoc->setTenLop($this);
        }

        return $this;
    }

    public function removeLichHoc(LichHoc $lichHoc): static
    {
        if ($this->lichHocs->removeElement($lichHoc)) {
            // set the owning side to null (unless already changed)
            if ($lichHoc->getTenLop() === $this) {
                $lichHoc->setTenLop(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, HocSinh>
     */
    public function getHocSinhs(): Collection
    {
        return $this->hocSinhs;
    }

    public function addHocSinh(HocSinh $hocSinh): static
    {
        if (!$this->hocSinhs->contains($hocSinh)) {
            $this->hocSinhs->add($hocSinh);
            $hocSinh->setTenLop($this);
        }

        return $this;
    }

    public function removeHocSinh(HocSinh $hocSinh): static
    {
        if ($this->hocSinhs->removeElement($hocSinh)) {
            // set the owning side to null (unless already changed)
            if ($hocSinh->getTenLop() === $this) {
                $hocSinh->setTenLop(null);
            }
        }

        return $this;
    }
}

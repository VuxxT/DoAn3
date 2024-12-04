<?php

namespace App\Entity;

use App\Repository\HocSinhRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HocSinhRepository::class)]
class HocSinh
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30)]
    private ?string $TenHS = null;

    #[ORM\Column(length: 30)]
    private ?string $Email = null;

    #[ORM\Column(length: 20)]
    private ?string $SDT = null;

    #[ORM\Column(length: 30)]
    private ?string $DiaChi = null;

    #[ORM\Column(length: 30)]
    private ?string $TenPhuHuynh = null;

    #[ORM\Column(length: 20)]
    private ?string $SDTPH = null;

    #[ORM\OneToMany(mappedBy: 'TenHS', targetEntity: Diem::class)]
    private Collection $diems;

    #[ORM\ManyToOne(inversedBy: 'hocSinhs')]
    private ?Lop $TenLop = null;

    public function __construct()
    {
        $this->diems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTenHS(): ?string
    {
        return $this->TenHS;
    }

    public function setTenHS(string $TenHS): static
    {
        $this->TenHS = $TenHS;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getSDT(): ?string
    {
        return $this->SDT;
    }

    public function setSDT(string $SDT): static
    {
        $this->SDT = $SDT;

        return $this;
    }

    public function getDiaChi(): ?string
    {
        return $this->DiaChi;
    }

    public function setDiaChi(string $DiaChi): static
    {
        $this->DiaChi = $DiaChi;

        return $this;
    }

    public function getTenPhuHuynh(): ?string
    {
        return $this->TenPhuHuynh;
    }

    public function setTenPhuHuynh(string $TenPhuHuynh): static
    {
        $this->TenPhuHuynh = $TenPhuHuynh;

        return $this;
    }

    public function getSDTPH(): ?string
    {
        return $this->SDTPH;
    }

    public function setSDTPH(string $SDTPH): static
    {
        $this->SDTPH = $SDTPH;

        return $this;
    }

    public function __toString() {
        return $this->TenHS;
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
            $diem->setTenHS($this);
        }

        return $this;
    }

    public function removeDiem(Diem $diem): static
    {
        if ($this->diems->removeElement($diem)) {
            // set the owning side to null (unless already changed)
            if ($diem->getTenHS() === $this) {
                $diem->setTenHS(null);
            }
        }

        return $this;
    }

    public function getTenLop(): ?Lop
    {
        return $this->TenLop;
    }

    public function setTenLop(?Lop $TenLop): static
    {
        $this->TenLop = $TenLop;

        return $this;
    }
}

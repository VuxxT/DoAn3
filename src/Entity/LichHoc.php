<?php

namespace App\Entity;

use App\Repository\LichHocRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LichHocRepository::class)]
class LichHoc
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $SoTiet = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Ngay = null;

    #[ORM\ManyToOne(inversedBy: 'lichHocs')]
    private ?MonHoc $TenMonHoc = null;

    #[ORM\ManyToOne(inversedBy: 'lichHocs')]
    private ?Lop $TenLop = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSoTiet(): ?int
    {
        return $this->SoTiet;
    }

    public function setSoTiet(int $SoTiet): static
    {
        $this->SoTiet = $SoTiet;

        return $this;
    }

    public function getNgay(): ?\DateTimeInterface
    {
        return $this->Ngay;
    }

    public function setNgay(\DateTimeInterface $Ngay): static
    {
        $this->Ngay = $Ngay;

        return $this;
    }

    public function __toString() {
        return $this->TenMonHoc;
        return $this->TenLop;
    }

    public function getTenMonHoc(): ?MonHoc
    {
        return $this->TenMonHoc;
    }

    public function setTenMonHoc(?MonHoc $TenMonHoc): static
    {
        $this->TenMonHoc = $TenMonHoc;

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

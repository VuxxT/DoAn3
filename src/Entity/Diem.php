<?php

namespace App\Entity;

use App\Repository\DiemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DiemRepository::class)]
class Diem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $DiemTraBai = null;

    #[ORM\Column]
    private ?float $DiemKtra15phut = null;

    #[ORM\Column]
    private ?float $DiemKtra1tiet = null;

    #[ORM\Column]
    private ?float $DiemThi = null;

    #[ORM\Column]
    private ?float $DiemTb = null;

    #[ORM\ManyToOne(inversedBy: 'diems')]
    private ?HocKy $TenHK = null;

    #[ORM\ManyToOne(inversedBy: 'diems')]
    private ?MonHoc $TenMonHoc = null;

    #[ORM\ManyToOne(inversedBy: 'diems')]
    private ?HocSinh $TenHS = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDiemTraBai(): ?float
    {
        return $this->DiemTraBai;
    }

    public function setDiemTraBai(float $DiemTraBai): static
    {
        $this->DiemTraBai = $DiemTraBai;

        return $this;
    }

    public function getDiemKtra15phut(): ?float
    {
        return $this->DiemKtra15phut;
    }

    public function setDiemKtra15phut(float $DiemKtra15phut): static
    {
        $this->DiemKtra15phut = $DiemKtra15phut;

        return $this;
    }

    public function getDiemKtra1tiet(): ?float
    {
        return $this->DiemKtra1tiet;
    }

    public function setDiemKtra1tiet(float $DiemKtra1tiet): static
    {
        $this->DiemKtra1tiet = $DiemKtra1tiet;

        return $this;
    }

    public function getDiemThi(): ?float
    {
        return $this->DiemThi;
    }

    public function setDiemThi(float $DiemThi): static
    {
        $this->DiemThi = $DiemThi;

        return $this;
    }

    public function getDiemTb(): ?float
    {
        return $this->DiemTb;
    }

    public function setDiemTb(float $DiemTb): static
    {
        $this->DiemTb = $DiemTb;

        return $this;
    }

    public function __toString() {
        return $this->TenHK;
        return $this->TenMonHoc;
        return $this->TenHS;
    }

    public function getTenHK(): ?HocKy
    {
        return $this->TenHK;
    }

    public function setTenHK(?HocKy $TenHK): static
    {
        $this->TenHK = $TenHK;

        return $this;
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

    public function getTenHS(): ?HocSinh
    {
        return $this->TenHS;
    }

    public function setTenHS(?HocSinh $TenHS): static
    {
        $this->TenHS = $TenHS;

        return $this;
    }
}

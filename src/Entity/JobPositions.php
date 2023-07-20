<?php

namespace App\Entity;

use App\Repository\JobPositionsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JobPositionsRepository::class)]
class JobPositions
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $company_name = null;

    #[ORM\Column(length: 255)]
    private ?string $website = null;

    #[ORM\Column(length: 1000)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $position_title = null;

    #[ORM\Column(length: 1000)]
    private ?string $position_description = null;

    #[ORM\Column(length: 1000)]
    private ?string $requirements = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $salary = null;

    #[ORM\Column(length: 255)]
    private ?string $employment_mode = null;

    #[ORM\Column(length: 255)]
    private ?string $image = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->company_name;
    }

    public function setCompanyName(string $company_name): static
    {
        $this->company_name = $company_name;

        return $this;
    }

    public function getWebsite(): ?string
    {
        return $this->website;
    }

    public function setWebsite(string $website): static
    {
        $this->website = $website;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPositionTitle(): ?string
    {
        return $this->position_title;
    }

    public function setPositionTitle(string $position_title): static
    {
        $this->position_title = $position_title;

        return $this;
    }

    public function getPositionDescription(): ?string
    {
        return $this->position_description;
    }

    public function setPositionDescription(string $position_description): static
    {
        $this->position_description = $position_description;

        return $this;
    }

    public function getRequirements(): ?string
    {
        return $this->requirements;
    }

    public function setRequirements(string $requirements): static
    {
        $this->requirements = $requirements;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(string $salary): static
    {
        $this->salary = $salary;

        return $this;
    }

    public function getEmploymentMode(): ?string
    {
        return $this->employment_mode;
    }

    public function setEmploymentMode(string $employment_mode): static
    {
        $this->employment_mode = $employment_mode;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): static
    {
        $this->image = $image;

        return $this;
    }
}

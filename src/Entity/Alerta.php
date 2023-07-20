<?php

namespace App\Entity;

use App\Repository\AlertaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AlertaRepository::class)]
class Alerta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_usuario = null;

    #[ORM\Column(length: 255)]
    private ?string $alerta = null;

    #[ORM\Column(length: 255)]
    private ?string $estado = null;

    #[ORM\Column]
    private ?int $id_anuncio = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUsuario(): ?int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): static
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getAlerta(): ?string
    {
        return $this->alerta;
    }

    public function setAlerta(string $alerta): static
    {
        $this->alerta = $alerta;

        return $this;
    }

    public function getEstado(): ?string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): static
    {
        $this->estado = $estado;

        return $this;
    }

    public function getIdAnuncio(): ?int
    {
        return $this->id_anuncio;
    }

    public function setIdAnuncio(int $id_anuncio): static
    {
        $this->id_anuncio = $id_anuncio;

        return $this;
    }
}

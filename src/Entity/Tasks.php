<?php

namespace App\Entity;

use App\Repository\TasksRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TasksRepository::class)]
class Tasks
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $dateLimited = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Lists $list = null;

    public function __construct()
    {
        return $this->list ;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDateLimited(): ?string
    {
        return $this->dateLimited;
    }

    public function setDateLimited(string $dateLimited): self
    {
        $this->dateLimited = $dateLimited;

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getList(): ?Lists
    {
        return $this->list;
    }

    public function setList(?Lists $list): self
    {
        $this->list = $list;

        return $this;
    }

}

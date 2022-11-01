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

    #[ORM\ManyToMany(targetEntity: Lists::class, inversedBy: 'tasks')]
    private Collection $list;

    public function __construct()
    {
        $this->list = new ArrayCollection();
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

    /**
     * @return Collection<int, Lists>
     */
    public function getList(): Collection
    {
        return $this->list;
    }

    public function addList(Lists $list): self
    {
        if (!$this->list->contains($list)) {
            $this->list->add($list);
        }

        return $this;
    }

    public function removeList(Lists $list): self
    {
        $this->list->removeElement($list);

        return $this;
    }

    public function __toString()
    {
        return $this->getName();
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\QuizzRepository")
 */
class Quizz
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $q1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $r1;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $q2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $r2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $q3;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $r3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $q4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $r4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $q5;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $r5;



    /**
     * @ORM\Column(type="integer")
     */
    private $id_category;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbr_fail;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbr_success;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;
    private $getR1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indiceq1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indiceq2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indiceq3;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indiceq4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $indiceq5;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIndice($i){
        if($i==1){
            return $this->indiceq1;
        }
        if($i==2){
            return $this->indiceq2;
        }
        if($i==3){
            return $this->indiceq3;
        }
        if($i==4){
            return $this->indiceq4;
        }
        if($i==5){
            return $this->indiceq5;
        }
        return false;
    }

    public function getQuest($i){
        if($i==1){
            return $this->q1;
        }
        if($i==2){
            return $this->q2;
        }
        if($i==3){
            return $this->q3;
        }
        if($i==4){
            return $this->q4;
        }
        if($i==5){
            return $this->q5;
        }
        return false;
    }
    public function getResp($i){
        if($i==1){
            return $this->r1;
        }
        if($i==2){
            return $this->r2;
        }
        if($i==3){
            return $this->r3;
        }
        if($i==4){
            return $this->r4;
        }
        if($i==5){
            return $this->r5;
        }
        return false;
    }

    public function getQ1(): ?string
    {
        return $this->q1;
    }

    public function setQ1(string $q1): self
    {
        $this->q1 = $q1;

        return $this;
    }

    public function getR1(): ?string
    {
        return $this->r1;
    }

    public function setR1(string $r1): self
    {
        $this->r1 = $r1;

        return $this;
    }

    public function getQ2(): ?string
    {
        return $this->q2;
    }

    public function setQ2(string $q2): self
    {
        $this->q2 = $q2;

        return $this;
    }

    public function getR2(): ?string
    {
        return $this->r2;
    }

    public function setR2(string $r2): self
    {
        $this->r2 = $r2;

        return $this;
    }

    public function getQ3(): ?string
    {
        return $this->q3;
    }

    public function setQ3(string $q3): self
    {
        $this->q3 = $q3;

        return $this;
    }

    public function getR3(): ?string
    {
        return $this->r3;
    }

    public function setR3(string $r3): self
    {
        $this->r3 = $r3;

        return $this;
    }

    public function getQ4(): ?string
    {
        return $this->q4;
    }

    public function setQ4(?string $q4): self
    {
        $this->q4 = $q4;

        return $this;
    }

    public function getR4(): ?string
    {
        return $this->r4;
    }

    public function setR4(?string $r4): self
    {
        $this->r4 = $r4;

        return $this;
    }

    public function getQ5(): ?string
    {
        return $this->q5;
    }

    public function setQ5(?string $q5): self
    {
        $this->q5 = $q5;

        return $this;
    }

    public function getR5(): ?string
    {
        return $this->r5;
    }

    public function setR5(?string $r5): self
    {
        $this->r5 = $r5;

        return $this;
    }

    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }

    public function setIdCategory(int $id_category): self
    {
        $this->id_category = $id_category;

        return $this;
    }

    public function getNbrFail(): ?int
    {
        return $this->nbr_fail;
    }

    public function setNbrFail(int $nbr_fail): self
    {
        $this->nbr_fail = $nbr_fail;

        return $this;
    }

    public function getNbrSuccess(): ?int
    {
        return $this->nbr_success;
    }

    public function setNbrSuccess(?int $nbr_success): self
    {
        $this->nbr_success = $nbr_success;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getIndiceq1(): ?string
    {
        return $this->indiceq1;
    }

    public function setIndiceq1(?string $indiceq1): self
    {
        $this->indiceq1 = $indiceq1;

        return $this;
    }

    public function getIndiceq2(): ?string
    {
        return $this->indiceq2;
    }

    public function setIndiceq2(?string $indice2): self
    {
        $this->indice2 = $indice2;

        return $this;
    }

    public function getIndiceq3(): ?string
    {
        return $this->indiceq3;
    }

    public function setIndiceq3(?string $indiceq3): self
    {
        $this->indiceq3 = $indiceq3;

        return $this;
    }

    public function getIndiceq4(): ?string
    {
        return $this->indiceq4;
    }

    public function setIndiceq4(?string $indiceq4): self
    {
        $this->indiceq4 = $indiceq4;

        return $this;
    }

    public function getIndiceq5(): ?string
    {
        return $this->indiceq5;
    }

    public function setIndiceq5(?string $indiceq5): self
    {
        $this->indiceq5 = $indiceq5;

        return $this;
    }
}

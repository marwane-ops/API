<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 *     fields= {"Email"},
 *     message= "L'email indiqué est déja utilisé")
 */
class User implements  UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $NameF;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min = "8", minMessage="minimun 8 caractères")
     * @Assert\EqualTo(propertyPath="Confirm_Password", message = "Votre mot de passe n'est pas identique")
     */
    private $Password;

    public $Confirm_Password;

    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Pays;

    /**
     * @ORM\Column(type="decimal", precision=20, scale=20)
     */
    private $Age;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Zip_Code;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Phone;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->Username;
    }

    public function setUsername(string $Username): self
    {
        $this->Username = $Username;

        return $this;
    }

    public function getNameF(): ?string
    {
        return $this->NameF;
    }

    public function setNameF(string $NameF): self
    {
        $this->NameF = $NameF;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->Password;
    }

    public function setPassword(string $Password): self
    {
        $this->Password = $Password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getRoles()
    {
        return['ROLE_USER'];
    }

    public function getPays(): ?string
    {
        return $this->Pays;
    }

    public function setPays(string $Pays): self
    {
        $this->Pays = $Pays;

        return $this;
    }

    public function getAge()
    {
        return $this->Age;
    }

    public function setAge($Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getZipCode(): ?string
    {
        return $this->Zip_Code;
    }

    public function setZipCode(string $Zip_Code): self
    {
        $this->Zip_Code = $Zip_Code;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->Phone;
    }

    public function setPhone(string $Phone): self
    {
        $this->Phone = $Phone;

        return $this;
    }
}

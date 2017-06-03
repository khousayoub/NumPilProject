<?php

namespace MpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Avion
 *
 * @ORM\Table(name="avion")
 * @ORM\Entity(repositoryClass="MpBundle\Repository\AvionRepository")
 */
class Avion
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="capacity", type="integer")
     */
    private $capacity;

    /**
     *
     * @ORM\OneToMany(targetEntity="Vol", mappedBy="avion")
     */
    private $vols;

    /**
    * Function to string
    */
    public function __toString() {
        return $this->getName();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Avion
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set capacity
     *
     * @param integer $capacity
     *
     * @return Avion
     */
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get capacity
     *
     * @return int
     */
    public function getCapacity()
    {
        return $this->capacity;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add user
     *
     * @param \MpBundle\Entity\User $user
     *
     * @return Avion
     */
    public function addUser(\MpBundle\Entity\User $user)
    {
        $this->users[] = $user;

        return $this;
    }

    /**
     * Remove user
     *
     * @param \MpBundle\Entity\User $user
     */
    public function removeUser(\MpBundle\Entity\User $user)
    {
        $this->users->removeElement($user);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add vol
     *
     * @param \MpBundle\Entity\Vol $vol
     *
     * @return Avion
     */
    public function addVol(\MpBundle\Entity\Vol $vol)
    {
        $this->vols[] = $vol;

        return $this;
    }

    /**
     * Remove vol
     *
     * @param \MpBundle\Entity\Vol $vol
     */
    public function removeVol(\MpBundle\Entity\Vol $vol)
    {
        $this->vols->removeElement($vol);
    }

    /**
     * Get vols
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVols()
    {
        return $this->vols;
    }
}

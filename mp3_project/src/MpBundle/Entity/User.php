<?php
// src/MpBundle/Entity/User.php

namespace MpBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $user_type;

    /**
    * @ORM\ManyToOne(targetEntity="Vol", inversedBy="users")
    * @ORM\JoinColumn(name="vol_id", referencedColumnName="id")
     */
    protected $vol;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set avion
     *
     * @param \MpBundle\Entity\Avion $avion
     *
     * @return User
     */
    public function setAvion(\MpBundle\Entity\Avion $avion = null)
    {
        $this->avion = $avion;

        return $this;
    }

    /**
     * Get avion
     *
     * @return \MpBundle\Entity\Avion
     */
    public function getAvion()
    {
        return $this->avion;
    }

    /**
     * Set userType
     *
     * @param string $userType
     *
     * @return User
     */
    public function setUserType($userType)
    {
        $this->user_type = $userType;

        return $this;
    }

    /**
     * Get userType
     *
     * @return string
     */
    public function getUserType()
    {
        return $this->user_type;
    }

    /**
     * Set vol
     *
     * @param \MpBundle\Entity\Vol $vol
     *
     * @return User
     */
    public function setVol(\MpBundle\Entity\Vol $vol = null)
    {
        $this->vol = $vol;

        return $this;
    }

    /**
     * Get vol
     *
     * @return \MpBundle\Entity\Vol
     */
    public function getVol()
    {
        return $this->vol;
    }
}

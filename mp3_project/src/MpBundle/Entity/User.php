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
}

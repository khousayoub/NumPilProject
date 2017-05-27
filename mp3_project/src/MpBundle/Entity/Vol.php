<?php

namespace MpBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vol
 *
 * @ORM\Table(name="vol")
 * @ORM\Entity(repositoryClass="MpBundle\Repository\VolRepository")
 */
class Vol
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
     * @var int
     *
     * @ORM\Column(name="nb_passenger", type="integer")
     */
    private $nbPassenger;

    /**
     * @var string
     *
     * @ORM\Column(name="departure_city", type="string", length=255)
     */
    private $departureCity;

    /**
     * @var string
     *
     * @ORM\Column(name="arrival_city", type="string", length=255)
     */
    private $arrivalCity;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="arrival_hour", type="datetime")
     */
    private $arrival_hour;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="departure_hour", type="datetime")
     */
    private $departure_hour;

    /**
     *
     * @ORM\OneToMany(targetEntity="User", mappedBy="vol")
     */
    private $users;

    /**
     * @ORM\ManyToOne(targetEntity="Avion", inversedBy="vols")
     * @ORM\JoinColumn(name="avion_id", referencedColumnName="id")
     */
    private $avion;

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
     * Set nbPassenger
     *
     * @param integer $nbPassenger
     *
     * @return Vol
     */
    public function setNbPassenger($nbPassenger)
    {
        $this->nbPassenger = $nbPassenger;

        return $this;
    }

    /**
     * Get nbPassenger
     *
     * @return int
     */
    public function getNbPassenger()
    {
        return $this->nbPassenger;
    }

    /**
     * Set departureCity
     *
     * @param string $departureCity
     *
     * @return Vol
     */
    public function setDepartureCity($departureCity)
    {
        $this->departureCity = $departureCity;

        return $this;
    }

    /**
     * Get departureCity
     *
     * @return string
     */
    public function getDepartureCity()
    {
        return $this->departureCity;
    }

    /**
     * Set arrivalCity
     *
     * @param string $arrivalCity
     *
     * @return Vol
     */
    public function setArrivalCity($arrivalCity)
    {
        $this->arrivalCity = $arrivalCity;

        return $this;
    }

    /**
     * Get arrivalCity
     *
     * @return string
     */
    public function getArrivalCity()
    {
        return $this->arrivalCity;
    }

    /**
     * Set arrivalHour
     *
     * @param \DateTime $arrivalHour
     *
     * @return Vol
     */
    public function setArrivalHour(\DateTime $arrivalHour)
    {
        $this->arrival_hour = $arrivalHour;

        return $this;
    }

    /**
     * Get arrivalHour
     *
     * @return \DateTime
     */
    public function getArrivalHour()
    {
        return $this->arrival_hour;
    }

    /**
     * Set departureHour
     *
     * @param \DateTime $departureHour
     *
     * @return Vol
     */
    public function setDepartureHour(\DateTime $departureHour)
    {
        $this->departure_hour = $departureHour;

        return $this;
    }

    /**
     * Get departureHour
     *
     * @return \DateTime
     */
    public function getDepartureHour()
    {
        return $this->departure_hour;
    }
}

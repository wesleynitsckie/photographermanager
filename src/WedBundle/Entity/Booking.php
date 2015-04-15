<?php

namespace WedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Oh\GoogleMapFormTypeBundle\Validator\Constraints as OhAssert;

/**
 * Booking
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="WedBundle\Entity\BookingRepository")
 */
class Booking
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="bookingDateTime", type="datetime")
     */
    private $bookingDateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="typeId", type="integer")
     */
    private $typeId;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var integer
     *
     * @ORM\Column(name="clientId", type="integer")
     */
    private $clientId;

    /**
     * @var boolean
     *
     * @ORM\Column(name="isComplete", type="boolean")
     */
    private $isComplete;

    /**
     * @var object $personRepo
     * @ORM\ManyToOne(targetEntity="Client", inversedBy="bookings")
     * @ORM\JoinColumn(name="clientId", referencedColumnName="id")
     *
     */
    private $client;

    /**
     * @var object $type
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="typeId", referencedColumnName="id")
     *
     */

    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="lat", type="string", length=255)
     */
    private $lat;

    /**
     * @var string
     *
     * @ORM\Column(name="lng", type="string", length=255)
     */
    private $lng;

    public function setLat($lat){
        $this->lat = $lat;
    }

    public function getLat(){
        return $this->lat;
    }

    public function setLng($lng){
        $this->lng = $lng;
    }

    public function getLng(){
        $this->lng;
    }


    public function setLatLng($latlng)
    {
        $this->setLat($latlng['lat']);
        $this->setLng($latlng['lng']);
        return $this;
    }

    /**
     * @Assert\NotBlank()
     * @OhAssert\LatLng()
     */
    public function getLatLng()
    {
        return array('lat'=>$this->getLat(),'lng'=>$this->getLng());
    }

    public function setClient($client){
        $this->client = $client;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getType(){
        return $this->type;
    }
    /**
     * @return mixed
     */
    public function getClient(){
        return $this->client;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set bookingDateTime
     *
     * @param \DateTime $bookingDateTime
     * @return Booking
     */
    public function setBookingDateTime($bookingDateTime)
    {
        $this->bookingDateTime = $bookingDateTime;

        return $this;
    }

    /**
     * Get bookingDateTime
     *
     * @return \DateTime 
     */
    public function getBookingDateTime()
    {
        return $this->bookingDateTime;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Booking
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
     * Set type
     *
     * @param integer $type
     * @return Booking
     */
    public function setTypeId($type)
    {
        $this->typeId = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Booking
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set clientId
     *
     * @param integer $clientId
     * @return Booking
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return integer 
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Set isComplete
     *
     * @param boolean $isComplete
     * @return Booking
     */
    public function setIsComplete($isComplete)
    {
        $this->isComplete = $isComplete;

        return $this;
    }

    /**
     * Get isComplete
     *
     * @return boolean 
     */
    public function getIsComplete()
    {
        return $this->isComplete;
    }
}

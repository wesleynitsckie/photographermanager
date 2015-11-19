<?php

namespace WedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Portfolio
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class PortfolioImage
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
     * @ORM\ManyToOne(targetEntity="BusinessProfile", inversedBy="portfolioImages")
     * @ORM\JoinColumn(name="businessProfile_id", referencedColumnName="id")
     */
    private $businessProfile;

    /**
     * @var string
     *
     * @ORM\Column(name="filename", type="string", length=255)
     */
    private $filename;


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
     * Set businessProfile
     *
     * @param integer $businessProfile
     * @return Portfolio
     */
    public function setBusinessProfile($businessProfile)
    {
        $this->businessProfile = $businessProfile;

        return $this;
    }

    /**
     * Get businessProfile
     *
     * @return integer 
     */
    public function getBusinessProfile()
    {
        return $this->businessProfile;
    }

    /**
     * Set filename
     *
     * @param string $filename
     * @return Portfolio
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Get filename
     *
     * @return string 
     */
    public function getFilename()
    {
        return $this->filename;
    }
}

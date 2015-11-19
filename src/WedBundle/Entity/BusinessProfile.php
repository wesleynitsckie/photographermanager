<?php

namespace WedBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * BusinessProfile
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class BusinessProfile
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
     *  @ORM\OneToMany(targetEntity="PortfolioImage", mappedBy="businessProfile")
     */
    private $portfolioImages;

    /**
     *  @ORM\OneToMany(targetEntity="Client", mappedBy="businessProfile")
     */
    private $clients;

    /**
     * @ORM\OneToOne(targetEntity="User", inversedBy="businessProfile")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255, nullable=true)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookUrl", type="string", length=255, nullable=true)
     */
    private $facebookUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterId", type="string", length=255, nullable=true)
     */
    private $twitterId;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="about", type="string", length=255, nullable=true)
     */
    private $about;

    /**
     * @var string
     *
     * @ORM\Column(name="packages", type="string", length=255, nullable=true)
     */
    private $packages;

    /**
     * @var string
     *
     * @ORM\Column(name="photos", type="string", length=255, nullable=true)
     */
    private $photos;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    public function __construct() {
        $this->portfolioImages = new ArrayCollection();
        $this->clients = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return BusinessProfile
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
     * Set address
     *
     * @param string $address
     * @return BusinessProfile
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return BusinessProfile
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set facebookUrl
     *
     * @param string $facebookUrl
     * @return BusinessProfile
     */
    public function setFacebookUrl($facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;

        return $this;
    }

    /**
     * Get facebookUrl
     *
     * @return string 
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * Set twitterId
     *
     * @param string $twitterId
     * @return BusinessProfile
     */
    public function setTwitterId($twitterId)
    {
        $this->twitterId = $twitterId;

        return $this;
    }

    /**
     * Get twitterId
     *
     * @return string 
     */
    public function getTwitterId()
    {
        return $this->twitterId;
    }

    /**
     * Set user
     *
     * @param User $user
     * @return BusinessProfile
     */
    public function setUser(User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return BusinessProfile
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set about
     *
     * @param string $about
     * @return BusinessProfile
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string 
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set packages
     *
     * @param string $packages
     * @return BusinessProfile
     */
    public function setPackages($packages)
    {
        $this->packages = $packages;

        return $this;
    }

    /**
     * Get packages
     *
     * @return string 
     */
    public function getPackages()
    {
        return $this->packages;
    }

    /**
     * Set photos
     *
     * @param string $photos
     * @return BusinessProfile
     */
    public function setPhotos($photos)
    {
        $this->photos = $photos;

        return $this;
    }

    /**
     * Get photos
     *
     * @return string 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Set Logo
     * @param $logo
     */
    public function setLogo($logo){
        $this->logo;
    }

    /**
     * Get the logo
     */
    public function getLogo(){
        return $this->logo;
    }

    /**
     * Get the porfolio
     * @return ArrayCollection
     */
    public function getPorfolioImages(){
        return $this->portfolioImages;
    }

    public  function getClients(){
        return $this->clients;
    }

    //======================LOGO UPLOAD SECTION=============================//
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }

    public function getAbsolutePath()
    {
        return null === $this->logo
            ? null
            : $this->getUploadRootDir().'/'.$this->logo;
    }

    public function getWebPath()
    {
        return null === $this->logo
            ? null
            : $this->getUploadDir().'/'.$this->logo;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        $path = __DIR__.'/../../../web/'.$this->getUploadDir();

        return $path;
    }

    protected function getUploadDir()
    {

        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/logos';
    }

    public function upload()
    {
        // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

        // use the original file name here but you should
        // sanitize it at least to avoid any security issues

        // move takes the target directory and then the
        // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getUser()->getId()
            //$this->getFile()->getClientOriginalName()
        );

        // set the path property to the filename where you've saved the file
        $this->logo = $this->getFile()->getClientOriginalName();

        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}

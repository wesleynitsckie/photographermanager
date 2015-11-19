<?php

namespace WedBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

use JMS\Serializer\Annotation\ExclusionPolicy;
use JMS\Serializer\Annotation\Expose;
/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ExclusionPolicy("all")
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
     *  @ORM\OneToOne(targetEntity="BusinessProfile", mappedBy="user")
     */
    private $businessProfile;

    /**
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    protected $facebook_id;

    /**
     * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
     */
    protected $facebook_access_token;

    /**
     * @ORM\Column(name="google_id", type="string", length=255, nullable=true)
     */
    protected $google_id;

    /**
     * @ORM\Column(name="google_access_token", type="string", length=255, nullable=true)
     */
    protected $google_access_token;

    /**
     * @ORM\Column(name="name", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $name;

    /**
     * @ORM\Column(name="profile_picture", type="string", length=255, nullable=true)
     */
    protected $profilePicture;

    /**
     * @ORM\Column(name="business_name", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $businessName;

    /**
     * @ORM\Column(name="business_url", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $businessUrl;

    /**
     * @ORM\Column(name="business_email", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $businessEmail;

    /**
     * @ORM\Column(name="contact_number", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $contactNumber;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    /**
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     * @Expose
     */
    protected $logo;

    /**
     * Set the user's business profile
     * @param BusinessProfile $businessProfile
     */
    public function setBusinessProfile(BusinessProfile $businessProfile){
        $this->businessProfile = $businessProfile;
    }

    /**
     * Get the Business Profile
     * @return mixed
     */
    public function getBusinessProfile(){
        return $this->businessProfile;
    }
    /**
     * Set email
     * @param $email
     */
    public function setBusinessEmail($email){
        $this->businessEmail = $email;
    }

    /**
     * Get the email
     * @return mixed
     */
    public function getBusinessEmail(){
        return $this->businessEmail;
    }

    /**
     * Get the logo
     * @return mixed
     */
    public function getLogo(){
        return $this->logo;
    }

    /**
     * Set the FacBook Id
     * @param $facebookId
     */
    public function setFacebookId($facebookId){
        $this->facebook_id = $facebookId;
    }

    /**
     * Set the FaceBook Access Token
     * @param $accessToken
     */
    public function setFacebookAccessToken($accessToken){
        $this->facebook_access_token = $accessToken;
    }

    /**
     * Get te user's name
     * @return mixed
     */
    public function getName(){
        return $this->name;
    }

    /**
     * Set the user's name
     * @param $name
     */
    public function setName($name){
        $this->name = $name;
    }

    /**
     * Get the profile pic
     * @return mixed
     */
    public function getProfilePicture(){
        return $this->profilePicture;
    }

    /**
     * Set the profile picwesleynitscki
     * @param $pp
     */
    public function setProfilePicture($pp){
        $this->profilePicture = $pp;
    }

    /**
     * Set the business Name
     * @param $businessName
     */
    public function setBusinessName($businessName){
        $this->businessName = $businessName;
    }

    /**
     *
     * Get the business name
     * @return mixed
     */
    public function getBusinessName(){
        return $this->businessName;
    }

    /**
     * Set the business Url
     * @param $businessUrl
     */
    public function setBusinessUrl($businessUrl){
        $this->businessUrl = $businessUrl;
    }

    /**
     *
     * Get the business url
     * @return mixed
     */
    public function getBusinessUrl(){
        return $this->businessUrl;
    }



    /**
     * Set the contact number
     *
     */
    public function setContactNumber($contactNumber){
        $this->contactNumber = $contactNumber;
    }

    /**
     * Get the contact number
     * @return mixed
     */
    public function getContactNumber(){
        return $this->contactNumber;
    }
}
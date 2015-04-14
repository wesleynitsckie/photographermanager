<?php

namespace WedBundle\Entity;

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
     */
    protected $name;

    /**
     * @ORM\Column(name="profile_picture", type="string", length=255, nullable=true)
     */
    protected $profilePicture;

    public function setFacebookId($facebookId){
        $this->facebook_id = $facebookId;
    }

    public function setFacebookAccessToken($accessToken){
        $this->facebook_access_token = $accessToken;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getProfilePicture(){
        return $this->profilePicture;
    }

    public function setProfilePicture($pp){
        $this->profilePicture = $pp;
    }
}
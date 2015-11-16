<?php

namespace WedBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;
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

    /**
     * @ORM\Column(name="business_name", type="string", length=255, nullable=true)
     */
    protected $businessName;

    /**
     * @ORM\Column(name="business_url", type="string", length=255, nullable=true)
     */
    protected $businessUrl;

    /**
     * @ORM\Column(name="business_email", type="string", length=255, nullable=true)
     */
    protected $businessEmail;

    /**
     * @ORM\Column(name="contact_number", type="string", length=255, nullable=true)
     */
    protected $contactNumber;

    /**
     * @Assert\File(maxSize="6000000")
     */
    private $file;

    public function setBusinessEmail($email){
        $this->businessEmail;
    }

    public function getBusinessEmail(){
        return $this->businessEmail;
    }

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

    /**
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    protected $logo;

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
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/documents';
    }

    public function uploadAction()
    {
        // ...

        $form = $this->createFormBuilder($document)
            ->add('name')
            ->add('file')
            ->getForm();

        // ...
    }

    public function getLogo(){
        return $this->logo;
    }

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
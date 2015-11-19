<?php

namespace WedBundle\EventListener;

use Oneup\UploaderBundle\Event\PostPersistEvent;
use WedBundle\Entity\PortfolioImage;
use \Symfony\Component\DependencyInjection\ContainerAware;
use Doctrine\ORM\EntityManager;

class PortfolioUploadListener extends  ContainerAware
{
    protected $manager;

    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    public function onUpload(PostPersistEvent $event)
    {
        //var_dump($event->getFile()); die;
        $file = $event->getFile();
        $user = $this->container->get('security.context')->getToken()->getUser();

        $object = new PortfolioImage();
        $object->setFilename($file->getFileName());
        $object->setBusinessProfile($user->getBusinessProfile());

        $this->manager->persist($object);
        $this->manager->flush();
    }
}
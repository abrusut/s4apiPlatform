<?php


namespace App\EventSubscriber;


use ApiPlatform\Core\EventListener\EventPriorities;
use App\Entity\User;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class PasswordHashSubscriber implements EventSubscriberInterface
{
    /**
     * @var UserPasswordEncoderInterface
     */
    private $passwordEncoder;

    /**
     * PasswordHashSubscriber constructor.
     */
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }

    public static function getSubscribedEvents()
    {
       return [
           KernelEvents::VIEW => ['hashPassword', EventPriorities::PRE_WRITE]
       ];
    }

    public function hashPassword(GetResponseForControllerResultEvent $event){
        $user = $event->getControllerResult();
        $method = $event->getRequest()->getMethod();

        if(!$user instanceof User || !in_array($method,[Request::METHOD_POST])){
            return;
        }

        // Es un usuario y vino por POST, se hace hash de la password
        $user->setPassword(
            $this->passwordEncoder->encodePassword($user, $user->getPassword())
        );



    }


}

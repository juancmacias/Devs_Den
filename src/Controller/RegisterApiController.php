<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;

use App\Entity\User;
use App\Repository\UserRepository;

class RegisterApiController extends AbstractController
{
 
    /**
     * @Route("/registration", name="app_registration", methods={"GET"})
     */
    public function registration(MailerInterface $mailer, Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $em): Response
    {
        $user = new User();
        $response = new Response();
     
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        if($request->query->get('mail')) {
            $emailnew = $request->query->get('mail');
            $passwordnew = $request->query->get('password');
            $user->setEmail($emailnew);
            $user->setRoles([$request->query->get('rol')]);

            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $passwordnew
                )
            );

            $em->persist($user);
            $em->flush();

            $response->setContent(json_encode([
                'registro' => "valido ",

            ]));
            $response->headers->set('pass', 'ok');
        }else{
            $response->headers->set('pass', 'not');
        }
        return $response; 
    }
    /**
     * @Route("/loginapi", name="app_login_api", methods={"GET"})
     */
    public function login(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $em, UserRepository $UserRepo): Response
    {
        $user = new User();
        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        if($request->query->get('username')) {
            // encode the plain password
            $emailnew = $request->query->get('username');
            $passwordnew = $request->query->get('password');

            $pass = 
                $userPasswordHasher->hashPassword(
                    $user,
                    $passwordnew
                );
   
                $UserRepo -> findByLoginField($pass, $emailnew);
                
            
            $response->setContent(json_encode([
                'registro' => "valido ",
                'datos' => $UserRepo
                

            ]));
            
            $response->headers->set('pass', 'ok');
        }else{
            dump("No pasa");die;
            $response->headers->set('pass', 'not');
        }

        return $response; 
    }

}

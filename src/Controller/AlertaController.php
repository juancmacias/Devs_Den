<?php

namespace App\Controller;

use App\Entity\Alerta;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class AlertaController extends AbstractController
{

    #[Route('/alerta/{id}', name: 'app_alerta', methods:'GET')]
    public function alerta(SerializerInterface $serializer, int $id): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        // recuperar solo el primer registro
        $Ofertas = $entityManager->getRepository(Alerta::class)->findByallField($id);
        //dump("Listado  para los");die;
        // recuperar todos los registros
        //$DatosPersonales = $entityManager->getRepository(DatosPersonales::class)->findAll();

        $json = $serializer->serialize($Ofertas, 'json');
        return new Response($json, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
    #[Route('/alerta/new/{id}', name: 'app_alerta_new', methods:'GET')]
    public function new(Request $request, SerializerInterface $serializer, UserRepository $userRepository, EntityManagerInterface $em, int $id): Response
    {
        if($request->query->get('bearer')) {
            $token = $request->query->get('bearer');
        }else {
            return $this->redirectToRoute('app_login');
        }
        $tokenParts = explode(".", $token);  
        $tokenHeader = base64_decode($tokenParts[0]);
        $tokenPayload = base64_decode($tokenParts[1]);
        $jwtHeader = json_decode($tokenHeader);
        $jwtPayload = json_decode($tokenPayload);

        if(isset($jwtPayload->username)){
            $user = $userRepository->findOneByEmail($jwtPayload->username);
            //dump($user);die;
            //$userRepository->remove($user);
            //dump($user->getRoles()[0]);die;
            if($user->getRoles()[0] === 'USUARIO'){
                // todo bien
                //dump($user->getRoles()[0]);die;
                $r = $this->getDoctrine()->getManager();

                

                $alerta = new Alerta();
                
                $alerta->setIdUsuario($id);
                $alerta->setAlerta($request->query->get('alerta'));
                $alerta->setEstado('0');

                //dump($user->getRoles()[0]);die;
                $json = $serializer->serialize(["estado:insertado"], 'json');
                $em->persist($alerta);
                $em->flush();
            }else{
                // todo mal
                $json = $serializer->serialize(['error:error'], 'json');
            }
        }else{
            //dump("Error en la carga de username");die;
            $json = $serializer->serialize(['error:error'], 'json');
        }
        return new Response($json, Response::HTTP_OK, ['Content-Type' => 'application/json']);
    }
}

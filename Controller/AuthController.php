<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class AuthController extends AbstractController
{
    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $em = $this->getDoctrine()->getManager();
        
        $username = $request->request->get('_username');
        $password = $request->request->get('_password');
        var_dump($username,$password, $request);
        $user = new User($username);
        $user->setPassword($encoder->encodePassword($user, $password));
        $em->persist($user);
        $em->flush();
        return new Response(sprintf('User %s successfully created', $user->getUsername()));
    }
    public function api()
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }

    /** 
     * @Route("api/login", name="login")
     */

    public function login(Request $request, UserPasswordEncoderInterface $encoder,JWTTokenManagerInterface $JWTManager)

    {
        $em = $this->getDoctrine()->getManager();
        $req = json_decode($request->getContent(),true);

        $matchUser = $em->getRepository('App:User')
        ->findBy(array('username' => $req['username']))[0];

        if(!$matchUser) { 
            // user not found
        }
        else {
            $encodedPassword = $matchUser->getPassword();
            $passwordIsValid = $encoder->isPasswordValid($matchUser,$req['password']);

            if (!$passwordIsValid) {
                // wrong password and existing username 
            }
            else {
                return new JsonResponse(['token' => $JWTManager->create($matchUser)]);
            }
        }
    }
}
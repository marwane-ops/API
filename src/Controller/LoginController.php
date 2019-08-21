<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Bundle\MonologBundle\SwiftMailer;

class LoginController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */

    public function index(){
        return $this->render("login/index.html.twig");
    }
    /**
     * @Route("/registration", name="inscription")
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $encoder ){
            $user = new User();

            $form = $this->createForm(RegistrationType::class, $user);

            $form-> handleRequest($request);
            if($form->isSubmitted() && $form->isValid()) {
                $hash = $encoder->encodePassword($user, $user->getPassword());

                $user->setPassword($hash);

                $manager->persist($user);
                $manager->flush();
                return $this->redirectToRoute('security_login');
            }
            return $this->render('login/registration.html.twig', [
                'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/emails", name="confirm_email
     */

    public function EmailValidation( Request $request, \Swift_Mailer $mailer, TokenGeneratorInterface $tokenGenerator)
    {
        if ($request->isMethod('POST')) {

            $token = $tokenGenerator->generateToken();


            $url = $this->generateUrl('reset_password', ['token' => $token], UrlGeneratorInterface::ABSOLUTE_URL);

            $message = (new \Swift_Message('Forgot Password'))
                ->setFrom('no-reply.learnin_way@gmail.com')
                ->setTo($user->getEmail())
                ->setBody(
                    "Click on the following link to reset your password: " . $url,
                    'text/html'
                );

            $mailer->send($message);

            $this->addFlash('notice', 'Mail send');

            return $this->redirectToRoute('login');
        }
    }

    /**
     * @Route("/connexion", name="security_login")
     */
    public function login(){
        return $this->render('login/login.html.twig');
    }

    /**
     * @Route("/deconnexion", name="security_logout")
     */

    public function logout() {

    }

}

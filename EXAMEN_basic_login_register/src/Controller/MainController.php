<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class MainController extends AbstractController
{
    #[Route('/main', name: 'app_main')]
    public function index(): RedirectResponse
    {
        return $this->redirectToRoute('app_ticket_index');
    }
    
    #[IsGranted('ROLE_ADMIN')]
    #[Route('/protected', name: 'app_protected')]
    public function protected(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}

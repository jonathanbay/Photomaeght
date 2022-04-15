<?php

namespace App\Controller;

use App\Entity\MariagePhoto;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioMariageController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    #[Route('/portfolio/mariage', name: 'app_portfolio_mariage')]
    public function index(): Response
    {
        $mariage = $this->entityManager->getRepository(MariagePhoto::class)->findAll();
        
        return $this->render('portfolio_mariage/index.html.twig', [

            'photosMariage' => $mariage,
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Informations;
use App\Entity\FamillePhotos;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PortfolioFamilleController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    #[Route('/portfolio/famille', name: 'app_portfolio_famille')]
    public function index(): Response
    {
        $famille = $this->entityManager->getRepository(FamillePhotos::class)->findAll();
        $informations = $this->entityManager->getRepository(Informations::class)->findAll();

        return $this->render('portfolio_famille/index.html.twig', [
            'photosFamille' => $famille,
            'information' => $informations,
        ]);
    }
}

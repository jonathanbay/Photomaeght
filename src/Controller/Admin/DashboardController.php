<?php

namespace App\Controller\Admin;

use App\Entity\AccueilAnimal;
use App\Entity\AccueilEnfant;
use App\Entity\AccueilEvenement;
use App\Entity\AccueilFamille;
use App\Entity\AccueilMariage;
use App\Entity\AnimauxPhotos;
use App\Entity\Carrousel;
use App\Entity\EnfantPhotos;
use App\Entity\FamillePhotos;
use App\Entity\Informations;
use App\Entity\MariagePhoto;
use App\Entity\PortfolioEvenement;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Photomaeght');
    }

    public function configureMenuItems(): iterable
    {
        // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Carrousel', 'fas fa-desktop', Carrousel::class);
        yield MenuItem::linkToCrud('Photo accueil Mariage', 'fas fa-portrait', AccueilMariage::class);
        yield MenuItem::linkToCrud('Photo accueil Famille', 'fas fa-portrait', AccueilFamille::class);
        yield MenuItem::linkToCrud('Photo accueil Evenement', 'fas fa-portrait', AccueilEvenement::class);
        yield MenuItem::linkToCrud('Photo accueil Enfant', 'fas fa-portrait', AccueilEnfant::class);
        yield MenuItem::linkToCrud('Photo accueil Animal', 'fas fa-portrait', AccueilAnimal::class);
        yield MenuItem::linkToCrud('Portfolio Mariages', 'fas fa-ring', MariagePhoto::class);
        yield MenuItem::linkToCrud('Portfolio Familles', 'fas fa-users', FamillePhotos::class);
        yield MenuItem::linkToCrud('Portfolio Enfants', 'fas fa-baby', EnfantPhotos::class);
        yield MenuItem::linkToCrud('Portfolio Evénements', 'fas fa-trophy', PortfolioEvenement::class);
        yield MenuItem::linkToCrud('Portfolio Animaux', 'fas fa-cat', AnimauxPhotos::class);
        yield MenuItem::linkToCrud('Informations', 'fas fa-info', Informations::class);
    }
}

<?php

namespace App\Controller\Admin;

use App\Entity\AccueilEnfant;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AccueilEnfantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AccueilEnfant::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('photo')
            ->setBasePath('uploads')
            ->setUploadDir('public/uploads')
            ->setUploadedFileNamePattern('[randomhash].[extension]')
            ->setRequired(false),
            BooleanField::new('valide'),
        ];
    }
    
}

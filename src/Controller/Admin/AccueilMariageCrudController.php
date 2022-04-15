<?php

namespace App\Controller\Admin;

use App\Entity\AccueilMariage;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class AccueilMariageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AccueilMariage::class;
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

<?php

namespace App\Controller\Admin;

use App\Entity\Owners;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class OwnersCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Owners::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

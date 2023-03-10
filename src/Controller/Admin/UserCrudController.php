<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    public function configureFields(string $pageName): iterable
    {
        yield IdField::new('id')
            ->onlyOnIndex();
        // calls the methods getFullName in the user entity even if we don't have this attribute from User, using the PropertyAccess Component from Symfony
        yield TextField::new('fullName')
            ->hideOnForm();
        yield TextField::new('firstName')
        ->onlyOnForms();
        yield TextField::new('lastName')
        ->onlyOnForms();
        yield EmailField::new('email');
        yield BooleanField::new('enabled')
            ->renderAsSwitch(false);
        yield DateField::new('createdAt')
        ->hideOnForm();
    }

}

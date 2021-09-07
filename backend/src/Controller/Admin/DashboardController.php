<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Author;
use App\Entity\Category;
use App\Entity\Adders;
use App\Entity\Book;
use App\Entity\Ebook;
use App\Entity\Feature;
use App\Entity\Invoice;
use App\Entity\Order;
use App\Entity\Owners;
use App\Entity\Plan;
use App\Entity\Subscription;
use App\Entity\User;



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
            ->setTitle('Backend');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Adders', 'fas fa-list', Adders::class);
        yield MenuItem::linkToCrud('Author', 'fas fa-list', Author::class);
        yield MenuItem::linkToCrud('Book', 'fas fa-list', Book::class);
        yield MenuItem::linkToCrud('Category', 'fas fa-list', Category::class);
        yield MenuItem::linkToCrud('Ebook', 'fas fa-list', Ebook::class);
        yield MenuItem::linkToCrud('Feature', 'fas fa-list', Feature::class);
        yield MenuItem::linkToCrud('Invoice', 'fas fa-list', Invoice::class);
        yield MenuItem::linkToCrud('Order', 'fas fa-list', Order::class);
        yield MenuItem::linkToCrud('Owners', 'fas fa-list', Owners::class);
        yield MenuItem::linkToCrud('Plan', 'fas fa-list', Plan::class);
        yield MenuItem::linkToCrud('Subscreption', 'fas fa-list', Subscription::class);
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);

    }
}

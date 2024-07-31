<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => '/',
            'route' => '/home',
            'page_title' => 'Home Page',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'manage-profile',
            'route' => '/manage-profile',
            'page_title' => 'Manage Profile',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'about',
            'route' => '/about',
            'page_title' => 'About',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'search-result',
            'route' => '/search-result',
            'page_title' => 'Search Result',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'desert-safari',
            'route' => '/desert-safari',
            'page_title' => 'Desert Safari',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'privacy-policy',
            'route' => '/privacy-policy',
            'page_title' => 'Privacy Policy',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'contact-us',
            'route' => '/contact-us',
            'page_title' => 'Contact Us',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'blogs',
            'route' => '/blogs',
            'page_title' => 'Blogs',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'where-to-find-us',
            'route' => '/where-to-find-us',
            'page_title' => 'Find Us',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'whish-list',
            'route' => '/whish-list',
            'page_title' => 'Whish List',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'cart',
            'route' => '/cart',
            'page_title' => 'Cart',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'history',
            'route' => '/history',
            'page_title' => 'History',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'terms-&-conditions',
            'route' => '/terms-&-conditions',
            'page_title' => 'Terms And Conditions',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'feedback',
            'route' => '/feedback',
            'page_title' => 'Feedback',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'guideline',
            'route' => '/guideline',
            'page_title' => 'Guideline',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'help',
            'route' => '/help',
            'page_title' => 'Help',
            'status' => false,
        ]);
        Menu::create([
            'name' => 'all-booking',
            'route' => '/all-booking',
            'page_title' => 'All Booking',
            'status' => false,
        ]);

    }
}

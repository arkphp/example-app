<?php
namespace App\Http;
class Home extends Base {
    public function indexAction() {
        $this->render('home/index.php');
    }

    public function aboutAction() {
        $this->render('home/about.php');
    }

    public function contactAction() {
        $this->render('home/contact.php');
    }

    public function configAction() {
        $this->render('home/config.php', [
            'config' => config('site')
        ]);
    }
}
<?php
class Home extends Base {
    public function indexAction() {
        $this->render('home/index.php');
    }
}
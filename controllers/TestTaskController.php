<?php

namespace app\controllers;

class TestTaskController extends SiteController
{
    public function actionIndex(): string {
        $text = 'This is Test text';
        return $this->render('index', ['text' => $text]);
    }

}
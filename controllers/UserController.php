<?php

namespace app\controllers;

use app\models\User;
use ErrorException;
use yii\web\NotFoundHttpException;

class UserController extends SiteController
{
    //использовал try-catch для примера. Но если на фронте используется промис (axios, например),
    //то такая конструкция является излишней.
    // также Exception тоже для примера. Так то нужно по каждому случаю смотреть отдельно
    /**
     * @throws \yii\base\InvalidConfigException
     * @throws NotFoundHttpException
     */
    public function actionIndex()
    {
        try {
            $users = User::find()
                ->asArray()
                ->all();

            return \Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'users' => $users,
                    'code' => 200,
                ],
            ]);
        } catch (ErrorException $e) {
            throw new NotFoundHttpException();
        }


    }

    public function actionShow(int $id)
    {
        try {
            $user = User::findOne($id);

            return \Yii::createObject([
                'class' => 'yii\web\Response',
                'format' => \yii\web\Response::FORMAT_JSON,
                'data' => [
                    'user' => $user,
                    'code' => 200,
                ],
            ]);
        } catch (ErrorException $e) {
            throw new NotFoundHttpException();
        }
    }

    /**
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        try {
             return User::findOne($id)->delete();
        } catch (ErrorException $e) {
            throw new NotFoundHttpException();
        }
    }

}
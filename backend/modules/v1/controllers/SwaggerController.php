<?php

namespace backend\modules\v1\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * @SWG\Swagger(
 *     basePath="/v1/",
 *     produces={"application/json"},
 *     consumes={"application/x-www-form-urlencoded"},
 *     @SWG\Info(version="0.1", title="dance API"),
 * )
 */
class SwaggerController extends Controller
{
    public function beforeAction($action)
    {
        Yii::$app->cache->flush();
        // dump(Yii::$app->user);
        // if (!Yii::$app->user->can('api/doc')){
        //     Yii::$app->response->statusCode = 403;
        //     Yii::$app->response->send();
        //     exit();
        // }
        return parent::beforeAction($action);
    }

    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii2mod\swagger\SwaggerUIRenderer',
                'restUrl' => Url::to(['/v1/swagger/json-schema']),
            ],
            'json-schema' => [
                'class' => 'yii2mod\swagger\OpenAPIRenderer',
                'scanDir' => [
                    Yii::getAlias('@app/models'),
                    Yii::getAlias('@app/modules/v1/controllers'),
                    Yii::getAlias('@app/modules/v1/models'),
                ],
            ],
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}

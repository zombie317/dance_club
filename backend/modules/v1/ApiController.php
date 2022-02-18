<?php

namespace backend\modules\v1;

use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpHeaderAuth;
use yii\filters\auth\QueryParamAuth;

class ApiController extends Controller
{
    public function init()
    {
        parent::init();
        $this->enableCsrfValidation = false;
        Yii::$app->user->enableSession = false;
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        Yii::$app->request->parsers = ['application/json' => 'yii\web\JsonParser',];
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        // remove authentication filter
        $auth = $behaviors['authenticator'];
        unset($behaviors['authenticator']);

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::class,
            'cors' => [
                'Origin' => ['http://localhost:3000', 'http://localhost:3001'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                'Access-Control-Request-Headers' => ['*'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age' => 3600,
            ],
        ];

        // re-add authentication filter
        $behaviors['authenticator'] = ArrayHelper::merge([
            'class' => QueryParamAuth::className(),
            'except' => ['options', 'index', 'example', 'by-polygon', 'login'],
            'authMethods' => [
                [
                    'class' => HttpHeaderAuth::className(),
                    'header' => 'access-token'
                ],
            ],
        ], $auth);

        return $behaviors;
    }
}

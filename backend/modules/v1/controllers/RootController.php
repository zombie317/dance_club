<?php

namespace backend\modules\v1\controllers;

use backend\modules\v1\ApiController;

class RootController extends ApiController
{
    /**
     *
     * @SWG\Get(path="/root",
     *     tags={"_"},
     *     summary="Получение информации об API.",
     *     produces={"application/json"},
     *     consumes={"application/json"},
     *     @SWG\Response(
     *         response = 200,
     *         description = "Информация об API",
     *     ),
     * )
     */
    public function actionIndex()
    {
        return [
            'name' => 'dance API',
            'version' => 0.1
        ];
    }
}

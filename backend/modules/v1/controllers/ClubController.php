<?php


namespace backend\modules\v1\controllers;


use backend\modules\v1\ApiController;
use common\models\Club;
use common\models\CurrentMusic;
use common\models\MusicTypeDanceType;
use yii\web\NotFoundHttpException;

class ClubController extends ApiController
{

    /**
     *
     * @SWG\Get(path="/club/",
     *     tags={"Club"},
     *     summary="Get all people in a club.",
     *     produces={"application/json"},
     *     consumes={"application/json"},
     *     @SWG\Response(
     *         response = 200,
     *         description = "Успех",
     *     ),
     * )
     */
    public function actionIndex()
    {
        $currentMusic = CurrentMusic::find()->orderBy(['id' => SORT_DESC])->one();
        if (!$currentMusic)
            throw new NotFoundHttpException('club closed');

        $danceTypes  = $currentMusic->getDanceTypes();
        $clubPeoples = Club::find()->all();
        $result      = [];

        foreach ($clubPeoples as $clubPeople) {
            $people      = $clubPeople->people;
            $danceSkills = $people->getPeopleDanceSkills()->where(['dance_type_id' => $danceTypes])->one();
            $danceType   = $danceSkills->danceType ?? null;

            $result[] = [
                'id'     => $people->id,
                'name'   => $people->name,
                'gender' => $people->gender ? 'male' : 'female',
                'state'  => [
                    'room'      => $danceSkills ? 'dance' : 'bar',
                    'action'    => $danceType ? $danceType->name : 'stand',
                    'movements' => $danceType ? $danceType->movements : 'drinking russian vodka!!',
                ],
            ];
        }

        return [
            'music'   => $currentMusic->musicType->name,
            'peoples' => $result,
        ];
    }
}
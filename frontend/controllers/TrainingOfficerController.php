<?php

namespace frontend\controllers;

use frontend\models\TrainingOfficer;
use frontend\models\TrainingOfficerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TrainingOfficerController implements the CRUD actions for TrainingOfficer model.
 */
class TrainingOfficerController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TrainingOfficer models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TrainingOfficerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TrainingOfficer model.
     * @param int $to_id To ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($to_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($to_id),
        ]);
    }

    /**
     * Creates a new TrainingOfficer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TrainingOfficer();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'to_id' => $model->to_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TrainingOfficer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $to_id To ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($to_id)
    {
        $model = $this->findModel($to_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'to_id' => $model->to_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TrainingOfficer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $to_id To ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($to_id)
    {
        $this->findModel($to_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TrainingOfficer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $to_id To ID
     * @return TrainingOfficer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($to_id)
    {
        if (($model = TrainingOfficer::findOne(['to_id' => $to_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

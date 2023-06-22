<?php

namespace frontend\controllers;

use frontend\models\RegistrarOfficer;
use frontend\models\RegistrarOfficerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistrarOfficerController implements the CRUD actions for RegistrarOfficer model.
 */
class RegistrarOfficerController extends Controller
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
     * Lists all RegistrarOfficer models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new RegistrarOfficerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RegistrarOfficer model.
     * @param int $ro_id Ro ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($ro_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($ro_id),
        ]);
    }

    /**
     * Creates a new RegistrarOfficer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RegistrarOfficer();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'ro_id' => $model->ro_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RegistrarOfficer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $ro_id Ro ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($ro_id)
    {
        $model = $this->findModel($ro_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'ro_id' => $model->ro_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RegistrarOfficer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $ro_id Ro ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($ro_id)
    {
        $this->findModel($ro_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RegistrarOfficer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $ro_id Ro ID
     * @return RegistrarOfficer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ro_id)
    {
        if (($model = RegistrarOfficer::findOne(['ro_id' => $ro_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

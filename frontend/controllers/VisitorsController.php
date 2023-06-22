<?php

namespace frontend\controllers;

use frontend\models\Visitors;
use frontend\models\VisitorsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VisitorsController implements the CRUD actions for Visitors model.
 */
class VisitorsController extends Controller
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
     * Lists all Visitors models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new VisitorsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Visitors model.
     * @param int $visitor_id Visitor ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($visitor_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($visitor_id),
        ]);
    }

    /**
     * Creates a new Visitors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Visitors();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'visitor_id' => $model->visitor_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Visitors model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $visitor_id Visitor ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($visitor_id)
    {
        $model = $this->findModel($visitor_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'visitor_id' => $model->visitor_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Visitors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $visitor_id Visitor ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($visitor_id)
    {
        $this->findModel($visitor_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Visitors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $visitor_id Visitor ID
     * @return Visitors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($visitor_id)
    {
        if (($model = Visitors::findOne(['visitor_id' => $visitor_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

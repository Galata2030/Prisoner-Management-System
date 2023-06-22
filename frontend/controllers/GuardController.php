<?php

namespace frontend\controllers;

use frontend\models\Guard;
use frontend\models\GuardSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GuardController implements the CRUD actions for Guard model.
 */
class GuardController extends Controller
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
     * Lists all Guard models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GuardSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Guard model.
     * @param int $guard_id Guard ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($guard_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($guard_id),
        ]);
    }

    /**
     * Creates a new Guard model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Guard();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'guard_id' => $model->guard_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Guard model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $guard_id Guard ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($guard_id)
    {
        $model = $this->findModel($guard_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'guard_id' => $model->guard_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Guard model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $guard_id Guard ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($guard_id)
    {
        $this->findModel($guard_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Guard model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $guard_id Guard ID
     * @return Guard the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($guard_id)
    {
        if (($model = Guard::findOne(['guard_id' => $guard_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

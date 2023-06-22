<?php

namespace frontend\controllers;

use frontend\models\SecurityManager;
use frontend\models\SecurityManagerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SecurityManagerController implements the CRUD actions for SecurityManager model.
 */
class SecurityManagerController extends Controller
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
     * Lists all SecurityManager models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SecurityManagerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SecurityManager model.
     * @param int $sm_id Sm ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($sm_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($sm_id),
        ]);
    }

    /**
     * Creates a new SecurityManager model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SecurityManager();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'sm_id' => $model->sm_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SecurityManager model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $sm_id Sm ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($sm_id)
    {
        $model = $this->findModel($sm_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'sm_id' => $model->sm_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SecurityManager model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $sm_id Sm ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($sm_id)
    {
        $this->findModel($sm_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SecurityManager model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $sm_id Sm ID
     * @return SecurityManager the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($sm_id)
    {
        if (($model = SecurityManager::findOne(['sm_id' => $sm_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

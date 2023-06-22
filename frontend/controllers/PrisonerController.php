<?php

namespace frontend\controllers;

use frontend\models\Prisoner;
use frontend\models\PrisonerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PrisonerController implements the CRUD actions for Prisoner model.
 */
class PrisonerController extends Controller
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
     * Lists all Prisoner models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PrisonerSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionReleased($prisoner_id)
    {
        $model = Prisoner::find()->where(['prisoner_id' => $prisoner_id])->one();
        $model->status = 0;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'The prisone release is done successfully!');
            return $this->redirect(['prisoner/index']);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Release action failed');
            return $this->redirect(['prisoner/index', 'prisoner_id' => $prisoner_id]);
        }
    }
    public function actionJailed($prisoner_id)
    {
        $model = Prisoner::find()->where(['prisoner_id' => $prisoner_id])->one();
        $model->status = 1;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'The Prisoner jail is done successfully!');
            return $this->redirect(['prisoner/index', 'prisoner_id' => $prisoner_id]);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Jail failed');
            return $this->redirect(['prisoner/index', 'prisoner_id' => $prisoner_id]);
        }
    }
    public function actionTransferred($prisoner_id)
    {
        $model = Prisoner::find()->where(['prisoner_id' => $prisoner_id])->one();
        $model->status = 2;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'The Prisoner transfer is done successfully!');
            return $this->redirect(['prisoner/index', 'prisoner_id' => $prisoner_id]);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Transfer failed');
            return $this->redirect(['prisoner/index', 'prisoner_id' => $prisoner_id]);
        }
    }
    /**
     * Displays a single Prisoner model.
     * @param int $prisoner_id Prisoner ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($prisoner_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($prisoner_id),
        ]);
    }
    public function actionReport()
    {
        $model = new Prisoner();
        return $this->render('report', [
            'model' => $model,
        ]);
    }
    /**
     * Creates a new Prisoner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Prisoner();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'prisoner_id' => $model->prisoner_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Prisoner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $prisoner_id Prisoner ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($prisoner_id)
    {
        $model = $this->findModel($prisoner_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'prisoner_id' => $model->prisoner_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Prisoner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $prisoner_id Prisoner ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($prisoner_id)
    {
        $this->findModel($prisoner_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prisoner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $prisoner_id Prisoner ID
     * @return Prisoner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($prisoner_id)
    {
        if (($model = Prisoner::findOne(['prisoner_id' => $prisoner_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

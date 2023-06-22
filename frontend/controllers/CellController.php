<?php

namespace frontend\controllers;

use frontend\models\Cell;
use frontend\models\CellSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CellController implements the CRUD actions for Cell model.
 */
class CellController extends Controller
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
     * Lists all Cell models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CellSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Cell model.
     * @param int $block_id Block ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($block_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($block_id),
        ]);
    }

    /**
     * Creates a new Cell model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Cell();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'block_id' => $model->block_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Cell model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $block_id Block ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($block_id)
    {
        $model = $this->findModel($block_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'block_id' => $model->block_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Cell model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $block_id Block ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($block_id)
    {
        $this->findModel($block_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Cell model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $block_id Block ID
     * @return Cell the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($block_id)
    {
        if (($model = Cell::findOne(['block_id' => $block_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

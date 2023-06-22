<?php

namespace frontend\controllers;

use common\models\User;
use frontend\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
                'access' => [
                    'class' => \yii\filters\AccessControl::class,
                    'only' => ['add', 'create', 'create1', 'update', 'index', 'view'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['add', 'signup', 'create', 'update', 'index', 'view'],
                            'roles' => ['@'], // Require logged-in user
                        ],
                    ],
                ],
            ]

        );
    }
    //NewPassword
    public function actionChangePassword()
    {
        $user = User::findOne(Yii::$app->user->id);

        if ($user->load(Yii::$app->request->post())) {
            $user->scenario = 'changePassword';

            if ($user->validate()) {
                $user->password = Yii::$app->security->generatePasswordHash($user->newPassword);

                if ($user->save()) {
                    Yii::$app->session->setFlash('success', 'Password changed successfully.');
                    return $this->redirect(['view', 'id' => $user->id]);
                } else {
                    Yii::$app->session->setFlash('error', 'An error occurred while saving the new password.');
                }
            }
        }

        return $this->render('changePassword', [
            'user' => $user,
        ]);
    }
    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new User();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    //This function is used to activate account

    public function actionActivate($id)
    {
        $model = User::find()->where(['id' => $id])->one();
        $model->status = 10;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'This PMCS successfully activated!');
            return $this->redirect(['site/userindex']);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Activte fail');
            return $this->redirect(['site/userindex', 'id' => $id]);
        }
    }
    public function actionDeactivate($id)
    {
        $model = User::find()->where(['id' => $id])->one();
        $model->status = 9;
        if ($model->save(false)) {
            \Yii::$app->getSession()->setFlash('success', 'This PMCS successfully deactivated!');
            return $this->redirect(['site/userindex', 'id' => $id]);
        } else {
            \Yii::$app->getSession()->setFlash('error', 'Deactivation fail');
            return $this->redirect(['site/userindex', 'id' => $id]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    //Changing password
    public function actionAdd()
    {
        $model = new User();
        $changepass = User::find()->where(['id' => Yii::$app->user->identity->id])->one();

        if ($model->load(Yii::$app->request->post())) {
            $model->validate(); // Run model validation

            if ($model->hasErrors()) {
                Yii::$app->session->setFlash('error', 'Please fix the errors in the form.');
            } else {
                // $oldPassword = $model->oldpassword; //Yii::$app->security->generatePasswordHash($model->oldpassword);

                // if ($oldPassword == $changepass->password_hash) {
                $newPassword =  Yii::$app->security->generatePasswordHash($model->newpassword);
                $changepass->password_hash = $newPassword;

                if ($changepass->save(false)) {
                    Yii::$app->session->setFlash('success', 'Your password has been changed successfully. Please log in using the new password.');
                    Yii::$app->user->logout();
                    return $this->redirect(['site/login']);
                } else {
                    Yii::$app->session->setFlash('error', 'An error occurred while saving the password. Please try again later.');
                }
                // }
                //  else {
                //     Yii::$app->session->setFlash('error', 'The old password you entered is incorrect.');
                // }
            }
        }

        return $this->render('add', [
            'model' => $model,
        ]);
    }
}
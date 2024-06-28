<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\Cookie;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionCommodule()
    {
        return $this->render('/giiwizard/com-module');
    }
    
    /* Gii wizard */
    public function actionSemmodule()
    {
        return $this->render('/giiwizard/sem-module');
    }

    public function actionCommodulejson()
    {
        return $this->render('/giiwizard/com-module-json');
    }

    public function actionSemmodulejson()
    {
        return $this->render('/giiwizard/sem-module-json');
    }

    public function actionCodigoextra()
    {
        return $this->render('/giiwizard/codigo-extra');
    }
    public function actionBotaocopiar()
    {
        return $this->render('/giiwizard/botao-copiar');
    }

    /**
     * Action to toggle the dark mode theme and save preference in a cookie.
     *
     * @return Response
     */
    public function actionToggleTheme()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $cookies = Yii::$app->response->cookies;

        // Obtém o valor atual do cookie
        $currentValue = Yii::$app->request->cookies->getValue('dark_mode', '0');
        // Alterna o valor
        $newValue = $currentValue == '1' ? '0' : '1';

        // Define o cookie
        $cookies->add(new Cookie([
            'name' => 'dark_mode',
            'value' => $newValue,
            'expire' => time() + 86400 * 365, // 1 ano de validade
        ]));

        return $newValue;
    }
}

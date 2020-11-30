<?php
namespace frontend\controllers;

use common\models\Settings;
use frontend\models\Register;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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
     * @return mixed
     */
    public function actionIndex()
    {
        $settings = Settings::find()->where(['status' => 'on'])->one();

        return $this->render('index', [
            'settings' => $settings
        ]);
    }

    public function actionSuccess()
    {
        $settings = Settings::find()->where(['status' => 'on'])->one();

        $model = new Register();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {

            $year = substr($model['tin'], 0,2);
            $month = substr($model['tin'], 2,2);
            $day = substr($model['tin'], 4,2);

            $sex = $model['tin']{6};
            if($sex == 1 || $sex == 3 || $sex == 5){
                $model->sex = '1';
            } else {
                $model->sex = '2';
            }

            if($sex == 3 || $sex == 4){
                $newDate = '19'.$year.'-'.$month.'-'.$day;
            } elseif($sex == 5 || $sex == 6) {
                $newDate = '20'.$year.'-'.$month.'-'.$day;
            } else {
                $newDate = '18'.$year.'-'.$month.'-'.$day;
            }

            $model->birthdate = $newDate;

//            $model->save();
            if ($model->save()) {
                $dataSig = [
                    "surname" => $model['surname'],
                    "name" => $model['name'],
                    "patronymic" => $model['patronymic'],
                    "sex" => $model['sex'],
                    "mobile" => $model['phone'],
                    "passport_id" => $model['tin'],
                    "email" => $model['email'],
                    "birthdate" => $model['birthdate'],
                    "residence" => $model['residence'],
                    "amount" => $model['amount'],
                    "term" => $model['term'],
                ];
                $password = '548qngou02IGGGFwq}!nPbRv9Vt97Tabc';

                $signature = base64_encode(sha1(json_encode($dataSig) . $password, true));

                $data = [
                    "partner" => 5,
                    "data" => $dataSig,
                    "signature" => $signature,
                    "method" => 'check',
                ];


                $options = array(
                    'http' => array(
                        'method'  => 'POST',
                        'content' => json_encode( $data ),
                        'header'=>  "Content-Type: application/json\r\n" .
                            "Accept: application/json\r\n"
                    ),
                    "ssl"=>array(
                        "verify_peer"=>false,
                        "verify_peer_name"=>false,
                    ),
                );

                $context  = stream_context_create( $options );
                $result = file_get_contents( 'https://mfo-crm.4slovo.kz/requestAPI.php', false, $context );
                $response = json_decode( $result, true );
                if($response['response'] == 'OK'){
                    $dataLink = [
                        "partner" => 5,
                        "data" => $dataSig,
                        "signature" => $signature,
                    ];


                    $options = array(
                        'http' => array(
                            'method'  => 'POST',
                            'content' => json_encode( $dataLink ),
                            'header'=>  "Content-Type: application/json\r\n" .
                                "Accept: application/json\r\n"
                        ),
                        "ssl"=>array(
                            "verify_peer"=>false,
                            "verify_peer_name"=>false,
                        ),
                    );

                    $context  = stream_context_create( $options );
                    $result = file_get_contents( 'https://mfo-crm.4slovo.kz/requestAPI.php', false, $context );
                    $response = json_decode( $result, true );

                    if(isset($response['error'])){
                        if($response['error'] == 'Повторный запрос'){
                            return $this->redirect('notification');
                        }
                    }

                    if(isset($response['link'])){
                        if($response['response'] == 'new person added'){
                            return $this->redirect($response['link']);
                        } elseif ($response['response'] == 'moved to broker'){
                            return $this->render('success', [
                                'model' => $model,
                                'settings' => $settings,
                                'link' => $response['link'],
                            ]);
                        } else {
                            return $this->redirect('credit');
                        }
                    } else {
                        return $this->redirect('credit');
                    }
                } else {
                    return $this->redirect('credit');
                }
            } else {
                Yii::$app->session->setFlash(
                    'error',
                    'Ошибка.'
                );
            }
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionCredit()
    {
        $settings = Settings::find()->where(['status' => 'on'])->one();

        return $this->render('credit', [
            'settings' => $settings
        ]);
    }

    public function actionNotification()
    {
        $settings = Settings::find()->where(['status' => 'on'])->one();

        return $this->render('notification', [
            'settings' => $settings
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            Yii::$app->session->setFlash('success', 'Thank you for registration. Please check your inbox for verification email.');
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}

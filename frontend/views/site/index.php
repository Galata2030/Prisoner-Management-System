<?php

use frontend\models\Post;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use frontend\assets\AppAsset;

/** @var yii\web\View $this */
$this->registerCssFile('@web/css/custom.css', ['depends' => [AppAsset::class]]);
AppAsset::register($this);
?>
<?php
$this->title = 'Prisoner Management Sytem';
?>


<body>
    <div class="site-index">
        <div class="p-5 mb-4 bg-transparent rounded-3">
            <div class="container-fluid py-5 text-center">
                <h1 class="display-4" style="color:white">Welcome to Harar Prisoner Management System</h1>
                <p class="fs-5 fw-light" style="color:white">You can control the prisoners through this sytem.</p>

            </div>
        </div>

        <div class="body-content">

            <div class="row">
                <div class="col-lg-4">
                    <h2 style="color:white">Background </h2>
                    <p style="color:yellow">
                        Harar prison office found at the town of Harar which is found in Harare region. The prison
                        station
                        was established in Ethiopia during Dergue regime in 1967 E.C to give peace and security of
                        citizens living in urban cities, establishing prisoner station in such cities is crucial. Harar
                        city is
                        also one of the beneficial of this modern prisoner currently. Harar prison station has enough
                        man
                        power to manage crimes that act on citizens living within it. Crime management is possible in a
                        city Even though it is not automated with current technology like computers. For their
                        achievement
                        of basic need the peoples need peace and security to full fill their basic need, then peace and
                        security is the key concept in the living environment for any work that you help for your life.
                        Governments and peoples support to peace and security for their sustainable development for
                        their
                        country. Government and society need to control any activity that face the development in a
                        worst
                        condition. Because of this reason prison is one of the basic so prisoner will change bad
                        behavior. </p>
                </div>
                <div class="col-lg-4">
                    <h2 style="color:white">Vision Of The Organization</h2>

                    <p style="color:yellow">Harar Prison by participating people and developing highly secured
                        information system center in
                        order to prevent crime.</p>

                </div>
                <div class="col-lg-4">
                    <h2 style="color:white">Mission Of The Organization</h2>

                    <p style="color:yellow">The Harare national regional state police commission needs to have the power
                        of law and the
                        nation live and work with in peaceful and secure environment.
                    </p>
                </div>
            </div>

        </div>
    </div>
</body>
<style type="text/css">
    .site-index {

        height: 800px;
        background: url('/PrisonerMS/frontend/Images/darkJail.jpg') no-repeat center center;
        min-height: 100%;
        background-size: 100% 150%;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        width: 100%;
        -o-background-size: cover;
    }
</style>
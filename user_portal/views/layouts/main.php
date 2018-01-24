<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
   /* echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Dashboard', 'url' => ['/site/index']],  //View Details
            [
            'label' => 'User/ Reseller',
            'items' => [
                 ['label' => 'Create User', 'url' => '/index.php?r=portaluser/create'],
                 ['label' => 'Create Reseller', 'url' => '/index.php?r=portaluser/create'],
                 ['label' => 'Add/Remove Credits', 'url' => '#'],
                ],
            ],
            [
            'label' => 'View Details',
            'items' => [
                 ['label' => 'All Users', 'url' => '/index.php?r=portaluser&type=user'],
                 ['label' => 'All Resellers', 'url' => '/index.php?r=portaluser&type=reseller'],
                 ['label' => 'Transaction Logs', 'url' => '#'],
                ],
            ],
            
            [
            'label' => 'Whatsapp',
            'items' => [
                 ['label' => 'Send Whatsapp Message', 'url' => '#'],
                 ['label' => 'Send Media', 'url' => '#'],
                 ['label' => 'View Campaign Report', 'url' => '#'], //
                 ['label' => 'View Transaction Log', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Whatsapp Filter</li>',
                 ['label' => 'Filtering', 'url' => '#'],
                 ['label' => 'View Filter Report', 'url' => '#'],
                ],
            ],

            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
   */ 
     $items = [];
           $items[]= ['label' => 'Dashboard', 'url' => ['/site/index']];  //View Details
           $items[]= [
            'label' => 'User/ Reseller',
            'items' => [
                 ['label' => 'Create User', 'url' => '/index.php?r=portaluser/create'],
                 ['label' => 'Create Reseller', 'url' => '/index.php?r=portaluser/create'],
                 ['label' => 'Add/Remove Credits', 'url' => '#'],
                ],
            ];
            $items[]=[
            'label' => 'View Details',
            'items' => [
                 ['label' => 'All Users', 'url' => '/index.php?r=portaluser&type=user'],
                 ['label' => 'All Resellers', 'url' => '/index.php?r=portaluser&type=reseller'],
                 ['label' => 'Transaction Logs', 'url' => '#'],
                ],
            ];
            
            $items[]=[
            'label' => 'Whatsapp',
            'items' => [
                 ['label' => 'Send Whatsapp Message', 'url' => '#'],
                 ['label' => 'Send Media', 'url' => '#'],
                 ['label' => 'View Campaign Report', 'url' => '#'], //
                 ['label' => 'View Transaction Log', 'url' => '#'],
                 '<li class="divider"></li>',
                 '<li class="dropdown-header">Whatsapp Filter</li>',
                 ['label' => 'Filtering', 'url' => '#'],
                 ['label' => 'View Filter Report', 'url' => '#'],
                ],
            ];

            $items[]=['label' => 'Contact', 'url' => ['/site/contact']];
            
  
        echo Nav::widget([
         
            'items' => [ 
            [
                    'label' => '<span class="glyphicon glyphicon-log-out"></span>',
                    'items' => [
                         '<li class="dropdown-header">USER NAME</li>',
                         ['label' => 'Logout', 'url' => '/index.php?r=site/logout'],
                    ],
                ],
            ],
            'encodeLabels' => false,    
            'options' => ['class' => 'nav navbar-nav navbar-right'],
        ]);
          echo Nav::widget([
            'items' => $items ,       
             'options' => ['class' => 'navbar-nav navbar-right'],
             'activateItems'=>'true',
            'activateParents'=>'true',
        ]);
        
  
        NavBar::end();  



    ?>
<? if ($session->isActive){ ?>
<div> Somethig need to check</div>
    <div class="container">
        <?php /*Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])*/ ?>
        <?= Alert::widget() ?>
        <?php 
        $session = Yii::$app->session;
        
         print_r($_SESSION['main_user']); 
       /* foreach ($session as $session_name => $session_value){
            print_r($session_name)."<br>";
            print_r($session_value)."<br>";
        }*/          
            ?>
        <?= $content ?>
    </div>
</div>
<? } ?>
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <script src="/js/main.js"></script>
      <link rel="stylesheet" type="text/css" href="/css/main.css">
     
      <?php $this->head() ?>
   </head>
   <body  style="background-color:#f2f2f2;">
      <?php $this->beginBody() ?>
      <div class="wrap">
         <?php 
            if(isset($_SESSION['main_user'])){
            
                    $username=$_SESSION['main_user']['user_name'];
                    $usertype=$_SESSION['main_user']['user_type'];
                }else{
                    $username="Not Available";
                    $usertype="";
                }
            
            ?>
         <?php
            NavBar::begin([
                'brandLabel' => "Nishigandha's Digital Marketing",
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
             $items = [];
            
                   $items[]= ['label' => 'Dashboard', 'url' => ['/site/index']];  //View Details
                    
                if($usertype=="Admin"||$usertype=="Reseller")
                {
                    $items[]= [
                    'label' => 'User/ Reseller',
                    'items' => [
                         ['label' => 'Create User', 'url' => '/index.php?r=portaluser/create&type=User'],
                         ['label' => 'Create Reseller', 'url' => '/index.php?r=portaluser/create&type=Reseller'],
                         ['label' => 'Add/Remove Credits', 'url' => '/index.php?r=usercredit/create'],
                        ],
                    ];
               
                    $items[]=[
                    'label' => 'View Details',
                    'items' => [
                         ['label' => 'All Users', 'url' => '/index.php?r=portaluser&type=User'],
                         ['label' => 'All Resellers', 'url' => '/index.php?r=portaluser&type=Reseller'],
                        // ['label' => 'Transaction Logs', 'url' => '/index.php?r=transactionlog'],
                        ],
                    ];
                }   
            
                if($usertype=="Admin"){

                  $items[]=[
                    'label' => 'Reports',
                    'items' => [
                         ['label' => 'View Campaign Report', 'url' => '/index.php?r=whatsapp'], //
                         ['label' => 'View Transaction Log', 'url' => '/index.php?r=transactionlog'],
                         ['label' => 'View Filter Report', 'url' => '/index.php?r=whatsapp&type=Filter'],
                        ],
                    ];

                }
            
            
                if($usertype=="User")
                {
                    $items[]=[
                    'label' => 'Whatsapp',
                    'items' => [
                         ['label' => 'Send Whatsapp Message', 'url' => '/index.php?r=whatsapp/create&type=Message'],
                         ['label' => 'Send Media', 'url' => '/index.php?r=whatsapp/create&type=Media'],
                         ['label' => 'View Campaign Report', 'url' => '/index.php?r=whatsapp&type=whatsapp'], //
                         ['label' => 'View Transaction Log', 'url' => '/index.php?r=transactionlog'],
                         '<li class="divider"></li>',
                         '<li class="dropdown-header">Whatsapp Filter</li>',
                         ['label' => 'Filtering', 'url' => '/index.php?r=whatsapp/create&type=Filter'],
                         ['label' => 'View Filter Report', 'url' => '/index.php?r=whatsapp&type=Filter'],
                        ],
                    ];
                }
                 //   $items[]=['label' => 'Contact', 'url' => ['/site/contact']];
                
                
                
                
                echo Nav::widget([
                 
                    'items' => [ 
                    [
                            'label' => '<span class="glyphicon glyphicon-log-out"></span>',
                            'items' => [
                                 '<li class="dropdown-header"> '.ucfirst($username).'</li>',
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
        <!--  <div> Somethig need to check</div> -->
         <div class="container"  style="background-color:#FFFFFF;">
            <?php /*Breadcrumbs::widget([
               'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
               ])*/ ?>
            <?= Alert::widget() ?>
            <?php 
               //print_r($_SESSION);
               //print_r($_SESSION['main_user']); 
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
            <p class="pull-left">&copy; Nishigandha's Digital Marketing <?= date('Y') ?></p>
            <p class="pull-right">&nbsp;</p>
         </div>
      </footer>
      <?php $this->endBody() ?>
   </body>
</html>
<?php $this->endPage() ?>
 <?php
error_reporting(0);

session_start();
include_once('common.php');

if(isset($_POST['btnforget']))
{
//  var_dump($_POST);
  $email_id = $_POST['email'];
  
  

$postData = array(
   "userMailId" => $email_id,
        
  );

// Create the context for the request
$context = stream_context_create(array(
  'http' => array(
    'method' => 'POST',
    'header' => "Content-Type: application/json\r\n",
    'content' => json_encode($postData)
    )
  ));


$response = file_get_contents($url_api.'/user/sentOtpToEmailForgotPassword', FALSE, $context);

if($response === FALSE){
  die('Error');
}


$responseData = json_decode($response, TRUE);



if(isset($responseData['userMailId']))
{
  $message = $responseData['message'];

  header("location:verfiyforgetotp.php?f=".$message);
}
else
{
  $error = $responseData['message'];
}

}

?>


<!DOCTYPE html>
<!-- saved from url=(0029)https://www.luno.com/en/login -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><style type="text/css">@charset "UTF-8";[ng\:cloak],[ng-cloak],[data-ng-cloak],[x-ng-cloak],.ng-cloak,.x-ng-cloak,.ng-hide:not(.ng-hide-animate){display:none !important;}ng\:form{display:block;}.ng-animate-shim{visibility:hidden;}.ng-anchor{position:absolute;}</style>
    
<title>Sign in | Bitwire</title>


<script type="text/javascript" async="" src="assets/insight.min.js"></script><script async="" src="assets/analytics.js"></script><script src="assets/bugsnag-3.min.js" data-apikey="3cc67afdb6dd450441bc9023b5262f26" data-appversion="71d1732"></script>




<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="origin-when-cross-origin">

<link rel="icon" href="img/favicon.png" type="image/x-icon" />
<meta name="theme-color" content="#12326B">






<meta name="description" content="Welcome back to Luno! Log in to your account to send, receive, buy or sell Bitcoin.">


<meta property="og:locale" content="en">
<meta property="og:type" content="website">



<meta property="og:site_name" content="Luno">
<meta property="og:image" content="https://d32exi8v9av3ux.cloudfront.net/web/71d1732/website/common/img/default_og_image.png">



<link href="assets/css" rel="stylesheet">
<link rel="stylesheet" href="assets/bootstrap.min.css">
<link rel="stylesheet" href="assets/website.css">


  <link href="assets/css(1)" rel="stylesheet">
</head>
<body id="o-wrapper" class="o-wrapper ln-account-body" style="background-image: url(img/bg22.jpg) !important;">



<nav class="navbar navbar-fixed-top ln-navbar">

  <div class="container-fluid page-banner collapse">
    Bitwire
    
  </div>

  <div class="container-fluid">
    <div class="navbar-header">
      <a id="sidenav-button--slide-left" class="ln-menu sidenav-button--slide-left" href="javascript:void(0)">
        
        <svg height="24" class="visible-xs" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
          <path d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"></path>
        </svg>
      </a>
      <a class="ln-logo" href="#">
        
        <img class="logo-dark hi" src="img/logo.png" />
      </a>
    </div>
    <div class="hidden-xs">
      <ul class="nav navbar-nav navbar-right">
         
        <li><a href="#">SUPPORT</a></li>
        <li><a href="loginnew.php" class="btn btn-primary ln-btn-sm">SIGN IN</a></li>
        <li><a href="signupnew.php" class="btn btn-primary ln-btn-sm">SIGN UP</a></li>
      </ul>
 
    </div>
  </div>
</nav>


    
<nav id="sidenav-menu--slide-left" class="sidenav-menu sidenav-menu--slide-left " >
  <div class="ln-sidenav-top">
    <a href="javascript:void(0)" class="sidenav-menu__close ln-close">
      
      
    </a>
    <a class="btn btn-primary ln-btn-primary" href="signupnew.php">Get Started</a>
  </div>
  
    <ul class="nav">
      
      <li class="nav-item">
        <a href="#">SUPPORT</a>
      </li>
      <li class="nav-item">
        <a href="loginnew.php">SIGN IN</a>
      </li>
      <li class="nav-item">
        <a href="signupnew.php">SIGN UP</a>
      </li>
      
    </ul>
  </div>

  
 
  
  
</nav>
<div id="sidenav-mask" class="sidenav-mask"></div>

    
    <div class="ln-account-wrapper">
      

<div class="section">
  <h1 class="ng-binding">Forget Password</h1> 

  <p>
      <img ng-src="https://d32exi8v9av3ux.cloudfront.net/web/71d1732/website/pages/login/email.svg" width="58" height="60" src="assets/email.svg">
  </p>

<p style="color:red;"> <?php if(isset($error)) {echo $error; }?> </p>
  <form  method="post" class="">

    <div class="form-group">
      <input class="form-control"  type="email" name="email" placeholder="Email address" autofocus="" required="">
    </div>
  
  <!-- <div class="ln-captcha">
      <div class="g-recaptcha ng-pristine ng-untouched ng-valid ng-isolate-scope ng-empty" vc-recaptcha="" ng-model="vm.recaptcha" key="vm.recaptchaPublicKey"><div style="width: 304px; height: 78px;"><div><iframe src="./Sign up _ Luno_files/anchor.html" title="recaptcha widget" width="304" height="78" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid #c1c1c1; margin: 10px 25px; padding: 0px; resize: none;  display: none; "></textarea></div></div>
    </div> -->
    <button type="submit" name="btnforget" class="btn ln-btn-sm btn-primary">Send</button>

    <div class="ln-account-secondary-actions">
      <a href="signupnew.php">Sign up</a>
    </div>

  </form>
</div>
    
<script src="assets/deps.min.js"></script>
<script src="assets/website.js"></script>
<script>
  initPageBanner();
  initNavScroll();
  initSideNav();
  initForms();
  initFooter();
  LunoAuth.auth();
</script>




<script src="assets/saved_resource" type="text/javascript"></script><script src="assets/saved_resource(1)" type="text/javascript"></script><img src="https://secure.adnxs.com/seg?t=2&amp;add=7326041,7326073,7326113,7326422,7326428,6991858,6991910,6991857,6991938,7324349,7324371,7324346,7324354,7324358,6992019,6992020,6992021,7326871,7326872,7326877,7324058,7323986,7326540,7326543,7323981,7326047,7326052&amp;redir=https%3A%2F%2Fsecure.adnxs.com%2Fseg%3Fadd%3D%26add_code%3Dwww_luno_com%2Cluno_com%26member%3D232%26redir%3Dhttps%253A%252F%252Fimp2.ads.linkedin.com%252Fl" width="1" height="1" border="0" alt="" style="display: none !important;"></body></html>
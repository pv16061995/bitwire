<?php
    include 'final_header.php';
    include_once('common.php');
    page_protect();
    if (!isset($_SESSION['user_id']) && !isset($_SESSION['token'])) {
        logout();
    }

   $user_session = $_SESSION['user_session'];

 if($_SESSION['KYC_status']===false)
      {
       
        header("location:kyc_verification.php" );
      }  

if(isset($_GET['curr']))
{
  $currencyname=base64_decode($_GET['curr']);

 
}
?>


<form >
<div class="" style="margin-bottom: 48px !important;">
    <div class=" " style="margin-bottom: 48px !important;">
        <div class="row balance-div" style="border-left:none;">
            <div class="col-md-10">
                
                <a class="btn" href="sendget.php?curr=<?php echo base64_encode($currencyname);?>" id="btnsend"><i class="fa fa-sign-out"></i> Send <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="address.php?curr=<?php echo base64_encode($currencyname);?>" id="btnreceived"><i class="fa fa-sign-in"></i> Receive <?= strtoupper($currencyname); ?></a>
                <a class="btn" href="fundstransaction.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Transactions <?= strtoupper($currencyname); ?></a>
                 <a class="btn" href="deposit.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Deposit <?= strtoupper(substr($currencyname,0,3));  ?></a>
                  <a class="btn" href="withdraw.php?curr=<?php echo base64_encode($currencyname);?>"><i class="fa fa-sign-in"></i> Withdraw <?= strtoupper(substr($currencyname,0,3));  ?></a>
            </div>
            
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-6 col-md-6 text-center">
                <div class="card text-white bg-success">
                    <div class="card-header text-center">
                        <h3 class="font-custom">WithDraw  <?= strtoupper(substr($currencyname,0,3)); ?></h3>
                        
                    </div>
                    <br>
                    Comming Soon....
                   <!--  <div class="card-body text-center bg-white text-success">
                    <div>
                    <lable> Enter Amount in <?= strtoupper(substr($currencyname,0,3)); ?></lable>
                    </div>
                    <br>
                    <div>
                     <input id="amount" name="amount" class="form-control form-control-sm" autocomplete="off" type="text" value="">
                     Maximum Limit 15,00000
                     </div>
                     
                     <br>
                     <div>

                        <input type="submit" class="btn btn-info btn-lg" id="withdraw" name="withdraw" value="Send"/>
                    </div>
                </div>
 -->

            </div>
        </div>
    </div>

</div>
</form>
<?php    include 'footer.php'; ?>

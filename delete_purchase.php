<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
?>
<?php
  $purchase = find_by_id('purchase',(int)$_GET['id']);
  if(!$purchase){
    $session->msg("d","Missing Purchase id.");
    redirect('purchases.php');
  }
?>
<?php
  $delete_id = delete_by_id('purchase',(int)$purchase['id']);
  if($delete_id){
      $session->msg("s","Purchase deleted.");
      redirect('purchases.php');
  } else {
      $session->msg("d","Purchase deletion failed.");
      redirect('purchases.php');
  }
?>

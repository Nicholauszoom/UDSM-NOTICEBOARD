<?php
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$public = find_by_id('public',(int)$_GET['id']);
if(!$public){
    $session->msg("d","Missing public annoucement id.");
    redirect('admin_view_public_annoucement.php');
}
?>
<?php
$delete_id = delete_by_id('public',(int)$public['id']);
if($delete_id){
    $session->msg("s","Public Annoucement deleted.");
    redirect('admin_view_public_annoucement.php');
} else {
    $session->msg("d","Public deletion failed.");
    redirect('admin_view_public_annoucement.php');
}
?>

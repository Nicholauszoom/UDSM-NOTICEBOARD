<?php
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  $course = find_by_id('course',(int)$_GET['id']);
  if(!$course){
    $session->msg("d","Missing Courses id.");
    redirect('course.php');
  }
?>
<?php
  $delete_id = delete_by_id('course',(int)$course['id']);
  if($delete_id){
      $session->msg("s","Course deleted.");
      redirect('course.php');
  } else {
      $session->msg("d","Course deletion failed.");
      redirect('course.php');
  }
?>

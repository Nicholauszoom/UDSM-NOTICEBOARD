<?php
  $page_title = 'Edit Course';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
?>
<?php
  //Display all catgories.
  $course = find_by_id('course',(int)$_GET['id']);
  if(!$course){
    $session->msg("d","Missing course id.");
    redirect('course.php');
  }
?>

<?php
if(isset($_POST['edit_cos'])){
  $req_field = array('course-name');
  validate_fields($req_field);
  $cat_name = remove_junk($db->escape($_POST['course-name']));
  if(empty($errors)){
        $sql = "UPDATE course SET name='{$cos_name}'";
       $sql .= " WHERE id='{$course['id']}'";
     $result = $db->query($sql);
     if($result && $db->affected_rows() === 1) {
       $session->msg("s", "Successfully updated Course");
       redirect('course.php',false);
     } else {
       $session->msg("d", "Sorry! Failed to Update");
       redirect('course.php',false);
     }
  } else {
    $session->msg("d", $errors);
    redirect('course.php',false);
  }
}
?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-12">
     <?php echo display_msg($msg); ?>
   </div>
   <div class="col-md-5">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Editing <?php echo remove_junk(ucfirst($course['cos_name']));?></span>
        </strong>
       </div>
       <div class="panel-body">
         <form method="post" action="edit_course.php?id=<?php echo (int)$course['id'];?>">
           <div class="form-group">
               <input type="text" class="form-control" name="course-name" value="<?php echo remove_junk(ucfirst($course['cos_name']));?>">
           </div>
           <button type="submit" name="edit_cos" class="btn btn-primary">Update course</button>
       </form>
       </div>
     </div>
   </div>
</div>



<?php include_once('layouts/footer.php'); ?>

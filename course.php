<?php
  $page_title = 'All courses';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
   
  $all_courses = find_all('course')
?>
<?php
 if(isset($_POST['add_cos'])){
   $req_field = array('course-name');
   validate_fields($req_field);
   $cos_name = remove_junk($db->escape($_POST['course-name']));
   if(empty($errors)){
      $sql  = "INSERT INTO course (cos_name)";
      $sql .= " VALUES ('{$cos_name}')";
      if($db->query($sql)){
        $session->msg("s", "Successfully Added New Course");
        redirect('course.php',false);
      } else {
        $session->msg("d", "Sorry Failed to insert.");
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
  </div>
   <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Course</span>
         </strong>
        </div>
        <div class="panel-body">
          <form method="post" action="course.php">
            <div class="form-group">
                <input type="text" class="form-control" name="course-name" placeholder="Course Name">
            </div>
            <button type="submit" name="add_cos" class="btn btn-primary">Add Course</button>
        </form>
        </div>
      </div>
    </div>
    <div class="col-md-7">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>All Course</span>
       </strong>
      </div>
        <div class="panel-body">
          <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" style="width: 50px;">#</th>
                    <th>Course</th>
                    <th class="text-center" style="width: 100px;">Actions</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach ($all_courses as $cos):?>
                <tr>
                    <td class="text-center"><?php echo count_id();?></td>
                    <td><?php echo remove_junk(ucfirst($cos['cos_name'])); ?></td>
                    <td class="text-center">
                      <div class="btn-group">
                        <a href="edit_course.php?id=<?php echo (int)$cos['id'];?>"  class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                          <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="delete_course.php?id=<?php echo (int)$cos['id'];?>"  class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                          <span class="glyphicon glyphicon-trash"></span>
                        </a>
                      </div>
                    </td>

                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
       </div>
    </div>
    </div>
   </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>

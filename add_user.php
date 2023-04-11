<?php
  $page_title = 'Add User';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
  $groups = find_all('user_groups');
  $all_categories=find_all('categories');
  $all_course=find_all('course');

?>
<?php
  if(isset($_POST['add_user'])){

   $req_fields = array('full-name','username','password','level','registrationNo','categorie','course' );
   validate_fields($req_fields);

   if(empty($errors)){
           $name   = remove_junk($db->escape($_POST['full-name']));
       $username   = remove_junk($db->escape($_POST['username']));
       $password   = remove_junk($db->escape($_POST['password']));
       $user_level = (int)$db->escape($_POST['level']);
       $registrationNo = remove_junk($db->escape($_POST['registrationNo']));
       $categorie_id   = (int)($db->escape($_POST['categorie']));
       $course_id = (int)$db->escape($_POST['course']);
       $password = sha1($password);
        $query = "INSERT INTO users (";
        $query .="name,username,password,user_level,registrationNo,categorie_id,course_id,status";
        $query .=") VALUES (";
        $query .=" '{$name}', '{$username}', '{$password}', '{$user_level}', '{ $registrationNo }','{ $categorie_id}','{ $course_id}','1'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"User account has been creted! ");
          redirect('add_user.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_user.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_user.php',false);
   }
 }
?>
<?php include_once('layouts/header.php'); ?>
  <?php echo display_msg($msg); ?>
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span class="glyphicon glyphicon-th"></span>
          <span>Add New User</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_user.php">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="full-name" placeholder="Full Name">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name ="password"  placeholder="Password">
            </div>
            <div class="form-group">
              <label for="level">User Role</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div>
             <div class="form-group">
                <label for="registrationNo">RegistrationNo</label>
                <input type="text" class="form-control" name ="registrationNo"  placeholder="Registration#">
            </div>
             <div class="form-group">
                    <select class="form-control" name="categorie">
                      <option value="">Select Department</option>
                    <?php  foreach ($all_categories as $categorie_id): ?>
                      <option value="<?php echo (int)$categorie_id['id'] ?>">
                        <?php echo $categorie_id['name'] ?>
                      </option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select class="form-control" name="course">
                      <option value="">Select Course</option>
                    <?php  foreach ($all_course as $course_id): ?>
                      <option value="<?php echo (int)$course_id['id'] ?>">
                        <?php echo $course_id['cos_name'] ?>
                      </option>
                    <?php endforeach; ?>
                    </select>
                  </div>
            <div class="form-group clearfix">
              <button type="submit" name="add_user" class="btn btn-primary">Add User</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

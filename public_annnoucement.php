<?php
  $page_title = 'Add Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);

  $all_photo = find_all('media');


?>
<?php
 if(isset($_POST['add_public_annnoucement'])){
   $req_fields = array('public-title','public-description' );
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['public-title']));
     $p_desc   = remove_junk($db->escape($_POST['public-description']));
    
     if (is_null($_POST['public-photo']) || $_POST['public-photo'] === "") {
       $media_id = '0';
     } else {
       $media_id = remove_junk($db->escape($_POST['public-photo']));
     }
     $date    = make_date();
     $query  = "INSERT INTO public (";
     $query .=" title, description,media_id,date";
     $query .=") VALUES (";
     $query .=" '{$p_name}', '{$p_desc}', '{$media_id}', '{$date}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE title='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Public Annoucement added ");
       redirect('public_annnoucement.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('admin.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('public_annnoucement.php',false);
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
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New public Announcement</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="public_annnoucement.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="public-title" placeholder="Announcement Title">
               </div>
              </div>
              <div class="form-group">
                <div class="row">
                
                  <div class="form-group">
                <div class="row">
            
                  <div class="col-md-6">
                    <select class="form-control" name="public-photo">
                      <option value="">Select Picture</option>
                    <?php  foreach ($all_photo as $photo): ?>
                      <option value="<?php echo (int)$photo['id'] ?>">
                        <?php echo $photo['file_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>

              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-bullhorn"></i>
                     </span>
                     <input type="textarea" class="form-control" name="public-description" placeholder="Announcement description">
                  </div>
                 </div>
              
               </div>
              </div>
              <button type="submit" name="add_public_annnoucement" class="btn btn-danger">Add public Announcement</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

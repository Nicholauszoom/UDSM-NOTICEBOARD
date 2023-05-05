<?php
$page_title = 'Edit Public Annoucement';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(2);

?>
<?php
//Display all catgories.
$public_annouceme = find_by_id('public',(int)$_GET['id']);
$all_photo = find_all('media');
if(!$public_annouceme){
    $session->msg("d","Missing course id.");
    redirect('public_annnoucement.php');
}
?>

<?php
if(isset($_POST['edit_annoucement'])){
    $req_field = array('public-title','public-description' );
    validate_fields($req_field);
    $p_name  = remove_junk($db->escape($_POST['public-title']));
    $p_desc   = remove_junk($db->escape($_POST['public-description']));
    if (is_null($_POST['public-photo']) || $_POST['public-photo'] === "") {
        $media_id = '0';
    } else {
        $media_id = remove_junk($db->escape($_POST['public-photo']));
    }
    if(empty($errors)){

        $query  = "UPDATE public SET  (";
        $query .=" title='{$p_name}', description='{$p_desc}',";
        $query  .=" WHERE id ='{$public_annouceme['id']}'";
        $result = $db->query($query);
        if($result && $db->affected_rows() === 1) {
            $session->msg("s", "Successfully updated Public Annoucement");
            redirect('public_annnoucement.php',false);
        } else {
            $session->msg("d", "Sorry! Failed to Update");
            redirect('edit_public_annoucement.php',false);
        }
    } else {
        $session->msg("d", $errors);
        redirect('public_annnoucement.php',false);
    }
}
?>
<?php include_once('layouts/header.php'); ?>





<?php include_once('layouts/header.php'); ?>
<div class="row">
    <div class="col-md-12">

    </div>
</div>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <strong>
                <span class="glyphicon glyphicon-th"></span>
                <span>Edit New Product</span>
            </strong>
        </div>
        <div class="panel-body">
            <div class="col-md-7">
                <form method="post" action="edit_public_annoucement.php?id=<?php echo (int)$public_annouceme['id'] ?>">
                    <div class="form-group">
                        <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                            <input type="text" class="form-control" name="public-title" value="<?php echo remove_junk($public_annouceme['title']);?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <select class="form-control" name="public-photo">
                                    <option value=""> No image</option>
                                    <?php  foreach ($all_photo as $photo): ?>
                                        <option value="<?php echo (int)$photo['id'];?>" <?php if($public_annouceme['media_id'] === $photo['id']): echo "selected"; endif; ?> >
                                            <?php echo $photo['file_name'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label >Description</label>
                                        <div class="input-group">
                      <span class="input-group-addon">
                       <i class="glyphicon glyphicon-file"></i>
                      </span>
                                            <input type="textarea" class="form-control" name="public-description" value="<?php echo remove_junk($public_annouceme['description']); ?>">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <button type="submit" name="edit_annoucement" class="btn btn-danger">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>








<?php include_once('layouts/footer.php'); ?>

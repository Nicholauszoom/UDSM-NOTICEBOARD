<?php
  $page_title = 'Edit Supplier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
?>
<?php
$supplier = find_by_id('supplier',(int)$_GET['id']);
// $all_categories = find_all('categories');
// $all_photo = find_all('media');

if(!$supplier){
  $session->msg("d","Missing Supplier id.");
  redirect('supplier.php');
}
?>
<?php
 if(isset($_POST['supplier'])){
    $req_fields = array('supplier_name','supplier_email','supplier_phone');
    validate_fields($req_fields);

   if(empty($errors)){
       $supplier_name  = remove_junk($db->escape($_POST['supplier_name']));
    //    $p_cat   = (int)$_POST['product-categorie'];
       $supplier_email   = remove_junk($db->escape($_POST['supplier_email']));
       $supplier_phone   = remove_junk($db->escape($_POST['supplier_phone']));
    //    $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
    //    if (is_null($_POST['product-photo']) || $_POST['product-photo'] === "") {
    //      $media_id = '0';
    //    } else {
    //      $media_id = remove_junk($db->escape($_POST['product-photo']));
    //    }
       $query   = "UPDATE supplier SET";
       $query  .=" supplier_name ='{$supplier_name}', supplier_email ='{$supplier_email}',";
       $query  .=" supplier_phone ='{$supplier_phone}'";
       $query  .=" WHERE id ='{$supplier['id']}'";
       $result = $db->query($query);
               if($result && $db->affected_rows() === 1){
                 $session->msg('s',"Supplier updated ");
                 redirect('supplier.php', false);
               } else {
                 $session->msg('d',' Sorry failed to updated!');
                 redirect('edit_supplier.php?id='.$supplier['id'], false);
               }

   } else{
       $session->msg("d", $errors);
       redirect('edit_supplier.php?id='.$supplier['id'], false);
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
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>Add New Supplier</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-7">
           <form method="post" action="edit_supplier.php?id=<?php echo (int)$supplier['id'] ?>">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="supplier_name" value="<?php echo remove_junk($supplier['supplier_name']);?>">
               </div>
              </div>
             
              <div class="form-group">
               <div class="row">
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="supplier_email">Email</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                       <i class="glyphicon glyphicon-shopping-cart"></i>
                      </span>
                      <input type="text" class="form-control" name="supplier_email" value="<?php echo remove_junk($supplier['supplier_email']); ?>">
                   </div>
                  </div>
                 </div>
                 <div class="col-md-4">
                  <div class="form-group">
                    <label for="supplier_phone">Phone</label>
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="glyphicon glyphicon-usd"></i>
                      </span>
                      <input type="number" class="form-control" name="supplier_phone" value="<?php echo remove_junk($supplier['supplier_phone']);?>">
                      <span class="input-group-addon">.00</span>
                   </div>
                  </div>
                 </div>
                 
                  </div>
               </div>
              </div>
              <button type="submit" name="supplier" class="btn btn-danger">Update</button>
          </form>
         </div>
        </div>
      </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

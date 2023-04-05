<?php
  $page_title = 'Add Supplier';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(1);
//   $groups = find_all('user_groups');
?>
<?php
  if(isset($_POST['add_supplier'])){

   $req_fields = array('supplier_name','supplier_email','supplier_phone');
   validate_fields($req_fields);

   if(empty($errors)){
           $supplier_name  = remove_junk($db->escape($_POST['supplier_name']));
       $supplier_email   = remove_junk($db->escape($_POST['supplier_email']));
       $supplier_phone   = remove_junk($db->escape($_POST['supplier_phone']));
    //    $user_level = (int)$db->escape($_POST['level']);
      
        $query = "INSERT INTO supplier (";
        $query .="supplier_name,supplier_email,supplier_phone";
        $query .=") VALUES (";
        $query .=" '{$supplier_name}', '{$supplier_email}', '{$supplier_phone}'";
        $query .=")";
        if($db->query($query)){
          //sucess
          $session->msg('s',"Supplier account has been creted! ");
          redirect('add_supplier.php', false);
        } else {
          //failed
          $session->msg('d',' Sorry failed to create account!');
          redirect('add_supplier.php', false);
        }
   } else {
     $session->msg("d", $errors);
      redirect('add_supplier.php',false);
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
          <span>Add New Supplier</span>
       </strong>
      </div>
      <div class="panel-body">
        <div class="col-md-6">
          <form method="post" action="add_supplier.php">
            <div class="form-group">
                <label for="supplier_name">Name</label>
                <input type="text" class="form-control" name="supplier_name" placeholder="Supplier Name">
            </div>
            <div class="form-group">
                <label for="supplier_email">Email</label>
                <input type="text" class="form-control" name="supplier_email" placeholder="supplier email">
            </div>
            <div class="form-group">
                <label for="supplier_phone">Phone</label>
                <input type="supplier_phone" class="form-control" name ="supplier_phone"  placeholder="supplier phone">
            </div>
            <!-- <div class="form-group">
              <label for="level">User Role</label>
                <select class="form-control" name="level">
                  <?php foreach ($groups as $group ):?>
                   <option value="<?php echo $group['group_level'];?>"><?php echo ucwords($group['group_name']);?></option>
                <?php endforeach;?>
                </select>
            </div> -->
            <div class="form-group clearfix">
              <button type="submit" name="add_supplier" class="btn btn-primary">Add Supplier</button>
            </div>
        </form>
        </div>

      </div>

    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

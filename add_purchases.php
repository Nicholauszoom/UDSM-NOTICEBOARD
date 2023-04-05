<?php
  $page_title = 'Add Purchase';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_product = find_all('products');
  $all_photo = find_all('media');
  // $all_supplier = find_all('supplier');

?>
<?php
 if(isset($_POST['add_purchase'])){
   $req_fields = array('p_id','price','qty');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_id  = remove_junk($db->escape($_POST['p_id']));
     $b_price   = remove_junk($db->escape($_POST['price']));
     $b_qty   = remove_junk($db->escape($_POST['qtz']));
     $b_date  = remove_junk($db->escape($_POST['date']));
    
     $date    = make_date();
     $query  = "INSERT INTO purchase (";
     $query .=" product_id,price,qty,date";
     $query .=") VALUES (";
     $query .=" '{$p_id}', '{$b_price}', '{$b_qty}', '{$date}'";
     $query .=")";
    
     if($db->query($query)){
       $session->msg('s',"Purchase added ");
       redirect('add_purchases.php', false);
     } else {
       $session->msg('d',' Sorry failed to added!');
       redirect('purchases.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_purchases.php',false);
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
            <span>Add New Purchase</span>
         </strong>
        </div>
        <div class="panel-body">
         <div class="col-md-12">
          <form method="post" action="add_purchases.php" class="clearfix">
            
              

                  <div class="form-group">
                <div class="row">
                  <div class="col-md-6">
                    <select class="form-control" name="p_id">
                      <option value="">Select Product</option>
                    <?php  foreach ($all_product as $prod): ?>
                      <option value="<?php echo (int)$prod['id'] ?>">
                        <?php echo $prod['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <!-- <input type="text" class="form-control" name="product-Item" placeholder="Product Item"> -->
                  <input type="date" class="form-control datePicker" name="date" data-date data-date-format="yyyy-mm-dd" placeholder="date">
               </div>
              </div>
                
              <div class="form-group">          

               <div class="row">
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="qty" placeholder="Product Quantity">
                  </div>
                 </div>
                 <div class="col-md-4">
                   <div class="input-group">
                     <span class="input-group-addon">
                       <i class="glyphicon glyphicon-usd"></i>
                     </span>
                     <input type="number" class="form-control" name="price" placeholder="Buying Price">
                     <span class="input-group-addon">.00tsh</span>
                  </div>
                 </div>

               </div>
              </div>
              <button type="submit" name="add_purchase" class="btn btn-danger">Add purchase</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

<?php
  $page_title = 'Edit purchase';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php
$purchase = find_by_id('purchase',(int)$_GET['id']);
if(!$purchase){
  $session->msg("d","Missing product id.");
  redirect('purchases.php');
}
?>
<?php $product = find_by_id('products',$sale['product_id']); ?>
<?php

  if(isset($_POST['update_purchase'])){
    $req_fields = array('title','quantity','price','total', 'date' );
    validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$product['id']);
          $b_qty     = $db->escape((int)$_POST['quantity']);
          $b_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['date']);
          $b_date    = date("Y-m-d", strtotime($date));

          $sql  = "UPDATE purchase SET";
          $sql .= " product_id= '{$p_id}',qty={$b_qty},price='{$b_total}',date='{$b_date}'";
          $sql .= " WHERE id ='{$sale['id']}'";
          $result = $db->query($sql);
          if( $result && $db->affected_rows() === 1){
                    update_product_qty($b_qty,$p_id);
                    $session->msg('s',"Purchase updated.");
                    redirect('edit_purchase.php?id='.$purchase['id'], false);
                  } else {
                    $session->msg('d',' Sorry failed to updated!');
                    redirect('purchases.php', false);
                  }
        } else {
           $session->msg("d", $errors);
           redirect('edit_purchase.php?id='.(int)$sale['id'],false);
        }
  }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
<div class="row">

  <div class="col-md-12">
  <div class="panel">
    <div class="panel-heading clearfix">
      <strong>
        <span class="glyphicon glyphicon-th"></span>
        <span>All Purchase</span>
     </strong>
     <div class="pull-right">
       <a href="purchases.php" class="btn btn-primary">Show all purchase</a>
     </div>
    </div>
    <div class="panel-body">
       <table class="table table-bordered">
         <thead>
          <th> Product title </th>
          <th> Qty </th>
          <th> Price </th>
          <th> Total </th>
          <th> Date</th>
          <th> Action</th>
         </thead>
           <tbody  id="product_infos">
              <tr>
              <form method="post" action="edit_purchase.php?id=<?php echo (int)$purchase['id']; ?>">
                <td id="s_name">
                  <input type="text" class="form-control" id="sug_input" name="title" value="<?php echo remove_junk($product['name']); ?>">
                  <div id="result" class="list-group"></div>
                </td>
                <td id="b_qty">
                  <input type="text" class="form-control" name="quantity" value="<?php echo (int)$purchase['qty']; ?>">
                </td>
                <td id="s_price">
                  <input type="text" class="form-control" name="price" value="<?php echo remove_junk($product['buy_price']); ?>" >
                </td>
                <td>
                  <input type="text" class="form-control" name="total" value="<?php echo remove_junk($purchase['price']); ?>">
                </td>
                <td id="b_date">
                  <input type="date" class="form-control datepicker" name="date" data-date-format="" value="<?php echo remove_junk($purchase['date']); ?>">
                </td>
                <td>
                  <button type="submit" name="update_purchase" class="btn btn-primary">Update purchase</button>
                </td>
              </form>
              </tr>
           </tbody>
       </table>

    </div>
  </div>
  </div>

</div>

<?php include_once('layouts/footer.php'); ?>

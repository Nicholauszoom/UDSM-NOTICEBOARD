<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
 
 $recent_products = find_recent_product_added('3');

?>
<?php include_once('layouts/header.php'); ?>

<div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div>
  <div class="row">
    <a href="users.php" style="color:black;">
		<div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-secondary1">
          <i class="glyphicon glyphicon-user"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_user['total']; ?> </h2>
          <p class="text-muted">Users</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="categorie.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-red">
          <i class="glyphicon glyphicon-education"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2>
          <p class="text-muted">Courses</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="product.php" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-blue2">
          <i class="glyphicon glyphicon-bullhorn"></i>
        </div>
        <div class="panel-value pull-right">
          <h2 class="margin-top"> <?php  echo $c_product['total']; ?> </h2>
          <p class="text-muted">Announcements</p>
        </div>
       </div>
    </div>
	</a>
	
	<a href="" style="color:black;">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
         <div class="panel-icon pull-left bg-green">
          <i class="glyphicon glyphicon-file"></i>
        </div>
        <div class="panel-value pull-right">
          <!-- <h2 class="margin-top"> <?php  echo $c_sale['total']; ?></h2>
          <p class="text-muted">Sales</p> -->
        </div>
       </div>
    </div>
	</a> 
</div>
  
  <!-- <div class="row">
   <div class="col-md-4">
     <div class="panel panel-default">
       <div class="panel-heading">
         <strong>
           <span class="glyphicon glyphicon-th"></span>
           <span>Highest Selling Products</span>
         </strong>
       </div>
       <div class="panel-body">
         <table class="table table-striped table-bordered table-condensed">
          <thead>
           <tr>
             <th>Title</th>
             <th>Total Sold</th>
             <th>Total Quantity</th>
           <tr>
          </thead>
          <tbody>
            <?php foreach ($products_sold as  $product_sold): ?>
              <tr>
                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                <td><?php echo (int)$product_sold['totalQty']; ?></td>
              </tr>
            <?php endforeach; ?>
          <tbody>
         </table>
       </div>
     </div>
   </div>
   <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span class="glyphicon glyphicon-th"></span>
            <span>LATEST SALES</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Product Name</th>
           <th>Date</th>
           <th>Total Sale</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
            <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div> -->
  
    <div class="w-4/5 m-auto text-center">
        <div class="py-12 border-b border-gray-200">
            <h1 class="text-6xl pt-8 pb-8">
                Recent Posted Annoucements
            </h1>

            <span class="font-light text-gray-500 italic">
                 <?php echo display_msg($msg); ?>
            </span>
        </div>
    </div>

     <!--     <div class="list-group">
    <?php foreach ($recent_products as  $recent_product): ?>
            <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo    (int)$recent_product['id'];?>">
                <h4 class="list-group-item-heading">
                 <?php if($recent_product['media_id'] === '0'): ?>
                    <img class="img-avatar img-circle" src="uploads/products/no_image.png" alt="">
                  <?php else: ?>
                  <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="" />
                  
                <?php endif;?>
                <?php echo remove_junk(first_character($recent_product['name']));?>
                  <span class="label label-warning pull-right">
                <!-- $<?php echo remove_junk(first_character($recent_product['date'])); ?>
                  </span>-->
              <!--  </h4>
                <span class="list-group-item-text pull-right">
                <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
              </span>
          </a>
      <?php endforeach; ?>-->






 <div class="md:grid lg:grid-cols-3 gap-20 w-4/5 mx-auto py-15 ">
        <!-- Review Item -->
 <?php foreach ($recent_products as  $recent_product): ?>
              <div class="text-center pt-8 pb-4">

                 <?php if($recent_product['media_id'] === '0'): ?>
                    <img class="shadow-xl rounded-md" src="uploads/products/no_image.png" alt="">
                  <?php else: ?>
                  <img class="shadow-xl rounded-md" src="uploads/products/<?php echo $recent_product['image'];?>" alt="" />
                  
                <?php endif;?>

                <h2 class="text-gray-700 font-bold text-3xl py-2">
                  <?php echo remove_junk(first_character($recent_product['name']));?>
                </h2>

                <span class="text-gray-500">
                    For <span class="italic text-sm text-gray-800"> <?php echo remove_junk(first_character($recent_product['categorie'])); ?>
                </span>
                 <span class="text-gray-500 ">
                    At <span class="italic text-sm text-gray-800"><?php echo remove_junk(first_character($recent_product['date'])); ?>
                </span>

                <!--<a href="show_annoucement.php?id=<?php echo (int)$product['id'];?>" class="uppercase border border-gray-500 text-gray-600 text-lg py-4 px-12 rounded transition transition-all hover:bg-gray-800 hover:text-white ">
                    Keep Reading
                </a>-->
            </div>
         <?php endforeach; ?>
    </div>









<?php include_once('layouts/footer.php'); ?>

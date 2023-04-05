<?php
  $page_title = 'All ';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
  <!--   <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading clearfix">
         <div class="pull-right">
           <a href="add_product.php" class="btn btn-primary">Add New</a>
         </div>
        </div>
        <div class="panel-body">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th> Photo</th>
                <th> Announcement Title </th>
                <th class="text-center" style="width: 10%;"> Courses </th>
               
                <th class="text-center" style="width: 10%;"> Description </th>
              
                <th class="text-center" style="width: 10%;"> From</th>
          
                <th class="text-center" style="width: 100px;"> Actions </th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td>
                  <?php if($product['media_id'] === '0'): ?>
                    <img class="img-thumbnail" src="uploads/products/no_image.png" alt="">
                  <?php else: ?>
                  <img class="img-thumbnail" src="uploads/products/<?php echo $product['image']; ?>" alt="">
                <?php endif; ?>
                </td>
                <td> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
              
                <td class="text-center"> <?php echo remove_junk($product['description']); ?></td>
              
                <!--<td class="text-center"> <?php echo remove_junk($product['supplie']); ?></td>-->
              <!--  <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>
                    <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-trash"></span>
                    </a>
                  </div>
                </td>
              </tr>
             <?php endforeach; ?>
            </tbody>
          </tabel>
        </div>
      </div>
    </div>
  </div>-->






 
  <?php foreach ($products as $product):?>
    <div class="sm:w-3/5 w-4/5 mx-auto">
        
        <h1 class="pt-20 sm:text-5xl md:text-7xl text-4xl font-bold text-center">
           <?php echo remove_junk($product['name']); ?>
        </h1>

        <div class="py-10 text-center">
            <div class="inline-block sm:pt-1">
                <h2 class="font-bold">
                    For:  <?php echo remove_junk($product['categorie']); ?>
                </h2>

                <p class="text-sm text-gray-600">
                    <?php echo display_msg($msg); ?>
                </p>
            </div>
        </div>

      
        <?php if($product['media_id'] === '0'): ?>
                    <img class="rounded-xl w-full shadow-xl" src="uploads/products/no_image.png" alt="///">
                  <?php else: ?>
                  <img class="rounded-xl w-full shadow-xl" src="uploads/products/<?php echo $product['image']; ?>" alt="///">
                <?php endif; ?>

        <p class="text-xl py-6">
           <?php echo remove_junk($product['description']); ?>
        </p>

         <p class="text-xl py-6">
           At <?php echo read_date($product['date']); ?>
        </p>
       
       <?php endforeach; ?>

    </div>

  <?php include_once('layouts/footer.php'); ?>






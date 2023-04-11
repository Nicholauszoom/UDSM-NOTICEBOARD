<?php
  $page_title = 'All annoucements ';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
  $products = join_product_table();
   $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
?>
<?php include_once('layouts/header.php'); ?>
 <div class="row">
  <!--    <div class="col-md-12">
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
               <!-- <td class="text-center"> <?php echo read_date($product['date']); ?></td>
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




    <div class="w-4/5 m-auto text-center">
        <div class="py-12 border-b border-gray-200">
            <h1 class="text-6xl pt-12 pb-8">
                Recent Posts <?php  echo $c_product['total']; ?>
            </h1>

            <span class="font-light text-gray-500 italic">
                 <?php echo display_msg($msg); ?>
            </span>
        </div>
    </div>

   
        
    
    
    <div class="md:grid lg:grid-cols-3 gap-20 w-4/5 mx-auto py-15 ">
        <!-- Review Item -->
        <?php foreach ($products as $product):?>
            <div class="text-center pt-8 pb-4">
              
                 <?php if($product['media_id'] === '0'): ?>
                    <img class="shadow-xl rounded-md" src="uploads/products/no_image.png" alt="">
                  <?php else: ?>
                  <img class="shadow-xl rounded-md" src="uploads/products/<?php echo $product['image']; ?>" alt="">
                <?php endif; ?>

                <h2 class="text-gray-700 font-bold text-3xl py-2">
                   <?php echo remove_junk($product['name']); ?>
                </h2>

                <span class="text-gray-500">
                    For <span class="italic text-sm text-gray-800"> <?php echo remove_junk($product['categorie']); ?>
                </span>
                 <span class="text-gray-500">
                    At <span class="italic text-sm text-gray-800"><?php echo read_date($product['date']); ?>
                </span>

                <p class="text-base text-gray-700 pt-4 pb-10 leading-8 font-light">
                    <?php echo remove_junk($product['description']); ?>
                </p>

                <a href="show_annoucement.php?id=<?php echo (int)$product['id'];?>" class="uppercase border border-gray-500 text-gray-600 text-lg py-4 px-12 rounded transition transition-all hover:bg-gray-800 hover:text-white">
                    Keep Reading
                </a>
            </div>
         <?php endforeach; ?>
    </div>





  <?php include_once('layouts/footer.php'); ?>





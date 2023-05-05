
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

    <div class="mx-auto w-4/5 my-8">
            <a 
                href="add_product.php" 
                class="uppercase border border-gray-500 text-lg py-4 px-6 rounded transition transition-all bg-gray-800 text-white hover:bg-white hover:text-gray-800">
                Create New Post
            </a>
        </div>
        
    
    
    <div class="md:grid lg:grid-cols-3 gap-20 w-4/5 mx-auto py-15 ">
        <!-- Review Item -->
        <?php foreach ($products as $product):?>
            <div class="text-center pt-8 pb-4">
              
                 <?php if($product['media_id'] === '0'): ?>
                    <img class="shadow-xl rounded-md" src="uploads/products/no_image.png" alt="image not found">
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

               
         <a 
                href="edit_product.php?id=<?php echo (int)$product['id'];?>"
                class="bg-green-500 font-bold py-2 px-4 rounded transition-all hover:bg-green-300">
                Edit Post
            </a>

      
              <a 
                href="delete_product.php?id=<?php echo (int)$product['id'];?>"
                class="bg-red-500 font-bold py-2 px-4 ml-6 rounded transition-all hover:bg-red-300">
                Delete Post
            </a>

      
            </div>
         <?php endforeach; ?>
    </div>





  <?php include_once('layouts/footer.php'); ?>





  <?php include_once('layouts/footer.php'); ?>
























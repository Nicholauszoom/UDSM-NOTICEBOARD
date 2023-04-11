<?php
  $page_title = 'All ';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
  $products = find_by_id('products',(int)$_GET['id']);
  $all_categories = find_by_id('categories',(int)$_GET['id']);
    $product= join_product_table();
    $all_photo=find_all('media');

   if(!$products){
    $session->msg("d","Missing course id.");
    redirect('annoucement.php');
  }
?>



<?php include_once('layouts/header.php'); ?>
  <div class="row">



    <div class="sm:w-3/5 w-4/5 mx-auto">
        
        <h1 class="pt-20 sm:text-5xl md:text-7xl text-4xl font-bold text-center">
           <?php echo remove_junk($products['name']); ?>
        </h1>

        <div class="py-10 text-center">
            <div class="inline-block sm:pt-1">
                <h2 class=" font-bold" >
                    For: 
                       <?php echo remove_junk($products['categorie_id']); ?>
                     
               </h2>

                <p class="text-sm text-gray-600">
                    <?php echo display_msg($msg); ?>
                </p>
            </div>
        </div>

      
       

            
                    

        <p class="text-xl py-6">
           <?php echo remove_junk($products['description']); ?>
        </p>

         <p class="text-xl py-6">
           At <?php echo read_date($products['date']); ?>
        </p>
       


    </div>

  <?php include_once('layouts/footer.php'); ?>






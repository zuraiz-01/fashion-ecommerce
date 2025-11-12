 <?php include "header.php";
 include"../config.php" ?>
 
<!-- product section -->
<section class="product_section layout_padding">
   <div class="container">
      <div class="heading_container heading_center">
         <h2>
            Our <span>products</span>
         </h2>
      </div>
      <div class="row">
         <?php 
         $select = "Select * from products inner join category on products.c_id = category.id";
         $result = mysqli_query($conn,$select);
         while($row=mysqli_fetch_array($result))
         {?>
          <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="" class="option1">
                     <?php echo $row['c_name']?>
                     </a>
                     <a href="viewproducts.php?Id=<?php echo $row['id']?>" class="option2">
                        Read More
                     </a>
                  </div>
               </div>
               <div class="img-box">
                  <img src="../admin/Products/<?php echo $row['p_image'] ?>" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     <?php echo $row['p_name']?>
                  </h5>

                  <h6>
                     <?php echo $row['p_price']?>
                  </h6>
               </div>
            </div>
         </div>
          <?php
         }
         ?>
        
        
      </div>
     
   </div>
</section>
<!-- end product section -->
 <?php include "footer.php"?>

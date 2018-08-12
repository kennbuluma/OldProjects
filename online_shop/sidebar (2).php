<?php 
 include 'scripts/db_connection.php';

?>

      <!-- Search -->
      <div class="box search">
        <h2>Search by <span></span></h2>
        <div class="box-content">
          <form action="search.php" method="post">
            <label>Item Name</label>
            <input type="text" class="field"  name="ItemName"/>
            <label>Category</label>
            <select name="CategoryName" id="CategoryName" class="field">
              <option value="">-- Select Category --</option>
              <?php

       $sql="select * from categories";

       $sql_row=mysql_query($sql);

       while($sql_res=mysql_fetch_assoc($sql_row))

       {

       ?>

       <option value="<?php echo $sql_res["Category_Name"]; ?>"><?php echo $sql_res["Category_Name"]; ?></option>

       <?php

       }

       ?>

    </select>
    <label>Subcategory</label>
            <select class="field" name="SubCategoryName">
              <option value="">-- Select Subcategory --</option>
              <?php

       $sql="select * from subcategories";

       $sql_row=mysql_query($sql);

       while($sql_res=mysql_fetch_assoc($sql_row))

       {

       ?>

       <option value="<?php echo $sql_res["Subcategory_Name"]; ?>"><?php echo $sql_res["Subcategory_Name"]; ?></option>

       <?php

       }

       ?>

    </select>
         
            <input type="submit" class="search-submit" value="Search" name="search" />
          
          </form>
        </div>
      </div>
      <!-- End Search -->
      <!-- Categories -->
      <div class="box categories">
        <h2>Categories <span></span></h2>
        <div class="box-content">
          <ul>
          <?php echo $categoriesDisplay; ?>
          
          </ul>
        </div>
      </div>
      <!-- End Categories -->
      <div class="box categories">
        <h2>Subcategories <span></span></h2>
        <div class="box-content">
          <ul>
          <?php echo $SubcategoriesDisplay; ?>
          
          </ul>
        </div>
      </div>
   
   
   

﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/category.php';?>
<?php include '../classes/product.php';?>
<?php
$pd=new product();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit']) ){
   
   $insertProduct=$pd->insert_product($_POST,$_FILES);
}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Them san pham</h2>
        <div class="block">
        <?php
                    if(isset($insertProduct)){
                        echo $insertProduct;
                    }
                ?>               
         <form action="productadd.php" method="POST" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="productName" placeholder="Enter Product Name..." class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="category">
                            <option>---Select Category---</option>
                            <?php
                                $cat=new category();
                                $catlist=$cat->show_category();
                                if($catlist){
                                    while($result=$catlist->fetch_assoc()){

                                   
                            ?>
                            <option value="<?php echo $result['catID']?>"><?php echo $result['catName']?></option>
                            <?php
                                 }
                                }
                            ?>
                            
                        </select>
                    </td>
                </tr>
				<!-- <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="select">
                            <option>Select Brand</option>
                            <option value="1">Brand One</option>
                            <option value="2">Brand Two</option>
                            <option value="3">Brand Three</option>
                        </select>
                    </td>
                </tr> -->
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="mota"></textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" name="price" placeholder="Enter Price..." class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="size">
                            <option>Select Size</option>
                            <option value="1">S</option>
                            <option value="2">M</option>
                            <option value="3">L</option>
                        </select>
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>




    <div class="container">
 <br /><br />
 <div class="row">
 <div class="col-lg-6 col-md-6">
  <h3 align="center">รายชื่อผู้รับการเลือกตั้ง</h3>
  <div class="row">
   
   <?php
   foreach($candidate as $row)
   {
    echo '
    <div class="col-md-4" style="padding:16px; background-color:#f1f1f1; border:1px solid #ccc; margin-bottom:16px; height:350px" align="center">
     <img src="'.base_url().'uploads/img/'.$row->picture.'" class="img-thumbnail" /><br />
     <h4>'.$row->candidate_name.'</h4>
     <h3 class="text-danger">'.$row->c_number.'</h3>
     <input type="text" name="quantity" class="form-control quantity" id="'.$row->id.'" /><br /> 
     <button type="button" name="add_cart" class="btn btn-success add_cart" data-productname="'.$row->candidate_name.'" data-price="'.$row->c_number.'" data-productid="'.$row->id.'" />Add to Cart</button>
    </div>
    ';
   }
   ?>
      
  </div>
 </div>
 <div class="col-lg-6 col-md-6">
  <div id="cart_details">
   <h3 align="center">ยังไม่ได้เลือกผู้สมัคร</h3>
  </div>
 </div>
 
 </div>

</div>

<script>
$(document).ready(function(){
 
 $('.add_cart').click(function(){
  var vote_id = $(this).data("productid");
  var candidate_name = $(this).data("productname");
  var product_price = 10; //$(this).data("price");
  var quantity = $('#' + vote_id).val();
  console.log(vote_id + ' = ' + candidate_name + ' = ' + product_price );
  if(quantity != '' && quantity > 0)
  {
   $.ajax({
    url:"<?php echo base_url(); ?>vote_cart/add",
    method:"POST",
    data:{product_id:vote_id, product_name:candidate_name, product_price:product_price, quantity:quantity},
    success:function(data)
    {
     alert("Product Added into Cart");
     $('#cart_details').html(data);
     $('#' + vote_id).val('');
    }
   });
  }
  else
  {
   alert("Please Enter quantity");
  }
 });

 $('#cart_details').load("<?php echo base_url(); ?>vote_cart/load");

 $(document).on('click', '.remove_inventory', function(){
  var row_id = $(this).attr("id");
  if(confirm("Are you sure you want to remove this?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>vote_cart/remove",
    method:"POST",
    data:{row_id:row_id},
    success:function(data)
    {
     alert("Product removed from Cart");
     $('#cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

 $(document).on('click', '#clear_cart', function(){
  if(confirm("Are you sure you want to clear cart?"))
  {
   $.ajax({
    url:"<?php echo base_url(); ?>vote_cart/clear",
    success:function(data)
    {
     alert("Your cart has been clear...");
     $('#cart_details').html(data);
    }
   });
  }
  else
  {
   return false;
  }
 });

});
</script>


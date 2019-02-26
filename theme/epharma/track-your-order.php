<?php include ("header.php"); ?>
  <div class="container main-container col1-layout">
    <div class="row main">
      <div class="span12 col-main without-sidebar">
        <div class="page-title">
          <h1>Track Order</h1>
        </div>
        <div class="block-content">
          <form id="oar_widget_orders_and_returns_form" action="http://www.khaadionline.com/pk/sales/guest/view/" method="post" class="search-form" name="guest_post">
            <ul class="form-alt">
              <li style="clear:both;">
                <div class="input-box" style="float:left;width:150px;">
                  <label for="oar_order_id" class="required">Order ID <em>*</em></label>
                </div>
                <div class="input-box" style="float:left;width:305px;">
                  <input class="input-text required-entry" id="oar_order_id" name="oar_order_id" style="width:300px;" type="text">
                </div>
              </li>
              <!--<li style="clear:both;">
               <div class="input-box">
                   .
                </div>
           </li>--> 
              <!--<li style="clear:both;">
               <div class="input-box" style="float:left;width:150px;">
                   <label for="oar_billing_lastname" class="required"> <em>*</em></label>
               </div>
               <div class="input-box" style="float:left;width:305px;">
                   <input type="text" class="input-text required-entry" id="oar_billing_lastname" name="oar_billing_lastname"  style="width:300px;"/>
               </div>
           </li>--> 
              <!-- <li style="clear:both;">
               <div class="input-box" style="float:left;width:150px;">
                   <label class="required"></label>
               </div>
               <div class="input-box" style="float:left;width:305px;">
                   <select name="oar_type" id="quick_search_type_id" class="select guest-select" title="" onchange="showIdentifyBlock(this.value);">
                       <option value="email">Email Address</option>
                       <option value="zip">ZIP Code</option>
                   </select>
               </div>
           </li>-->
              <input name="oar_type" value="email" type="hidden">
              <li id="oar-email" style="clear:both;">
                <div class="input-box" style="float:left;width:150px;">
                  <label for="oar_email" class="required">Email Address <em>*</em></label>
                </div>
                <div class="input-box" style="float:left;width:305px;">
                  <input class="input-text validate-email required-entry" id="oar_email" name="oar_email" style="width:300px;" type="text">
                </div>
              </li>
              <!-- <li id="oar-zip" style="display:none;clear:both;">
               <div class="input-box" style="float:left;width:150px;">
                   <label for="oar_zip" class="required"> <em>*</em></label>
               </div>
               <div class="input-box" style="float:left;width:305px;">
                   <input type="text" class="input-text required-entry" id="oar_zip" name="oar_zip" style="width:300px;"/>
               </div>
           </li>-->
              <li style="clear:both;">
                <div class="input-box" style="float:left;text-align:right;">
                  <button type="submit" title="Continue" class="button"><span><span>Continue</span></span></button>
                </div>
              </li>
            </ul>
          </form>
        </div>
        <script type="text/javascript">
//<![CDATA[
    if ($('quick_search_type_id').value == 'zip') {
        $('oar-zip').show();
        $('oar-email').hide();
    } else {
       $('oar-zip').hide();
       $('oar-email').show();
    }

   var dataForm = new VarienForm('oar_widget_orders_and_returns_form', true);

   function showIdentifyBlock(id)
   {
       if (id == 'zip') {
           $('oar-zip').show();
           $('oar-email').hide();
       } else if (id == 'email') {
           $('oar-zip').hide();
           $('oar-email').show();
       }
       return false;
   }
//]]>
</script> 
      </div>
    </div>
  </div>
  <?php include ("footer.php"); ?>

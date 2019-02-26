<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
            <li><a href="{{ url('admin') }}"><i class="fa fa-home"></i> Dashboard </a></li>
            <li><a href="{{ url('admin/category') }}"><i class="fa fa-chain"></i> Category </a></li>
            <li><a><i class="fa fa-product-hunt"></i> Product <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/product') }}">Product List</a></li>
                    <li><a href="{{ url('admin/product/create') }}">Add Product</a></li>
                </ul>
            </li>
            <li><a><i class="fa fa-archive"></i> Attribute <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/attribute') }}">Attribute List</a></li>
                    <li><a href="{{ url('admin/brand-list') }}">Brand List</a></li>
                </ul>
            </li>

            <li><a><i class="fa fa-shopping-cart"></i> Order <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/order') }}">Order List</a></li>
                  <li><a href="{{ url('admin/order/create') }}">Create Order</a></li> 
                </ul>
            </li>

            <li><a><i class="fa fa-shopping-cart"></i> Shipping <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/shipping') }}">Shipping List</a></li>
                    <li><a href="{{ url('admin/dhaka-shipping') }}">Inside Dhaka Shipping List</a></li>
                </ul>
            </li>


            <li>
                <a>
                    <i class="fa fa-users" aria-hidden="true"></i> 
                    User <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/user') }}">User List</a></li>
                    <li><a href="{{ url('admin/user/create') }}">Create User</a></li>
                </ul>
            </li>


            <li>
                <a>
                    <i class="fa fa-users" aria-hidden="true"></i> 
                    Pharmacy <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/pharmacy') }}">Pharmacy List</a></li>
                    <li><a href="{{ url('admin/pharmacy/create') }}">Create Pharmacy</a></li>
                </ul>
            </li>

                <li>
                <a>
                    <i class="fa fa-users" aria-hidden="true"></i> 
                    Tag <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/tag') }}">Tag List</a></li>
                    <li><a href="{{ url('admin/tag/create') }}">Create tag</a></li>
                </ul>
            </li>

            <li>
                <a>
                    <i class="fa fa-users" aria-hidden="true"></i> 
                    Admin Operators <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/adminoperator') }}">Operator List</a></li>
                    <li><a href="{{ url('admin/adminoperator/create') }}">Add New Operator</a></li>
                </ul>
            </li>

             <li>
                <a>
                    <i class="fa fa-users" aria-hidden="true"></i> 
                    Doctor <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/doctor') }}">Doctor List</a></li>
                    <li><a href="{{ url('admin/doctor/create') }}">Add Doctor</a></li>
                </ul>
            </li>

 <li>
                <a>
                    <i class="fa fa-users" aria-hidden="true"></i> 
                    Delivery Man<span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/deliveryman/create') }}">Delivery Man Addition</a></li>
                    <li><a href="{{ url('admin/deliveryman') }}">Delivery Man list</a></li>
                </ul>
            </li>

         

               <li>
                <a>
                    <i class="fa fa-users" aria-hidden="true"></i> 
                    PromoCodes <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/promocodes') }}">PromoCode List</a></li>
                    <li><a href="{{ url('admin/promocodes/create') }}">Add New Promocode</a></li>
                </ul>
            </li>



            <li>
                <a>
                    <i class="fa fa-picture-o" aria-hidden="true"></i>
                    Media <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/media') }}">Media List</a></li>
                    <li><a href="{{ url('admin/media/create') }}">New Media</a></li>
                </ul>
            </li>


            <li>
                <a>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    Settings <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                    <li><a href="{{ url('admin/settings/frontpage') }}">Frontpage</a></li>
    
                    <li><a href="{{ url('admin/deliverytype') }}">Deliverytype & Charges</a></li>
                </ul>
            </li>

                  <li>
                <a>
                    <i class="fa fa-users" aria-hidden="true"></i> 
                    More <span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
                     <li><a href="{{ url('admin/hospital') }}">Hospital</a></li>
                    <li><a href="{{ url('admin/ambulance') }}">Ambulance</a></li>
                        <li><a href="{{ url('admin/deliverysurvey') }}">Delivery Survey</a></li>
                        
                </ul>
            </li>

            
            <li><a href="{{ url('admin/menu') }}"><i class="fa fa-navicon"></i> Menu </a></li>
            
            <li><a href="{{ url('admin/inquiry') }}"><i class="fa fa-info-circle"></i>Product inquiry List</a></li>
            
            <li><a href="{{ url('admin/prescription') }}"><i class="fa fa-archive"></i> Uploaded Prescription List </a></li>
            
            <li><a href="{{ url('admin/review-list') }}"><i class="fa fa-comment"></i> Review List </a></li>
 
        </ul>
    </div>

</div>
<!-- /sidebar menu -->
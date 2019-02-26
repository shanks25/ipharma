@include('adminoperatorslayouts.header')
 

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Admin Operator</h3>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="x_content">
                    <table id="todays-order-table" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
         @include('includes.messages')
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph x_panel">
                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>New User Request</h3>
                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="x_content">
                    <table id="callme-table" class="table table-hover">
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> 
@include('adminoperatorslayouts.footer')
 
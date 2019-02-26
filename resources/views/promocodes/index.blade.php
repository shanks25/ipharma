@include('layouts.header')

 
 
           <div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
             <div class="box-body">
               <center class="content-header">
      <h1>
        DiscountCodes page
        
      </h1>
       @include('includes.messages')
      
    </center><br><br>
                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard table-responsive">
                                    <table class="table table-striped table-bordered file-export">
                                        <thead>
                                            <tr>
                                                <th>S.no</th>
                                                <th>Code</th>
                                                <th>Code Type</th>
                                                <th>Discount</th>
                                                <th>Expiration</th>
                                                <th>Status</th>
                                                 <th>Edit</th>
                                                 <th>Delete</th>    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($Promocodes as $key=>$Promocode)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $Promocode->promo_code }}</td>
                                                    <td>{{ $Promocode->promocode_type }}</td>
                                                    <td>{{ $Promocode->discount }}</td>
                                                    <td>{{ $Promocode->expiration }}</td>
                                                    
                                                    <td>
                                                        {{ $Promocode->status }}
                                                    </td>
                                                   <td><a href="{{ route('promocodes.edit',$Promocode->id) }}"> <i class="fa fa-fw fa-edit"></i></a> </td> 
    
    <td>
      <form id="delete-form-{{$Promocode->id}}" method="post" action="{{ route('promocodes.destroy',$Promocode->id) }}" style="display: none;">

                       {{csrf_field()}}

                       {{method_field('DELETE')}}

                    </form>

                  <a href="" onclick="if(confirm('Are You Sure you want to delete this?'))
                  {event.preventDefault();document.getElementById('delete-form-{{$Promocode->id}}').submit();

                }
                else{
                  
                  event.preventDefault();

                }"><i class="fa fa-fw fa-trash"></i></a></td> 
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- File export table -->


                 <!-- Menu List Modal Starts -->
    <div class="modal fade text-xs-left" id="menu-list">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="myModalLabel1">Menu List</h2>
                </div>
                <div class="modal-body">
                    <div class="row m-0">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">
                                            <div class="bg-img order-img" style="background-image: url(../assets/img/product-1.jpg);"></div>
                                        </th>
                                        <td>Burger Bistro</td>
                                        <td>$100</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn grey btn-outline-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>  
    <!-- Menu List Modal Ends -->
@include('layouts.footer')
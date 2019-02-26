@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Edit Adminoperator</h2></center> 
    
    </section>


            @include('includes.messages')   
   <form role="form" action="{{ route('adminoperator.update',$adminoperator->id) }}" method="post">
 {{csrf_field()}}
   {{ method_field('PATCH') }}
              <div class="box-body">
              <div class="col-lg-offset-3 col-lg-6">
                <div class="form-group">
                  <label for="name">adminoperator Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$adminoperator->name}}" required>
                </div>
 
    
                 <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$adminoperator->email}}" required>
                </div>
 
                         
    <div class="form-group">
 <label for="status">Status</label>
 <select name="status">
                    <option selected disable>Select Status</option>
<option value="1" @if ($adminoperator->status == 1)
{{'selected'}}
 @endif>Enabled</option>
<option value="0" @if ($adminoperator->status == 0)
{{'selected'}}
 @endif>Disabled</option>
</select>
</div>
 
 
 
                           
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="#" class="btn btn-warning">Back</a>
              </div>
               </div>
          
        </div>

            </form>

    </div>
</div>
  

@include('layouts.footer')
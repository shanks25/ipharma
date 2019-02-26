@include('layouts.header')
 
<div class="right_col" role="main">
    <div class="row">
          <section class="content-header">
    <center> <h2>
Edit Discount Code</h2></center> 
    
    </section>


            @include('includes.messages')   
            <form role="form" method="POST" action="{{ route('promocodes.update',$Promocode->id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group{{ $errors->has('promo_code') ? ' has-error' : '' }}">
                    <label for="promo_code">Promo Code</label>

                    <input id="promo_code" type="text" class="form-control" name="promo_code" value="{{ old('promo_code',$Promocode->promo_code) }}" required autofocus>

                    @if ($errors->has('promo_code'))
                    <span class="help-block">
                        <strong>{{ $errors->first('promo_code') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                    <label for="promo_code">Discount</label>

                    <input id="discount" type="text" class="form-control" name="discount" value="{{ old('discount', $Promocode->discount) }}" required >

                    @if ($errors->has('discount'))
                    <span class="help-block">
                        <strong>{{ $errors->first('discount') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('promocode_type') ? ' has-error' : '' }}">
                    <label for="status">Promocode Type</label>

                    <select class="form-control" id="promocode_type" name="promocode_type">
                        <option value="amount"  @if($Promocode->promocode_type == 'amount')  selected @endif >Amount</option>
                        <option value="percent" @if($Promocode->promocode_type == 'percent')  selected @endif >Percent</option>
                    </select>

                    @if ($errors->has('promocode_type'))
                        <span class="help-block">
                            <strong>{{ $errors->first('promocode_type') }}</strong>
                        </span>
                    @endif
                </div>
                 <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                    <label for="status">Promocode Type</label>

                    <select class="form-control" id="status" name="status">
                        <option value="ADDED" @if($Promocode->status == 'ADDED')  selected @endif >ADDED</option>
                        <option value="EXPIRED" @if($Promocode->status == 'EXPIRED')  selected @endif >EXPIRED</option>
                    </select>

                    @if ($errors->has('status'))
                        <span class="help-block">
                            <strong>{{ $errors->first('status') }}</strong>
                        </span>
                    @endif
                </div>
                 <div class="form-group{{ $errors->has('expiration') ? ' has-error' : '' }}">
                    <label for="expiration">Expaire Date</label>

                    <input id="expiration" type="date" class="form-control datepicker" data-date-format="yyyy-mm-dd" name="expiration" value="{{ old('expiration', $Promocode->expiration) }}" required >

                    @if ($errors->has('expiration'))
                    <span class="help-block">
                        <strong>{{ $errors->first('expiration') }}</strong>
                    </span>
                    @endif
                </div>
                 <div class="col-xs-12 mb-2">
                    <a href="{{ route('promocodes.index') }}" class="btn btn-warning mr-1">
                        <i class="ft-x"></i> Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-check-square-o"></i> Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
 
 
<link rel="stylesheet" href="{{ asset('assets/admin/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}">
 

 
<script type="text/javascript" src="{{ asset('assets/admin/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript">
    $('.datepicker').datepicker();
</script>
 @include('layouts.footer')

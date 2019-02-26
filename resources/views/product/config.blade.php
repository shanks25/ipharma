@include('layouts.header')

<!-- page content -->
<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Form Wizards <small>Sessions</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    
                    {{ Form::open(['url' => 'admin/product']) }}
                    <table class="table table-hover">
                        @inject('attributes', 'Epharma\Model\Attribute')
                        
                        @foreach($attributes->all() as $attribute)
                        <tr>
                            <td width="10%" > <input type="checkbox" name="{{ $attribute->id }}"> </td>
                            <td> {{ $attribute->title }} </td>
                        </tr>
                        @endforeach

                    </table>
                    {{ Form::close() }}

                    <button id="attribute-select" class="btn btn-primary pull-right">Next</button>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->


@push('scripts')
    <script>
        $('#attribute-select').on('click', function() {
            var data = $('form').serialize();

            $.ajax({
                url: 'admin/product/config',
                type: 'post',
                data: data
            })  
        });        
    </script>
@endpush

@include('layouts.footer')

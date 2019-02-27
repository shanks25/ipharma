<div class="container-fluid" style="position: relative">
    <div class="row search">
        <style>
            .search-box{
                width: 100%;
                position: relative;
                display: inline-block;
                font-size: 14px;
            }
            .result {
                position: absolute;
                z-index: 99;
                top: 100%;
                left: 135px;
                background: #FFF;
            }
            .search-box input[type="text"], .result{
                width: 100%;
                box-sizing: border-box;
            }
            .result{
                width: 45%;
                box-sizing: border-box;
            }
            .result table {
                width: 100%;
            }
            /* Formatting result items */
            .result table tr{
                margin: 0;
                padding: 7px 10px;
                border: 1px solid #CCCCCC;
                border-top: none;
                cursor: pointer;
            }
            .result table tr td:first-child{
                width: 10%;
                padding: 10px 0;
            }
            .result table tr td:nth-child(2){
                width: 75%;
            }
            .result table tr td:nth-child(2):hover{
                background: #f2f2f2;
            }
        </style>
        <div style="background-color: #f0f0ed; width: 100%; padding: 5px 0;">
            <div class="container">
                <div class="col-sm-9 text-center" style="border-right: 1px solid #777;">
                    <div class="col-sm-9">
                        <div class="serchtile"></div>
                        
                        <input type="text" id="example-ajax-post" placeholder="Search here..." class="form-control"/>
                        <input type="hidden" id="example-ajax-token" value="{{csrf_token()}}"/>
                    </div>
                    
                </div>
         
            </div>
        </div>
        <div id="search-results" class="result"></div>
    </div>
</div>
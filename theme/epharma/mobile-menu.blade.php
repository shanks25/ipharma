<ul id="nav" class="mobileMenu menutype2">

	@if(option('menu'))
		@foreach(option('menu') as $menu)
	    <li class="level0 nav-1 level-top parent noImage"> 
	    	<a href="{{ $menu->customSelect }}" class="level-top"> <span> {{ $menu->title }} </span> </a>

			@if(isset($menu->children))
	        <ul class="level0">
				@foreach( $menu->children as $menu)
	            	<li class="level1"> 
	            		<a href="{{ $menu->customSelect }}"> 
	            			<span>{{$menu->title}}</span> 
	            		</a>
	            	</li>
	    		@endforeach
	        </ul>
	        @endif
	    </li>
	    @endforeach
	@else
		
		<li class="level0 nav-1 level-top parent noImage"> 
	    	<a href="{{ url('/') }}" class="level-top"> <span> Home </span> </a>
	    </li>		

    @endif

</ul>






{{-- <ul id="nav" class="mobileMenu menutype2">
    <li class="level0 nav-1 level-top first parent"> <a href="category.php" class="level-top"> <span>New Arrivals</span> </a>
        <ul class="level0">
            <li class="level1 nav-1-1 first"> <a href="category.php"> <span>Women</span> </a> </li>
            <li class="level1 nav-1-2"> <a href="category.php"> <span>Man</span> </a> </li>
            <li class="level1 nav-1-3 last"> <a href="category.php"> <span>Kids</span> </a> </li>
        </ul>
    </li>
</ul> --}}











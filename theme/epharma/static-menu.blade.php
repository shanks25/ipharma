<ul id="nav" class="desktopMenu menutype2">
	@if(option('menu'))
		@foreach(option('menu') as $menu)
	    <li class="level0 nav-1 level-top parent noImage"> 
	    	<a href="{{ $menu->customSelect }}" class="level-top"> <span> {{ $menu->title }} </span> </a>

			@if(isset($menu->children))
	        <ul class="level0">
				@foreach($menu->children as $menu)
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
    @endif
</ul>
 <!-- Position it -->
  	<div style="position: absolute; top: 150px; right: 18px; width: 26%; position: fixed;">
    	<!-- Then put toasts within -->
    	<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="60000">
      		<div class="toast-header">
      			<i class="fa fa-shopping-cart m-r-10"></i>
	        	<span class="text-dark mr-auto">Cart</span>
	        	<small class="text-muted">just now</small>
	        	<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	     	</div>
	      	<div class="toast-body">
	        	Item '{{ $product->name }}' is added to your Cart! <br><br>
	        	<a href="{{ route('cart.index') }}" class="text-muted" style="text-decoration: underline;">Go to Cart</a>
	      	</div>
    	</div>
  	</div>
	
	 <!-- Position it -->
  	<div style="position: absolute; top: 150px; right: 18px; width: 26%; position: fixed;">
    	<!-- Then put toasts within -->
    	<div class="toast" id="failedToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="60000">
      		<div class="toast-header">
      			<i class="fa fa-shopping-cart m-r-10"></i>
	        	<span class="text-dark mr-auto">Cart</span>
	        	<small class="text-muted">just now</small>
	        	<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	     	</div>
	      	<div class="toast-body">
	        	Item '{{ $product->name }}' is already in your Cart! <br><br>
	        	<a href="{{ route('cart.index') }}" class="text-muted" style="text-decoration: underline;">Go to Cart</a>
	      	</div>
    	</div>
  	</div>

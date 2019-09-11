@if (Session::has('success'))
    <div style="position: absolute; top: 120px; right: 18px; width: 26%; position: fixed; z-index: 999;">
    	<!-- Then put toasts within -->
    	<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="6000">
      		<div class="toast-header">
	        	<span class="text-dark mr-auto">Success!</span>
	        	<small class="text-muted">Just now</small>
	        	<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	     	</div>
	      	<div class="toast-body">
	        	{{ Session::get('success') }}
	      	</div>
    	</div>
  	</div>
@endif

@if (count($errors) > 0)
    <!-- Position it -->
   <div style="position: absolute; top: 120px; right: 18px; width: 26%; position: fixed; z-index: 999;">
       <!-- Then put toasts within -->
       <div class="toast" id="failedToast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="6000">
           <div class="toast-header">
               <span class="text-dark mr-auto">Error!</span>
               <small class="text-muted">Just now</small>
               <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
               </button>
           </div>
           <div class="toast-body">
               <ul class="list-unstyled">
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
               </ul>
           </div>
       </div>
   </div>
@endif

@if (Session::has('warning'))
    <div style="position: absolute; top: 120px; right: 18px; width: 26%; position: fixed; z-index: 999;">
    	<!-- Then put toasts within -->
    	<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="6000">
      		<div class="toast-header">
	        	<span class="text-dark mr-auto">Warning</span>
	        	<small class="text-muted">Just now</small>
	        	<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
	          		<span aria-hidden="true">&times;</span>
	        	</button>
	     	</div>
	      	<div class="toast-body">
	        	{{ Session::get('warning') }}
	      	</div>
    	</div>
  	</div>
@endif

$( document ).ready(function() {

	$('.carousel').carousel({
	  interval: 8000
	});

	$('.thumbA').click(function(){
	    $urlImg = $(this).attr('data-url');
	    $titleImg = $(this).attr('title');
	    $modal = $(this).attr('data-modal');
	    $('.modal-title').html( $titleImg );
	    $('.img-modal').attr('src', $urlImg );
	    $('#myModal').attr('data-modal', $modal );
	  	$('#myModal').modal({show:true});
	});

	$('#next-btn').click(function() {
		$modal =  $('#myModal').attr('data-modal');
		var cont = $( "a.thumbA" ).length;
		if( $modal < cont ){
		
			var m = parseInt($modal)+1;
			$titleImg = $("a[data-modal='"+m+"']").attr('title');
			$urlImg = $("a[data-modal='"+m+"']").attr('data-url');
	    	
	    	$('.modal-title').html( $titleImg );
	  		$('.img-modal').attr('src', $urlImg );
	    	$('#myModal').attr('data-modal', m );

		}else{
			$modal = 1;
			$titleImg = $("a[data-modal='"+$modal+"']").attr('title');
			$urlImg = $("a[data-modal='"+$modal+"']").attr('data-url');

			$('.modal-title').html( $titleImg );
	  		$('.img-modal').attr('src', $urlImg );
	    	$('#myModal').attr('data-modal', $modal );
		}


	});

	$('#prev-btn').click(function() {
		$modal =  $('#myModal').attr('data-modal');
		var cont = $( "a.thumbA" ).length;
		if( $modal > 1 ){
			
			$modal = $modal-1;
			$titleImg = $("a[data-modal='"+$modal+"']").attr('title');
			$urlImg = $("a[data-modal='"+$modal+"']").attr('data-url');
	    	
	    	$('.modal-title').html( $titleImg );
	  		$('.img-modal').attr('src', $urlImg );
	    	$('#myModal').attr('data-modal', $modal );

		}else{
			$modal = cont;
			$titleImg = $("a[data-modal='"+$modal+"']").attr('title');
			$urlImg = $("a[data-modal='"+$modal+"']").attr('data-url');

			$('.modal-title').html( $titleImg );
	  		$('.img-modal').attr('src', $urlImg );
	    	$('#myModal').attr('data-modal', $modal );
		}
	});
});

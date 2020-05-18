$("body").prepend('<input  type="hidden" id="tabc" value="0" />');
$(".root").addClass('newtab0');
function goto(targetUrl,b=0)
{
    var nt=$('#tabc').val();
    nt=parseFloat(nt);
    $('.newtab'+nt).hide();
    nt=$('#tabc').val();
    nt=parseFloat(nt);
    if(b==0)
        {
    nt=nt+1;
        }
    else{
        nt=nt-1;
    }
    $('#tabc').val(nt);
    $("body").prepend('<div class="newtab'+nt+'" ></div>'); 

       $.ajax({
        	url: targetUrl,
			
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
                var x= $(data).filter('.root');
			$('.newtab'+nt).html(x); 
                //alert(nt);
		    },
		  	error: function() 
	    	{
	    	} 	        
	   }); 
    //$('.newtab'+nt).load(targetUrl+' .root'); 
    $('.newtab'+nt).show();
    if(b==0)
        {
    window.history.pushState({url: "" + targetUrl + ""}, "", targetUrl);
        }
}

window.onpopstate = function(e) {

    var nt=$('#tabc').val();
    nt=parseFloat(nt);
    $('.newtab'+nt).hide();
    
    $('.newtab'+nt).html("");
    $('.newtab'+nt).remove();
    
    nt=$('#tabc').val();
    nt=parseFloat(nt);
   
    nt=nt-1;
    var exists=$('body .newtab'+nt).length;
    
    if(exists)
        {
    $('#tabc').val(nt);
    $('.newtab'+nt).show(); 
        }
    else
        {
              nt=parseFloat(nt);
            //console.log(window.location.pathname);
            goto(window.location.pathname,b=1);
              //alert(window.location.pathname);
        }
};
function goback()
{
  window.history.go(-1);
}
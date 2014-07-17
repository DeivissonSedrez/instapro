$(document).ready(function(){
	var base = $("#base").val();

	$(".upload-avatar").on('click', function(e){
		e.preventDefault();
		$("#PessoasAvatar").trigger('click');
	});

	$("#PessoasAvatar").fileupload({
        url: base+"/pessoas/previewAvatar",
        dataType: 'json',
        disableImageResize: /Android(?!.*Chrome)|Opera/
	        .test(window.navigator && navigator.userAgent),
	    imageMaxWidth: 102,
	    imageMaxHeight: 102,
	    imageCrop: false,
	    success: function(data){
	    	if(data.status){
	    		$("#userAvatar").fadeOut('fast',function(){
	    			$("#userAvatar").attr('src', 'data:image/png;base64,'+data.image);
	    			$("#PessoasAvatarPath").val(data.path);
	    		});
	    	}
	    },
        done: function (e, data) {
        	$("#userAvatar").fadeIn('fast');
        	$("#PessoasUserAvatarAdded").val(1);
        }
    });

    $("#PessoaFisicaSexo").on('change', function(){
    	var added = $("#PessoasUserAvatarAdded").val(); 
    	var gender = $(this).val();
    	console.log(added);
    	if(added != '1'){
    		if(gender == 'M'){
    			$("#userAvatar").fadeOut('fast', function(){
    				$("#userAvatar").attr('src', base+'/img/avatar-m.jpg');
    				$("#userAvatar").fadeIn('fast');
    			});
    			return false;
    		}
    		$("#userAvatar").fadeOut('fast', function(){
				$("#userAvatar").attr('src', base+'/img/avatar-f.jpg');
				$("#userAvatar").fadeIn('fast');
			});
    	}
    	return false;
    });
})
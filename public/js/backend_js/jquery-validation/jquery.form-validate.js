$(document).ready(function(){
	// Form Validation
    $("#add_page").validate({
		ignore: [],
		 debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_title:{
				required:true,
				
			},
			v_desc:{
				required:function(textarea) {
          CKEDITOR.instances[textarea.id].updateElement(); // update textarea
          var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
          return editorcontent.length === 0;
        }
				
			},
			v_metatitle:{
				required:true,
				
			},
			v_metadescription:{
				required:true,
				
			},
			v_metakeyword:{
				required:true,
			
			},
			i_order:{
			number:true,
			}
		},
		errorClass: "errorlte",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {
			$(element).parents('.form-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents('.form-group').removeClass('error');
			$(element).parents('.form-group').addClass('success');
		}
	});
});
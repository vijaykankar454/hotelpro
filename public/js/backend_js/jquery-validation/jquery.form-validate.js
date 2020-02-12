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

		// Form Validation
	$("#add_team").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_email: {
				email: true

			},
			v_website: {
				url: true
			},
			v_designation:{
				required:true,
				
			},
			v_photo:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			v_banner:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
			},
			v_description:{
				required:function(textarea) {
				CKEDITOR.instances[textarea.id].updateElement(); // update textarea
				var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
				return editorcontent.length === 0;
				}
				
			},
	
		
		},
		messages: {

			v_photo: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},
			v_banner: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},

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

	$("#edit_team").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_email: {
				email: true

			},
			v_website: {
				url: true
			},
			v_designation:{
				required:true,
				
			},
			v_photo:{
			
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			v_banner:{
				
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
			},
			v_description:{
				required:function(textarea) {
				CKEDITOR.instances[textarea.id].updateElement(); // update textarea
				var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
				return editorcontent.length === 0;
				}
				
			},
	
		
		},
		messages: {

			v_photo: {
			
				accept: "Only image type jpg/png/jpeg is allowed"
			},
			v_banner: {
			
				accept: "Only image type jpg/png/jpeg is allowed"
			},

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

	// Form Validation
	$("#add_slider").validate({
		ignore: [],
			debug: false,
		rules:{
			v_photo:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			
		},
		messages: {
			v_photo: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
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
	// Form Validation
	$("#edit_slider").validate({
		ignore: [],
			debug: false,
		rules:{
			v_photo:{
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			
		},
		messages: {
			v_photo: {
				accept: "Only image type jpg/png/jpeg is allowed"
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


	$("#add_testimonial").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_designation:{
				required:true,
				
			},
			v_photo:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			v_comment:{
				required:true,
				
			},
		
		},
		messages: {

			v_photo: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},
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
	$("#edit_testimonial").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_designation:{
				required:true,
				
			},
			v_photo:{
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			v_comment:{
				required:true,
				
			},
		
		},
		messages: {

			v_photo: {
				accept: "Only image type jpg/png/jpeg is allowed"
			},
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

	$("#add_client").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_url:{
				url:true,
				
			},
			v_photo:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
		},
		messages: {

			v_photo: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},
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

	$("#edit_client").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_url:{
				url:true,
				
			},
			v_photo:{
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
		},
		messages: {

			v_photo: {
				accept: "Only image type jpg/png/jpeg is allowed"
			},
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

	// Form Validation
	$("#add_destination").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			
			v_photo:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			v_banner:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
			},
			
		},
		messages: {

			v_photo: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},
			v_banner: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},

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

	// Form Validation
	$("#edit_destination").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			
			v_photo:{
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			v_banner:{
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
			},
			
		},
		messages: {

			v_photo: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},
			v_banner: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},

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


	// Form Validation
	$("#add_service").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_short_description:{
				required:true,
				
			},
			v_desc:{
				required:function(textarea) {
				CKEDITOR.instances[textarea.id].updateElement(); // update textarea
				var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
				return editorcontent.length === 0;
				}
				
			},
			v_icon:{
				required:true,
				
			},
			v_photo:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			v_banner:{
				required: true,
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
			},
			
	
		
		},
		messages: {

			v_photo: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},
			v_banner: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},

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

	// Form Validation
	$("#edit_service").validate({
		ignore: [],
			debug: false,
		rules:{
			v_name:{
				required:true
			},
			v_short_description:{
				required:true,
				
			},
			v_desc:{
				required:function(textarea) {
				CKEDITOR.instances[textarea.id].updateElement(); // update textarea
				var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
				return editorcontent.length === 0;
				}
				
			},
			v_icon:{
				required:true,
				
			},
			v_photo:{
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
				
			},
			v_banner:{
				accept:"jpg,png,jpeg,JPG,PNG,JPEG",
			},
			
	
		
		},
		messages: {

			v_photo: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},
			v_banner: {
				required: "Please upload image",
				accept: "Only image type jpg/png/jpeg is allowed"
			},

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

	// Form Validation
	$("#add_faq").validate({
		ignore: [],
			debug: false,
		rules:{
			v_title:{
				required:true
			},
			v_desc:{
				required:function(textarea) {
				CKEDITOR.instances[textarea.id].updateElement(); // update textarea
				var editorcontent = textarea.value.replace(/<[^>]*>/gi, ''); // strip tags
				return editorcontent.length === 0;
				}
				
			},
		},
		messages: {
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
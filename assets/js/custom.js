$(document).ready(function(){
 
    $("a.delete").click(function(e){
        if(!confirm('Are you sure you want to delete this item?')){
            e.preventDefault();
            return false;
        }
        return true;
    });

    $('#category').change(function(e){
		var cat_id = $(this).val();
		$.post( base_url + 'administrator/dropdown_subcategories', { cat_id: cat_id }, function(data) {
			console.log(data);
			$('#subcategory').append('<option value="">Loading..Please Wait</option>');
			$('#subcategory').empty();
			$('#subcategory').append('<option value="">Please Select Subcategory</option>');
            var result = $.parseJSON( data );
            $.each(result, function (index, value){
            	$('#subcategory').append('<option value="'+value.sub_id+'">'+value.sub_name+'</option>'); 
            });
        });
	});

    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd'
    });

    $('.title').keyup(function(e){
        var title = $(this).val();
        title = title.toLowerCase();
        title = title.replace(/[^a-zA-Z0-9]+/g,'-');
        $('.slug').val(title);
    });

});    
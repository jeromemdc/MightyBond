$(document).ready(function() {

    function createCallback( i ){
        return function(){
            $("#upload-photo" + i).html('');
            $("#imageform" + i).ajaxForm({
                target: '.upload-photo' + i,
                success: function(data) { 
                    if(data.charAt(0) == 1){
                        console.log(data);
                    }else{
                        if(data.indexOf("did not select") != -1) {
                            console.log(1);
                        } else {
                            console.log(data);
                        }
                    }    
                }
            }).submit();
        }
    }

    $(document).ready(function(){
        for(var i = 1; i <= 3; i++) {
            $('#photoimg' + i).on('change', createCallback( i ) );
        }
    });

});

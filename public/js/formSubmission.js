$(document).ready(function(){
    $(".navigationAjax").on("click", function(){
        event.preventDefault();
        url = this.href;
        console.log("ajax ",url);
        //loading.show();
        customAjax(url);
    });
    
    $(document).on('submit', 'form', function(event){	//GENERIC form submit function
	event.preventDefault();
        var form_id = "#" + $(this).closest("form").attr("id");
	var form_data = new FormData(this);
	//var form_data = $(this).serialize();
        var url = $(form_id).attr("action");
        //console.log("form data - ", form_data);
        $.ajax({
            url : url,
            type : "POST",
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            //headers : {"Api-Key": "1234"},
            data : form_data,
            success : function(data){
                console.log("loaded");
                $("#replacable").empty();
                $("#replacable").html(data);
            },
            error : function(XMLHttpRequest, textStatus, errorThrown){ 
                console.log("Status: " + textStatus + ", Error: " + errorThrown); 
            }
        });
    });
    
    function customAjax(url){
        $.ajax({
            url:url,
            type:"GET",
            success:function(data){
                //loading.hide();
                $("#replacable").empty();
                $("#replacable").html(data);
            },
            error:function(){
                //loading.hide();
                alert("Internal Server Error! please try after some time")
            }
        });	
    }
});
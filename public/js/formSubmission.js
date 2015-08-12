$(document).ready(function(){
    $(".navigationAjax").on("click", function(){
        event.preventDefault();
        url = this.href;
        //console.log("ajax ",url);
        //loading.show();
        customAjax(url);
    });
    
    $("#replacable").on("keyup", "#applicantId", function(event){
        if((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 46)
        {
            search_key = $.trim($("#applicantId").val());
            if(search_key != "")
            {
                $.ajax({
                    url : "applicant/autofill",
                    type : "POST",
                    //headers : {"Api-Key": "1234"},
                    data : {"applicantId" : search_key},

                    success : function(data){
                        response = JSON.parse(data);
                        if(response.status == "success"){
                            console.log(response.data);
                            $("#applicantList").empty();
                            for(var i=0; i<response.data.length; i++)
                            {
                                $("#applicantList").append("<option value='" + "#" + response.data[i].id + " - " + response.data[i].name + " " + response.data[i].businessTitle + "'>");
                            }
                        }
                        else{
                            console.log("Error : ", response.data);
                            $("#applicantList").empty();
                            $("#applicantList").append("<option value='" + response.data + "'>");
                        }
                    },

                    error : function(XMLHttpRequest, textStatus, errorThrown){ 
                        console.log("Status: " + textStatus + ", Error: " + errorThrown); 
                    }  
                });
            }
        }
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
                //console.log("loaded");
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
$(document).ready(function(){
    var BASE_URL = "../index.php";
    
    $(".navigationAjax").on("click", function(){
        event.preventDefault();
        url = this.href;
        //console.log("ajax ",url);
        //loading.show();
        customAjax(url);
    });
    
    $("#replacable").on("click", "#lookupBtn", function(event){
        $("#lookupApplicantModal").modal("show");
    });
    
    $("#replacable").on("click", "#applicantListingTable tr", function(event){
        //populate modal text fields here, then show it
        $.ajax({
            url : BASE_URL + "/applicant/getthis",
            type : "POST",
            //headers : {"Api-Key": "1234"},
            data : {"applicantId" : $(this).attr("id")},
            success : function(data){
                //console.log(data);
                $("#replacable").empty();
                $("#replacable").html(data);
                /*data = JSON.parse(data);
                if(data.status == "success"){
                    //console.log(data);
                    $("#editApplicantModal #name").val(data.data.name);
                    $("#editDealModal #shortDesc").val(data.data.shortDesc);
                    $("#editDealModal #longDesc").val(data.data.longDesc);
                    $("#editDealModal #pseudoViews").val(data.data.pseudoViews);
                    $("#editDealModal #region").val(data.data.region);
                    
                    var now = new Date(data.data.expiresOn.date.substring(0,data.data.expiresOn.date.indexOf(' ')));
                    var day = ("0" + now.getDate()).slice(-2);
                    var month = ("0" + (now.getMonth() + 1)).slice(-2);
                    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;
                    $("#editDealModal #expiresOn").val(today);
                    $("#editDealModal").modal('show');
                }*/
            },
           
            error : function(XMLHttpRequest, textStatus, errorThrown){ 
                console.log("Status: " + textStatus + ", Error: " + errorThrown); 
            }  
        });
        $("#editApplicantModal").modal("show");
    });
    
    $("#replacable").on("keyup", "#lookupApplicant", function(event){
        if((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 65 && event.keyCode <= 90) || event.keyCode == 8 || event.keyCode == 46)
        {
            search_key = $.trim($("#lookupApplicant").val());
            if(search_key != "")
            {
                url = BASE_URL + "/applicant/autofill";
                $.ajax({
                    url : url,
                    type : "POST",
                    //headers : {"Api-Key": "1234"},
                    data : {"applicantId" : search_key},

                    success : function(data){
                        response = JSON.parse(data);
                        if(response.status == "success"){
                            //console.log(response.data);
                            $("#lookupApplicantTable").empty();
                            for(var i=0; i<response.data.length; i++)
                            {
                                $("#lookupApplicantTable").append("<tr id='" + response.data[i].id + "'><td>" + response.data[i].id + "</td><td>" + response.data[i].name + "</td><td>" + response.data[i].businessTitle + "</td><td>" + response.data[i].city + "</td></tr>");
                            }
                        }
                        else{
                            //console.log("Error : ", response.data);
                            $("#lookupApplicantTable").empty();
                            $("#lookupApplicantTable").append("<tr id='0'><td colspan='4'>" + response.data + "</td></tr>");
                        }
                    },

                    error : function(XMLHttpRequest, textStatus, errorThrown){ 
                        console.log("Status: " + textStatus + ", Error: " + errorThrown); 
                    }  
                });
            }
        }
    });
    
    $("#replacable").on("click", "#lookupApplicantTable > tr", function(){
        $("#applicantLookup").val($(':nth-child(2)', this).html() + " - " + $(':nth-child(3)', this).html());
        $("#selectedApplicantId").val($(this).attr("id"));
        $("#lookupApplicantModal").modal("hide");
    });
    
    $(document).on('submit', 'form', function(event){	//GENERIC form submit function
	event.preventDefault();
        var form_id = "#" + $(this).closest("form").attr("id");
	var form_data = new FormData(this);
	//var form_data = $(this).serialize();
        var url = BASE_URL + $(form_id).attr("action");
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
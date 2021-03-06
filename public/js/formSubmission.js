$(document).ready(function(){
    var BASE_URL = "../index.php";
    
    $(document).ajaxStart(function(){
        $("#progress_container").fadeIn(300)
    }).ajaxStop(function(){
        $("#progress_container").fadeOut(300)
    });
    
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
    
    $("#replacable").on("click", "#docLookupBtn", function(event){
        if($("#fileLookup").val() != ""){
            $.ajax({
                url : BASE_URL + "/document/viewstatus",
                type : "POST",
                //headers : {"Api-Key": "1234"},
                data : {"fileNo" : $("#fileLookup").val()},
                success : function(data){
                    //console.log(data);
                    try{
                        response = JSON.parse(data);
                        $("#documentTable").empty();
                        if(response.status == "success"){
                            $("#applicantName").empty().html(response.applicant);
                            for(var i=0; i<response.data.length; i++)
                            {
                                var recOn = "";
                                if(response.data[i].receiveDate != ""){
                                    recOn = response.data[i].receiveDate.date.substring(0, response.data[i].receiveDate.date.indexOf(' '));
                                }
                                $("#documentTable").append("<tr id='" + response.data[i].id + "'><td>" + response.data[i].name + "</td><td>" + "<select id='statusList" + response.data[i].id + "'><option value='Received'>Received</option><option value='Pending'>Pending</option><option value='Not Required'>Not Required</option>" + "</select>" + "</td><td>" + recOn + "</td></tr>");
                                $("#statusList" + response.data[i].id + " option").each(function(){
                                    if($(this).text()== response.data[i].status)
                                        $(this).attr('selected','selected');
                                });
                            }
                        }
                        else
                            $("#documentTable").append("<tr><td colspan='3'>Invalid File No.</td></tr>");
                        $("#docStatus").fadeIn(200);
                    }catch(Ex)
                    {
                        console.log("Exception occured. ", Ex);
                    }
                },

                error : function(XMLHttpRequest, textStatus, errorThrown){ 
                    console.log("Status: " + textStatus + ", Error: " + errorThrown); 
                }  
            });
        }
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
                $("#editApplicantModal").modal("show");
                $("#editApplicantModal").on("hidden.bs.modal", function(event){customAjax("applicant/getall");});
            },
           
            error : function(XMLHttpRequest, textStatus, errorThrown){ 
                console.log("Status: " + textStatus + ", Error: " + errorThrown); 
            }  
        });
        //$("#editApplicantModal").modal("show");
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
                                $("#lookupApplicantTable").append("<tr id='" + response.data[i].id + "'><td>" + response.data[i].name + "</td><td>" + response.data[i].businessTitle + "</td><td>" + response.data[i].mobile + "</td><td>" + response.data[i].city + "</td></tr>");
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
        $("div[class='modal']").modal("dismiss");
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
                $('.modal-backdrop').fadeOut(400);
                $("#replacable").empty();
                $("#replacable").html(data);
                $("html, body").animate({ scrollTop: 0 }, "slow");
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
$(document).ready(function(){
    /*$(document).ajaxStart(function(){
        $("#progress_container").fadeIn(300)
    }).ajaxStop(function(){
        $("#progress_container").fadeOut(300)
    });*/
    
    
    function getStatusButton(status){
        if(status == 0)
            return "<span class='label label-danger'>Suspend</span>";
        if(status == 1)
            return "<span class='label label-success'>Active</span>";
        if(status == 2)
            return "<span class='label label-warning'>Pending</span>";
        if(status == 3)
            return "<span class='label label-primary'>Hidden</span>";
    }
    
    function checkLogin(){
        $.ajax({
            url : "login",
            type : "POST",
            //headers : {"Api-Key": "1234"},
            
            success : function(data){
                //console.log(data);
                //data = JSON.parse(data);
                /*$("#dealTable").empty();
                data.data.deals.map(function(deal){
                    $("#dealTable").append("<tr id='" + deal.id + "'><td>" + "<img src='" + imagePath + deal.thumbnailImg + "' width = '30px' height = '30px'>" + "</td><td>" + deal.name + "</td><td>" + deal.category + "</td><td>" + deal.region + "</td><td>" + deal.views + "</td><td>" + deal.expiresOn.date.substring(0,deal.expiresOn.date.indexOf(' ')) + "</td><td>" + getStatusButton(deal.status) + "</td></tr>");
                });*/
            },
           
            error : function(XMLHttpRequest, textStatus, errorThrown){ 
                console.log("Status: " + textStatus + ", Error: " + errorThrown); 
            }
        });
    }
    checkLogin();
    
    $("form").submit(function(event){	//GENERIC form submit function
	event.preventDefault();
        var form_id = "#" + $(this).closest("form").attr("id");
	var form_data = new FormData(this);
	//var form_data = $(this).serialize();
        var url = $(form_id).attr("action");
        //console.log("form data - ", form_data);
        $.ajax({
            url : BASE_URL + url,
            type : "POST",
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            headers : {"Api-Key": "1234"},
            data : form_data,
            success : function(data){
                console.log(data);
                response = JSON.parse(data);
                if(response.status == "success"){
                    //console.log(response.data[0]);
                    $(form_id + "_success").text(response.data[0]).fadeIn(2000);
                }
                else{
                    $(form_id + "_danger").text("Error Code #" + response.message.Code + ", " + response.message.Title).fadeIn(2000);
                }
                $(form_id + "input[type='reset']").trigger("click");
            },
           
            error : function(XMLHttpRequest, textStatus, errorThrown){ 
                console.log("Status: " + textStatus + ", Error: " + errorThrown); 
            }
        });
    });
});
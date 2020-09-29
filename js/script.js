$(document).ready(function () {
    // insert
    $('#submit_form').parsley();
    $('#submit_form').on('submit', function (e) {
        e.preventDefault();
        if ($('#submit_form').parsley().isValid()) {
            //alert($('#submit_form').serialize());
            // console.log($('#submit_form').serialize());
            //$('#response').html($('#submit_form').serialize());
            $.ajax({
                url: "insert.php",
                method: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                //cache:false,  
                processData: false,
                success: function (data) {
                    //console.log(data);
                    //console.log(data.status);
                    if (data.status == true) {
                        $('#submit_form').trigger('reset');
                        $(".preview_img").attr("src", "");
                        $("#show_preview").hide();
                        $("#alert").show();
                        $("#message").html(data.message);
                        $('#myModal').modal('hide');
                        load_all_data();
                    }
                }
            });
        }
    });
    // fetch
    function load_all_data() {
        $("tbody").html("");
        $.ajax({
            url: 'http://localhost/core_php/my_modern_ajax_crud/fetch.php',
            dataType: 'json',
            type: 'GET',
            success: function (data) {
                //console.log(data);
                if (data.status == false) {
                    $("tbody").append("<b>" + data.message + "</b>");
                }
                else {
                    var i = 1;
                    $.each(data, function (key, value) {
                        $("tbody").append("<tr>" +
                            "<td><input type='checkbox' value="+value.id+"></td>"+
                            "<td>" + i + "</td>" +
                            "<td>" + value.name + "</td>" +
                            "<td>" + value.age + "</td>" +
                            "<td>" + value.gender + "</td>" +
                            "<td>" + value.designation + "</td>" +
                            "<td>" + value.age + "</td>" +
                            "<td><button type='button' class='btn btn-primary' id='btn_edit' data-eid='" + value.id + "'data-toggle='modal' data-target='#myeditModal'>Edit</button></td>" +
                            "<td><button type='button' name='delete' id='btn_delete' data-eid='" + value.id + "'class='btn btn-danger'>Delete</button></td>" +
                            "</tr>");
                        i++;
                    });

                }
            }
        });
    }
    load_all_data();


    // fetch single
    $(document).on("click", "#btn_edit", function () {
        var empid = $(this).data("eid");

        $.ajax({
            url: "single.php",
            type: "POST",
            data: { id: empid },
            dataType: "json",
            success: function (data) {
                //console.log(data);
                $("#update_id").val(data[0].id);
                $("#update_name").val(data[0].name);
                $("#update_address").val(data[0].address);
                if (data[0].gender == 'M') {
                    $("#male").prop("checked", true);
                }
                else {
                    $("#male").prop("checked", false);
                }
                if (data[0].gender == 'F') {
                    $("#female").prop("checked", true);
                }
                else {
                    $("#female").prop("checked", false);
                }
                //console.log(data[0].designation);
                $("#update_designation option[value='" + data[0].designation + "']").attr('selected', 'selected');
                $("#update_age").val(data[0].age);
                $("#fetch_photo").attr('src', 'images/' + data[0].images + '');
                //$("#update_age").val(data[0].name);
                //$("#edit_submit_form").html(data);
            }
        });
    });
    // update
    $('#edit_submit_form').parsley();
    $('#edit_submit_form').on('submit', function (e) {
        e.preventDefault();
        if ($('#edit_submit_form').parsley().isValid()) {
            //alert($('#edit_submit_form').serialize());
            // console.log($('#edit_submit_form').serialize());
            //$('#response').html($('#edit_submit_form').serialize());
            $.ajax({
                url: "update.php",
                method: "POST",
                dataType: "JSON",
                data: new FormData(this),
                contentType: false,
                //cache:false,  
                processData: false,
                success: function (data) {
                    //console.log(data);
                    //console.log(data.status);
                    if (data.status == true) {
                        $("#alert").show();
                        $("#message").html(data.message);
                        $('#myeditModal').modal('hide');
                        load_all_data();
                    }
                    else if(data.status == false) {
                        alert(data.message);
                    }
                }
            });
        }
    });
    // delete
    $(document).on("click","#btn_delete", function(){
        if(confirm("Do you really want to delete this")){
          var empid=$(this).data("eid");

          $.ajax({
                url:"delete.php",
                type:"POST",
                dataType:"json",
                data:{id:empid},
                success : function(data){
                    if(data.status==true){ 
                        $("#alert").show();
                        $("#message").html(data); 
                        loadtable();
                    }   
                }
           });
        }  
    }); 
    // multiple delete
    $(document).on("click","#multiple_delete", function(){
        var id=[];
        
        //// Converted all checked checkbox's value into Array
        $(":checkbox:checked").each(function(key){
            id[key]=$(this).val();
        });
        if(id.length==0){
            alert("Please select atleast one checkbox");
        }
        else{
            if(confirm("Do u really want to delete this")){
                //console.log(id);
                $.ajax({
                    url:"multiple_delete.php",
                    type:"POST",
                    data:{id:id},
                    success:function(data){
                        console.log(data);
                        if(data.status==true){
                            $("#alert").show();
                            $("#message").html(data);
                            loadtable();
                        }
                        
                    }
                });
            }
            
        }
    });
});
// preview 
function previewFile(input) {
    $(".show_preview").show();
    //console.log(input);
    var file = $("input[type=file]").get(0).files[0];
    //console.log(file);
    if (file) {
        var reader = new FileReader();
        //console.log(reader);
        reader.onload = function () {
            $(".preview_img").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}
function changepreviewFile(input) {
    //$(".show_preview").show();
    //console.log(input);
    var file = $('#image_file')[0].files[0];
    //console.log(file);
    if (file) {
        var reader = new FileReader();
        //console.log(reader);
        //console.log(reader.result);
        reader.onload = function () {
            $(".preview_img").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}
// preview delete
function hide_preview() {
    $(".show_preview").hide();
    $(".photo").val('');
}



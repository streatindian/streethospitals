$(document).ready(function () {
    $(".select2").select2({});
    $("#country").select2({});
    $("#state").select2({});
    $("#city").select2({});
    $("#country").on("change", function () {
        var countryId = $(this).val();
        $.ajax({
            url: base_url + '/get-states',
            type:"GET",
            data:{country:countryId},
            success:function(res){
                // $("#state").select2('data',res)
                $("#state").empty().select2({
                    data: res
                });
            },error:function(){
                alert('error');
            }
        });
    });

    $("#state").on("change", function () {
        var stateId = $(this).val();
        $.ajax({
            url: base_url + '/get-city',
            type:"GET",
            data:{state_id:stateId},
            success:function(res){
                // $("#state").select2('data',res)
                $("#city").empty().select2({
                    data: res
                });
            },error:function(){
                alert('error');
            }
        });
    });

    $("#role").select2({});
});



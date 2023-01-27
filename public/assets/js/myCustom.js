$(document).ready(function () {
    $(".select2").select2({});
    $(".country").select2({});
    $(".state").select2({});
    $(".city").select2({});
    $(".country").on("change", function () {
        var countryId = $(this).val();
        hitOnCountryChange(countryId);
    });



    $(".state").on("change", function () {
        var stateId = $(this).val();
        hitOnStateChange(stateId);
    });

    $("#role").select2({});
});


function hitOnCountryChange(countryId,selectedStateId=null,selectedCityId=null){
    console.log(countryId,selectedStateId,selectedCityId);
    $.ajax({
        url: base_url + '/get-states',
        type:"GET",
        data:{country:countryId},
        success:function(res){
            // $(".state").select2('data',res)
            $(".state").empty().select2({
                data: res
            });
            if(selectedStateId){
                $(".state").val(selectedStateId).trigger('change');
                hitOnStateChange(selectedStateId,selectedCityId)
                // $(".state").val(selectedStateId).trigger('change');
            }
        },error:function(){
            alert('error');
        }
    });
}

function hitOnStateChange(stateId,selectedId=null){
    $.ajax({
        url: base_url + '/get-city',
        type:"GET",
        data:{state_id:stateId},
        success:function(res){
            // $(".state").select2('data',res)
            $(".city").empty().select2({
                data: res
            });
            if(selectedId){
                $(".city").val(selectedId).trigger('change');
            }
        },error:function(){
            alert('error');
        }
    });
}


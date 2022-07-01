let total_bru = document.getElementById('total_brut');
let npay = document.getElementById('n_pay');
if(parseFloat(total_bru.innerText) < 0){
    total_bru.style.color = 'red';
}
if(parseFloat(npay.innerHTML)>0){
    npay.style.color = "red";
}


function searchNp(valuen, valuen1, valuen2, valuen3, valuen4, valuen5, valuen6){
    $.ajax({
        type : 'get',
        url : URL('/searchDashboardNp'),
        data:{'valuen': valuen, 'valuen1': valuen1, 'valuen2': valuen2,'valuen3' :valuen3, 'valuen4': valuen4, 'valuen5': valuen5, 'valuen6': valuen6},
        success:function(data){
            $('#outputsn').html(data);
        }
    });
}

function searchp(value, value1, value2, value3, value4, value5, value6){
    $.ajax({
        type : 'get',
        url : URL('/searchDashboardP'),
        data:{'value': value, 'value1': value1, 'value2': value2,'value3' :value3, 'value4': value4, 'value5': value5, 'value6': value6},
        success:function(data){
            $('#outputs').html(data);
        }
    });
}


$('#idFactureP').keyup(function(){
    value=$(this).val();
    value1 = $('#typeFactP').val();
    value2 = $('#typeSecP').val();
    value3 = $('#monthP').val();
    value4 = $('#idResP').val();
    value5 = $('#bAtimentP').val();
    searchp(value, value1, value2, value3, value4, value5);
});
$('#typeFactP').on('change',function(){
    value=$('#idFactureP').val();
    value1 = $(this).val();
    value2 = $('#typeSecP').val();
    value3 = $('#monthP').val();
    value4 = $('#idResP').val();
    value5 = $('#bAtimentP').val();
    searchp(value, value1, value2, value3, value4, value5);
});
$('#typeSecP').on('change',function(){
    value=$('#idFactureP').val();
    value1 = $('#typeFactP').val();
    value2 = $(this).val();
    value3 = $('#monthP').val();
    value4 = $('#idResP').val();
    value5 = $('#bAtimentP').val();
    searchp(value, value1, value2, value3, value4, value5);
});
$('#monthP').on('change',function(){
    value=$('#idFactureP').val();
    value1 = $('#typeFactP').val();
    value2 = $('#typeSecP').val();
    value3 = $(this).val();
    value4 = $('#idResP').val();
    value5 = $('#bAtimentP').val();
    searchp(value, value1, value2, value3, value4, value5);
});
$('#idResP').keyup(function (){
    value=$('#idFactureP').val();
    value1 = $('#typeFactP').val();
    value2 = $('#typeSecP').val();
    value3 = $('#monthP').val();
    value4 = $(this).val();
    value5 = $('#bAtimentP').val();
    searchp(value, value1, value2, value3, value4, value5);
});
$('#bAtimentP').on('change',function (){
    value=$('#idFactureP').val();
    value1 = $('#typeFactP').val();
    value2 = $('#typeSecP').val();
    value3 = $('#monthP').val();
    value4 = $('#idResP').val();
    value5 = $(this).val();
    searchp(value, value1, value2, value3, value4, value5);
});







$('#idFactureNp').keyup(function(){
    value=$(this).val();
    value1 = $('#typeFactNp').val();
    value2 = $('#typeSecNp').val();
    value3 = $('#monthNp').val();
    value4 = $('#idResNp').val();
    value5 = $('#bAtimentNp').val();
    searchNp(value, value1, value2, value3, value4, value5);
});
$('#typeFactNp').on('change',function(){
    value=$('#idFactureNp').val();
    value1 = $(this).val();
    value2 = $('#typeSecNp').val();
    value3 = $('#monthNp').val();
    value4 = $('#idResNp').val();
    value5 = $('#bAtimentNp').val();
    searchNp(value, value1, value2, value3, value4, value5);
});
$('#typeSecNp').on('change',function(){
    value=$('#idFactureNp').val();
    value1 = $('#typeFactNp').val();
    value2 = $(this).val();
    value3 = $('#monthNp').val();
    value4 = $('#idResNp').val();
    value5 = $('#bAtimentNp').val();
    searchNp(value, value1, value2, value3, value4, value5);
});
$('#monthNp').on('change',function(){
    value=$('#idFactureNp').val();
    value1 = $('#typeFactNp').val();
    value2 = $('#typeSecNp').val();
    value3 = $(this).val();
    value4 = $('#idResNp').val();
    value5 = $('#bAtimentNp').val();
    searchNp(value, value1, value2, value3, value4, value5);
});
$('#idResNp').keyup(function (){
    value=$('#idFactureNp').val();
    value1 = $('#typeFactNp').val();
    value2 = $('#typeSecNp').val();
    value3 = $('#monthNp').val();
    value4 = $(this).val();
    value5 = $('#bAtimentNp').val();
    searchNp(value, value1, value2, value3, value4, value5);
});
$('#bAtimentNp').on('change',function (){
    value=$('#idFactureNp').val();
    value1 = $('#typeFactNp').val();
    value2 = $('#typeSecNp').val();
    value3 = $('#monthNp').val();
    value4 = $('#idResNp').val();
    value5 = $(this).val();
    searchNp(value, value1, value2, value3, value4, value5);
});

        //VALIDACIONES DE FORMULARIO VIA AJAX
$(function(){   

    $("input").blur(function(){
   //tomo el atributo for del label de cada elemento
   var formElementId = $(this).attr('name'); 
   //tomo el nombre del formulario
   var form = $("form").last().attr('name');
   doValidation(formElementId,form);
    });
    $("textarea").blur(function(){
   //tomo el atributo for del label de cada elemento
   var formElementId = $(this).parent().prev().find('label').attr('name'); 
   //tomo el nombre del formulario
   var form = $("form").last().attr('name');
   doValidation(formElementId,form);
    });
}); 
function doValidation(id,form)
{
    var currenturl = window.location.pathname;
    var mca = currenturl.split('/');
    //var url = 'http://dominiolocal/async/validarform';
   var url = 'http://dominioremoto/async/validarform';
   //por cada uno, serializo el valor con el nombre en un array
   var data ={};
   $("input").each(function()
   {
       //serializacion..
       data[$(this).attr('name')] = $(this).val();
   });
   $("textarea").each(function(){
       data[$(this).attr('name')] = $(this).val();
   });
   data['form'] = form;
   data['mca'] = mca;
   $.post(url,data, function(resp)
{
    if (resp[id] === undefined){
        $("#"+id).popover('destroy');
        $("#"+id).parent().removeClass('has-error');
        $("#"+id).parent().addClass('has-success');
    }else{
    $("#"+id).parent().removeClass('has-success');
    $("#"+id).parent().addClass('has-error');
    getErrorHtml(resp[id], id);
    }
},'json');
}

function getErrorHtml(formErrors,id)
{
  
    for(errorKey in formErrors)
        {   
            $("#"+id).popover('destroy');
            $("#"+id).popover({content: formErrors[errorKey]});
            $("#"+id).popover('show');
        }
    
    /*var output = '<td id="errors-'+id+'" class="errors">';
    for(errorKey in formErrors)
        {
            output += formErrors[errorKey];
        }
    output += '</td>';

    return output;*/
}

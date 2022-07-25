function isValidEmail(input_fields, onLoad)
{
    let szEmail = $("#" + input_fields).val();
    if(szEmail=='' || szEmail=='undefined')
    {
        if(onLoad==1)
        {
            $("#" + input_fields).addClass('red_border');
        }
        return false;
    }
    else
    {
        szEmail = jQuery.trim(szEmail);
        var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
        if (filter.test(szEmail))
        {
            $("#" + input_fields).removeClass("red_border");
            return true;
        }
        else
        {
            if(onLoad==1)
            {
                $("#" + input_fields).addClass('red_border');
            }
            return false;
        }
    }
}

function isFormInputElementEmpty(inputElementId) 
{	
    var field_value=$("#"+inputElementId).val();
    console.log("Value: " + field_value + " inputElementId: " + inputElementId);
    if((jQuery.trim(field_value) == ""))
    {
        return true;
    }
    else 
    {
        return false;
    }
}

function onBlur(kEevent,input_fields)
{
    if(isFormInputElementEmpty(input_fields))
    {
        $("#"+input_fields).addClass('red_border');
    }
    else 
    {
        $("#" + input_fields).removeClass("red_border");
    }
}

function submit_details_popup(kEevent,onLoad)
{  
    var requiredFieldsAry = new Array(); 
    requiredFieldsAry['0'] = 'szFirstName';
    requiredFieldsAry['1'] = 'szLastName';
    requiredFieldsAry['2'] = 'szEmail';
    requiredFieldsAry['3'] = 'szPhoneNumber';  
    //requiredFieldsAry['4'] = 'szGoogleAddress';   
    console.log(requiredFieldsAry);
    var formId = 'qr-code-register-form';
    var error = 1;
    $.each( requiredFieldsAry, function( index, input_fields ){
        if(isFormInputElementEmpty(input_fields))
        {		 
            if(onLoad==1)
            {
                //$("#"+input_fields).addClass('red_border');
                console.log("Empty Field: "+input_fields);
            }
            error++;  
        } 
    }); 

    if(error==1 && !isValidEmail("szEmail"))
    {
        if(onLoad==1)
        {
            $("#szEmail").addClass('red_border');
            console.log("Invalid Field: szEmail");
        }
        error++; 
    } 

    if(error==1 && !isMobileNumber("szPhoneNumber"))
    {
        if(onLoad==1)
        {
            $("#szPhoneNumber").addClass('red_border');
            console.log("Invalid Field: szPhoneNumber");
        }
        error++; 
    }  

    console.log("error: " + error);
    if(parseInt(error)==1)
    {
        $("#qr-code-register-button").unbind("click");
        $('#qr-code-register-button').attr('style','opacity:1');
        $("#qr-code-register-button").click(function(){ submitCustomerDetailsForm(); });
        if(kEevent.which == 13)
        {
            submitCustomerDetailsForm();
        } 
    }
    else
    {
        $("#qr-code-register-button").unbind("click");
        $('#qr-code-register-button').attr('style','opacity:0.4;');
    }
}

function submitCustomerDetailsForm()
{
    $("#qr-code-register-button").unbind("click");
    $('#qr-code-register-button').attr('style','opacity:0.4;'); 
    let arRequestParams = {
        "mode": 'SUBMIT_QR_CODE_CUSTOMER_FORM',
        "szFirstName": $("#szFirstName").val(),
        "szLastName": $("#szLastName").val(),
        "szEmail": $("#szEmail").val(),
        "szPhoneNumber": $("#szPhoneNumber").val(),
        "szAddress": $("#szGoogleAddress").val(),
    };
    console.log(arRequestParams);
    $.post("lottery/addQRCode.php?mode=SUBMIT_QR_CODE_CUSTOMER_FORM",arRequestParams,function(result){
        var resArr=result.split("||||");
        if(resArr[0]=='SUCCESS')
        {
            console.log("Successfully Added...");
            $("#add-details-popup").html(result);
        }
        else if(jQuery.trim(resArr[0])=='ERROR')
        {
            $("#qr-code-register-button").unbind("click");
            $('#qr-code-register-button').attr('style','opacity:1');
            $("#qr-code-register-button").click(function(){ submitCustomerDetailsForm(); });
        } 
    });
}

function showHide(id)
{
    var disp = $("#"+id).css('display');
    if(disp=='block')
    {
        $("#"+id).css('display','none'); 
    }
    else
    {
        $("#"+id).css('display','block'); 
    }
} 

function isNumber(evt) 
{
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
      alert("Please enter only Numbers.");
      return false;
    } 
    return true;
}

function isMobileNumber(input_fields, onLoad) {
    var mob = /^[1-9]{1}[0-9]{9}$/; 
    var iMobile = $("#"+input_fields).val();
    if (mob.test(iMobile) == false) { 
        //$("#"+input_fields).focus();
        if(onLoad==1)
        {
            $("#" + input_fields).addClass('red_border');
        }
        return false;
    }
    $("#" + input_fields).removeClass("red_border");
    return true;
}
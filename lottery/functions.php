<?php

function display_add_details_popup()
{ 
    ?>  
    <!-- jquery AIzaSyDpBR1zUp-SERbyCvMr5_VdP0afiQrkKsQ -->
    <script src="assets/js/jquery-2.2.4.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBZ7xXNa8xWcU6CR8js-w6AZSr9QuvGJYA&libraries=places"></script>
    <script type="text/javascript">
        $().ready(function() {	 
            var autocomplete1,place ; 
            function initialize1() 
            {
                var input1 = document.getElementById('szGoogleAddress');
                var options = {types: ['regions']}; 
                var autocomplete1 = new google.maps.places.Autocomplete(input1); 
                $(".pac-container:last").attr("id", 'szGoogleAddress' );
                google.maps.event.addListener(autocomplete1, 'place_changed', function() 
                {    
                    var szOriginAddress_js = $("#szGoogleAddress").val();   
                }); 
                  
                
                $('#szGoogleAddress').bind('paste focus', function (e){  
                    $('#szGoogleAddress').bind('keydown keyup keypress click', function (e) {  
                        var pac_container_id = 'szGoogleAddressPacContainer';
                        if($("#"+pac_container_id).length)
                        {
                            //This means id already there no need for further checks
                        }
                        else
                        {
                            $(".pac-container").each(function(pac)
                            {
                                var disp = $(this).css('display'); 
                                if(disp!='none')
                                {
                                    $(this).attr('id',pac_container_id);
                                }
                            });
                        }
                        var key_code = e.keyCode || e.which;
                        if (key_code == 9 || key_code == 13) {
                            prefillAddressOnTabPress('szGoogleAddress',pac_container_id);
                        }  
                    }); 
                }); 
            } 
            function prefillAddressOnTabPress(input_field_id,pac_container_id)
            {  
                $(".pac-container").each(function(pac){
                var disp = $(this).css('display'); 
                var contaier_id = $(this).attr('id');  
                
                console.log("Container: "+contaier_id + " pac id: "+pac_container_id);
                
                if(contaier_id==pac_container_id)
                {
                        var spanObj = $(this).children(".pac-item:first" );
                        var firstResult = ""; 
                        spanObj.children("span").each(function(){
                            var spanText = $(this).text(); 
                            spanText = jQuery.trim(spanText);
                            console.log("Span Text: "+spanText);
                            if(spanText!='')
                            {
                                if(firstResult=='')
                                {
                                    firstResult += spanText;
                                }
                                else
                                {
                                    firstResult += ", "+ spanText;
                                }
                                //$(this).children( ".pac-item:first" ).addClass("pac-selected");
                                //$(this).css("display","none");
                                $("#"+input_field_id).val(firstResult); 
                                $("#"+input_field_id).select();
                            }
                        }); 
                        
                }
                }); 
            } 
            function clean_pac_container()
            { 
                $("div").each(function(index){
                    if($( this ).hasClass("pac-container"))
                    {
                        $( this ).remove();
                    }
                }); 
            }
            initialize1();  
        });
    </script>
     
    <div class="modal" role="dialog" style="display: block;">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">CDRM Lucky Draw</h5> 
                    <button type="button" onclick="showHide('add-details-popup')" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php if(isset($errorMessage)) { ?><div class="alert alert-danger"><?php echo $errorMessage ?></div> <?php } ?>
                    <?php if(isset($successMessage)) { ?><div class="alert alert-success"><?php echo $successMessage ?></div><?php } ?> 
                    <form id="qr-code-register-form" name="qr-code-register-form" method="post" action="javascript:void(0);">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="form-control" id="szFirstName" type="text" placeholder="First Name" onkeyup="submit_details_popup(event);" onblur="onBlur(event,'szFirstName');"/> 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="form-control" id="szLastName" type="text" placeholder="Last Name" onkeyup="submit_details_popup(event);" onblur="onBlur(event,'szLastName');"/> 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="form-control" id="szEmail" type="text" placeholder="E-mail" onkeyup="submit_details_popup(event);" onblur="isValidEmail('szEmail', 1);"/> 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-12">
                                <input class="form-control numberonly"
                                    id="szPhoneNumber"
                                    type="number"
                                    min="1" 
                                    max="9999999999"
                                    data-maxlength="10"
                                    onblur="isMobileNumber('szPhoneNumber', 1);"
                                    oninput="this.value=this.value.slice(0,this.dataset.maxlength)"
                                    onkeypress="isNumber(event);"
                                    onkeyup="isNumber(event);submit_details_popup(event);"
                                    placeholder="Phone Number" /> 
                            </div>
                        </div> 
                        <div class="form-group row">
                            <div class="col-md-12">
                                <!-- <textarea class="form-control" id="szAddress" placeholder="Address" rows="3" onkeyup="submit_details_popup(event);" ></textarea>   -->
                                <input class="form-control" id="szGoogleAddress" type="text" placeholder="Select Your Address" onblur="onBlur(event,'szGoogleAddress');"/>  
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="btn-wrapper desktop-center padding-top-20">
                                <a href="javascript:void(0)" class="btn btn-red mt-0" style="opacity:0.4" id="qr-code-register-button">Register</a>
                            </div> 
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php 
}

function sendCurlCal($szEndPoint, $arData)
{
    $url = "http://localhost:3000/api/v1/" . $szEndPoint;
    $data_string = json_encode($arData); 

    $ch = curl_init($url);   
    curl_setopt($ch, CURLOPT_POST, true);          
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                                                  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);                                                                      
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Content-Length: ' . strlen($data_string)));
    $result = curl_exec($ch); 
    curl_close($ch);

    $arResult = !empty($result) ? json_decode($result,true) : ""; 
    //$arResult = $result;
    return $arResult;
}

function successPopup()
{
    ?> 
    <div class="modal" role="dialog" style="display: block;">
        <div class="modal-dialog" role="document">
            <div class="modal-content"> 
                <div class="modal-header">
                    <h5 class="modal-title">CDRM Lottery Application</h5> 
                    <button type="button" onclick="showHide('add-details-popup')" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color: green; font-weight: 500;">Your details successfully added.</p>
                </div>
                <div class="modal-footer"> 
                    <button type="button" onclick="showHide('add-details-popup')" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div> 
    </div> 
    <?php
}
?>
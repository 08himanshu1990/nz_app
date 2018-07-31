
	
	<style>
	.reqFalse{ border-color: red;}
	.reqFieldsHighlight{ border-color: blue;}
	</style>
    <div class="container">
        <div class="row">
            <!-- Side Navigation Starts Here  -->
            <div class="col-md-3 p-0">
                    <div class="p-2" id="sidebar">
                        <div class="sidebar-content">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control form-control-lg" onKeyUp="searchLead();" id="validationDefaultUsername" placeholder="Find Leads" aria-describedby="inputGroupPrepend2"
                                    required>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <select class="form-control" onChange="searchLead();" id="exampleFormControlSelect1">
                                        <option>Active</option>
										<option>Inactive</option>
                                    </select>
                                </div>
                                <div class="col"></div>
                                <div class="col-5 ">
                                    <select class="form-control" onChange="searchLead();" id="exampleFormControlSelect2">
                                        <option>A-Z</option>
                                        <option>Z-A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col left-menu mt-1 p-3">
                                    <select class="form-control d-block d-sm-none" id="exampleFormControlSelect3">
                                        
    
                                    </select>
                                    <ul class="bg-white p-0 d-none d-sm-block leadList">
										<?php foreach($leads as $lead){ ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="javascript:void();" onClick="loadLead(<?php echo $lead['LeadId'];?>);" >
                                                <span class="text-uppercase"><?php echo $lead['Surname']; ?></span> <?php echo $lead['FirstName']; ?></a>
                                        </li>
										<?php } ?>
										<?php if(count($leads)==0){?>
											<li class="nav-item">
                                            <a class="nav-link active" href="javascript:void();">No Record Found</a>
                                        </li>
										<?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
    
                    </div>
                </div>
<!-- Side Navigation Ends  -->


           <!-- Main Right content sections starts  --> <section class="col-md-9" id="main-content">
                <div class="row">
                        <div class="col">
                            <a class="nav-link py-4 p-sm-5 text-secondary font-weight-bold" href="javascript:void();" onClick="emptyAllFields();">
                                <i class="fas fa-plus-circle fa-2x align-middle"></i> &nbsp; Create new lead
                            </a>
                        </div>
						<input type="hidden" id="current_form_submit_fn" value="createLead" />
                    </div>
                    <div class="row">
                        <div class="col">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 border border-secondary active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                        aria-controls="pills-home" aria-selected="true">
                                        <i class="fas fa-id-card"></i> General</a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link rounded-0 border border-secondary" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">
                                        <i class="fas fa-sticky-note"></i> Notes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 border border-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                                        aria-controls="pills-contact" aria-selected="false">
                                        <i class="far fa-plus-square"></i> Custom 1</a>
                                </li>
                                <li class="ml-auto text-primary font-weight-bold mt-3 mt-sm-0">
                                    <small id="save_flag">Unsaved</small>
                                </li>
                            </ul>
                            <div class="tab-content px-3 pb-3 mt-1" id="pills-tabContent">
                                <!-- General Tab Content Starts -->
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                        <form id="general_lead_form" action="" method="post" onclick="$('#save_flag').html('Unsaved');">
											<input type="hidden" name='current_lead_id' id="current_lead_id" value="0" />
                                            <div class="form-group row content-row  mb-1 border py-3 px-2">
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Surname</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name='surname' class="form-control requiredField" id="inputSurname" placeholder="Surname">
                                                </div>
                                                
                                                <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Create Date</label>
                                                <div class="col-sm-3 mb-2">
													<div id="inputCreatedate" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" type="text" name="create_date" id="create_date" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
												
												

                                                <label for="inputPassword" class="col-sm-2 col-form-label">First Name</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="first_name" class="form-control" id="inputFirstname" placeholder="First Name">
                                                </div>
                                            </div>
                                            <div class="form-group row content-row  mb-1 border py-3 px-2">
                                                <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                                <div class="col-sm-10 mb-2">
                                                    <input type="text" name="address" class="form-control" id="inputAddress" placeholder="Address">
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Suburb</label>
                                                <div class="col-sm-3 mb-2">
                                                    <input type="text" name="suburb" class="form-control" id="inputSuburb" placeholder="Suburb">
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Postcode</label>
                                                <div class="col-sm-3 mb-2">
                                                    <input type="text" name="postcode" class="form-control digitField" id="inputPostcode" placeholder="Postcode">
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">City</label>
                                                <div class="col-sm-3 mb-2">
                                                    <input type="text" name="city"  class="form-control" id="inputCity" placeholder="City">
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Country</label>
                                                <div class="col-sm-3 mb-2">
                                                    <select class="form-control" name="country" id="exampleFormControlCountry">
														<option value="">Select One</option>
                                                        <option value="AF">Afrikanns</option>
                                                        <option value="SQ">Albanian</option>
                                                        <option value="AR">Arabic</option>
                                                        <option value="HY">Armenian</option>
                                                        <option value="EU">Basque</option>
                                                        <option value="BN">Bengali</option>
                                                        <option value="BG">Bulgarian</option>
                                                        <option value="CA">Catalan</option>
                                                        <option value="KM">Cambodian</option>
                                                        <option value="ZH">Chinese (Mandarin)</option>
                                                        <option value="HR">Croation</option>
                                                        <option value="CS">Czech</option>
                                                        <option value="DA">Danish</option>
                                                        <option value="NL">Dutch</option>
                                                        <option value="EN">English</option>
                                                        <option value="ET">Estonian</option>
                                                        <option value="FJ">Fiji</option>
                                                        <option value="FI">Finnish</option>
                                                        <option value="FR">French</option>
                                                        <option value="KA">Georgian</option>
                                                        <option value="DE">German</option>
                                                        <option value="EL">Greek</option>
                                                        <option value="GU">Gujarati</option>
                                                        <option value="HE">Hebrew</option>
                                                        <option value="HI">Hindi</option>
                                                        <option value="HU">Hungarian</option>
                                                        <option value="IS">Icelandic</option>
                                                        <option value="ID">Indonesian</option>
                                                        <option value="GA">Irish</option>
                                                        <option value="IT">Italian</option>
                                                        <option value="JA">Japanese</option>
                                                        <option value="JW">Javanese</option>
                                                        <option value="KO">Korean</option>
                                                        <option value="LA">Latin</option>
                                                        <option value="LV">Latvian</option>
                                                        <option value="LT">Lithuanian</option>
                                                        <option value="MK">Macedonian</option>
                                                        <option value="MS">Malay</option>
                                                        <option value="ML">Malayalam</option>
                                                        <option value="MT">Maltese</option>
                                                        <option value="MI">Maori</option>
                                                        <option value="MR">Marathi</option>
                                                        <option value="MN">Mongolian</option>
                                                        <option value="NE">Nepali</option>
                                                        <option value="NO">Norwegian</option>
                                                        <option value="FA">Persian</option>
                                                        <option value="PL">Polish</option>
                                                        <option value="PT">Portuguese</option>
                                                        <option value="PA">Punjabi</option>
                                                        <option value="QU">Quechua</option>
                                                        <option value="RO">Romanian</option>
                                                        <option value="RU">Russian</option>
                                                        <option value="SM">Samoan</option>
                                                        <option value="SR">Serbian</option>
                                                        <option value="SK">Slovak</option>
                                                        <option value="SL">Slovenian</option>
                                                        <option value="ES">Spanish</option>
                                                        <option value="SW">Swahili</option>
                                                        <option value="SV">Swedish </option>
                                                        <option value="TA">Tamil</option>
                                                        <option value="TT">Tatar</option>
                                                        <option value="TE">Telugu</option>
                                                        <option value="TH">Thai</option>
                                                        <option value="BO">Tibetan</option>
                                                        <option value="TO">Tonga</option>
                                                        <option value="TR">Turkish</option>
                                                        <option value="UK">Ukranian</option>
                                                        <option value="UR">Urdu</option>
                                                        <option value="UZ">Uzbek</option>
                                                        <option value="VI">Vietnamese</option>
                                                        <option value="CY">Welsh</option>
                                                        <option value="XH">Xhosa</option>
                                                    </select>
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-3 mb-2">
                                                    <input type="text" name="phone" class="form-control requiredField digitField" id="inputPhone" placeholder="Phone">
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Mobile</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="mobile"  class="form-control digitField" id="inputMobile" placeholder="Mobile">
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-3">
                                                    <input type="text" name="email" class="form-control" id="inputEmail" placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row content-row border py-3 px-2">
                                                <label for="inputAddress" class="col-sm-2 col-form-label">Lead Source</label>
                                                <div class="col-sm-3 mb-2">
                                                    <input type="text" name="lead_source" class="form-control requiredField" id="inputAddress2" placeholder="Lead Source">
                                                </div>
                                                <div class="w-100"></div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Project Type 1</label>
                                                <div class="col-sm-3 mb-2">
                                                    <div id="datepicker" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" type="text" id="project_type_1" name="project_type_1" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Project Type 2</label>
                                                <div class="col-sm-3 mb-2">
                                                    <div id="datepicker2" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" name="project_type_2" id="project_type_2" type="text" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>		
                                                <div class="w-100"></div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Designer</label>
                                                <div class="col-sm-3 mb-2">
                                                    <select class="form-control requiredField" name="designer" id="exampleFormControlSelect4">
														<option value="">Select One</option>
                                                        <option value="AF">Afrikanns</option>
                                                        <option value="SQ">Albanian</option>
                                                        <option value="AR">Arabic</option>
                                                        <option value="HY">Armenian</option>
                                                    </select>
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Status</label>
                                                <div class="col-sm-3 mb-2">
                                                    <select class="form-control requiredField" name="status" id="exampleFormControlSelect5">
														<option value="">Select One</option>
                                                        <option value="Active">Active</option>
                                                        <option value="Inactive">Inactive</option>
                                                    </select>
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Check Date</label>
                                                <div class="col-sm-3 mb-2">
                                                    <div id="datepicker3" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" name="check_date" id="check_date" type="text" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row content-row border py-3 px-2">
                                                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Lead Update</label>
                                                <div class="col-sm-10 mb-2">
                                                    <textarea class="form-control" name="lead_update" id="exampleFormControlTextarea1" rows="3"></textarea>
                                                </div>
                                                <div class="w-100"></div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Date Appt 1</label>
                                                <div class="col-sm-3 mb-2">
                                                    <div id="datepicker" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" id="date_appt_1" name="date_appt_1" type="text" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right rounded p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 offset-md-2 col-form-label">Date Appt 2</label>
                                                <div class="col-sm-3 mb-2">
                                                    <div id="datepicker" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" id="date_appt_2" name="date_appt_2" type="text" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right rounded p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="w-100"></div>
                                                <label for="inputPassword" class="col-sm-2 col-form-label">Date Appt 3</label>
                                                <div class="col-sm-3 mb-2">
                                                    <div id="datepicker" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" id="date_appt_3" name="date_appt_3" type="text" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right rounded p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                                <label for="inputPassword" class="col-sm-2 offset-md-2 col-form-label">Date Appt 4</label>
                                                <div class="col-sm-3 mb-2">
                                                    <div id="datepicker" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" id="date_appt_4" name="date_appt_4" type="text" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right rounded p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- Notes Screen strats here  -->


                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <div class="form-group row content-row  mb-1 border py-3 px-2">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Create Date</label>
                                        <div class="col-sm-3 mb-2">
                                            <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                                <input class="form-control bg-white border-right-0" type="text" readonly />
                                                <span class="input-group-addon bg-white border-top border-bottom border-right rounded p-2 px-3">
                                                    <i class="far fa-calendar-alt"></i>
                                        </div>
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Contact Type</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="password" class="form-control" id="inputCreatedate" placeholder="Contact Type">
                                    </div>
                                   
                                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Note</label>
                                        <div class="col-sm-10 mb-2">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                     
                    
                                </div>
<!-- Custom Screen strats here  -->

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                    <div class="form-group row content-row border py-3 px-2">
                                        <label for="inputAddress" class="col-sm-2 col-form-label">Lead Source</label>
                                        <div class="col-sm-3 mb-2">
                                            <input type="password" class="form-control" id="inputAddress3" placeholder="Address">
                                        </div>
                                        <div class="w-100"></div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Project Type 1</label>
                                        <div class="col-sm-3 mb-2">
                                            <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                                <input class="form-control bg-white border-right-0" type="text" readonly />
                                                <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Project Type 2</label>
                                        <div class="col-sm-3 mb-2">
                                            <div id="datepicker2" class="input-group date" data-date-format="mm-dd-yyyy">
                                                <input class="form-control bg-white border-right-0" type="text" readonly />
                                                <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
    
                                        <div class="w-100"></div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Designer</label>
                                        <div class="col-sm-3 mb-2">
                                            <select class="form-control" id="exampleFormControlSelect7">
                                                <option value="AF">Afrikanns</option>
                                                <option value="SQ">Albanian</option>
                                                <option value="AR">Arabic</option>
                                                <option value="HY">Armenian</option>
                                            </select>
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Status</label>
                                        <div class="col-sm-3 mb-2">
                                            <select class="form-control" id="exampleFormControlSelect8">
                                                <option value="AF">Opportunity</option>
                                                <option value="SQ">Albanian</option>
                                                <option value="AR">Arabic</option>
                                                <option value="HY">Armenian</option>
                                            </select>
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Project Type 2</label>
                                        <div class="col-sm-3 mb-2">
                                            <div id="datepicker3" class="input-group date" data-date-format="mm-dd-yyyy">
                                                <input class="form-control bg-white border-right-0" type="text" readonly />
                                                <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
				<img src="templates/loader.gif" style="position:fixed; z-index:999999; right:5%; bottom:10%; display:none;" id="loading_image" />
                <!-- Main content section ends  -->


            </div>
        </div>

<script>
 var searchajax = null;

function generalFieldValidation(){
	
	var falseFields = 0;
	
	$('.requiredField').each(function(){
	
		if($(this).val()==''){
			$(this).addClass('reqFalse');
			$(this).removeClass('reqFieldsHighlight');
			falseFields = 1;
		}else{
			$(this).removeClass('reqFalse');
		}
	
	});
	
	var email_regex=/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	
	if(email_regex.test($('#inputEmail').val())==false && $('#inputEmail').val()!='')
	 {
	  $('#inputEmail').addClass('reqFalse');
	  $(this).removeClass('reqFieldsHighlight');
	  falseFields = 1;
	 }else{
	 	$('#inputEmail').removeClass('reqFalse');
	 }
	 
	 
	 var digitFields = /^\d*(?:\.\d{1,2})?$/;
	 
	 $('.digitField').each(function(){
	
		if((digitFields.test($(this).val())==false && $(this).val()!='') || ($(this).hasClass("requiredField") && $(this).val()=='')){
			$(this).addClass('reqFalse');
			$(this).removeClass('reqFieldsHighlight');
			falseFields = 1;
		}else{
			$(this).removeClass('reqFalse');
		}
	
	});
	
	
	
	 
	
	if(falseFields==1){ return false;}else{ return true;}
}

function createLead(){
	if(generalFieldValidation()){
		$('#loading_image').show();
		$.ajax({
				url       : 'index.php?page=leads/createLead',
				type      : 'post',
				data      : $('#general_lead_form').serialize(),
				dataType  : 'json',
				success   : function (json) {
					$('#loading_image').hide();
					if(json['submit_suc'].length!=0){
						$('#save_flag').html('Saved');
					}
					searchLead();
				},
				error     : function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
	}
}

function loadLead(leadId){
	$('#loading_image').show();
		$.ajax({
				url       : 'index.php?page=leads/getLeadInfo',
				type      : 'post',
				data      : 'leadId='+leadId,
				dataType  : 'json',
				success   : function (json) {
					$('#loading_image').hide();
					$('#save_flag').html('Unsaved');
					$('#inputSurname').val(json['surname']);
					$('#create_date').val(json['createdate']);
					$('#inputFirstname').val(json['firstname']);
					$('#inputAddress').val(json['address']);
					$('#inputSuburb').val(json['suburb']);
					$('#inputCity').val(json['city']);
					$('#exampleFormControlCountry').val(json['country']);
					$('#inputPostcode').val(json['postcode']);
					$('#inputPhone').val(json['phonenumber']);
					$('#inputMobile').val(json['mobilenumber']);
					$('#inputEmail').val(json['email']);
					$('#inputAddress2').val(json['leadsource']);
					$('#exampleFormControlSelect5').val(json['leadstatus']);
					$('#project_type_1').val(json['projecttype1']);
					$('#project_type_2').val(json['projecttype2']);
					$('#exampleFormControlSelect4').val(json['designer']);
					$('#exampleFormControlTextarea1').val(json['leadupdate']);
					$('#date_appt_1').val(json['dateappt1']);
					$('#date_appt_2').val(json['dateappt2']);
					$('#date_appt_3').val(json['dateappt3']);
					$('#date_appt_4').val(json['dateappt4']);
					$('#check_date').val(json['checkdate']);
					$('#current_lead_id').val(json['leadid']);
					$('#current_form_submit_fn').val('saveLead');
					
					$('.reqFalse').each(function(){
						$(this).removeClass('reqFalse');
					
					});
					
				},
				error     : function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
}

function saveLead(){
	if(generalFieldValidation()){
		$('#loading_image').show();
		$.ajax({
				url       : 'index.php?page=leads/saveLead',
				type      : 'post',
				data      : $('#general_lead_form').serialize(),
				dataType  : 'json',
				success   : function (json) {
					$('#loading_image').hide();
					if(json['submit_suc'].length!=0){
						$('#save_flag').html('Saved');
					}
					searchLead();
				},
				error     : function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
	}
}

function searchLead(){
	$('#loading_image').show();
		if (searchajax){ 
			searchajax.abort();
		}
		searchajax = $.ajax({
				url       : 'index.php?page=leads/searchLead',
				type      : 'post',
				data      : 'text='+$('#validationDefaultUsername').val()+'&status='+$('#exampleFormControlSelect1').val()+'&order='+$('#exampleFormControlSelect2').val(),
				dataType  : 'html',
				success   : function (html) {
					$('#loading_image').hide();
					$('.leadList').html(html);
				},
				error     : function (xhr, ajaxOptions, thrownError) {
					//alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
	
}

function emptyAllFields(){
	$('#general_lead_form input,#general_lead_form textarea,#general_lead_form select').val('');
	$('.requiredField').each(function(){
		$(this).addClass('reqFieldsHighlight');
	});
	 $("#create_date, #project_type_1 , #project_type_2,#date_appt_1,#date_appt_2,#date_appt_3,#date_appt_4,#check_date").val('<?php echo date('m-d-Y');?>');
	$('#current_lead_id').val(0);
	$('#current_form_submit_fn').val('createLead');
	$('#save_flag').html('Unsaved');
}

function saveForm(){
	var fnName = $('#current_form_submit_fn').val();
	if(fnName=='createLead'){
		createLead();
	}
	
	if(fnName=='saveLead'){
		saveLead();
	}
}
</script>


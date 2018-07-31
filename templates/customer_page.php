
	
	<style>
	.reqFalse{ border-color: red;}
	.reqFieldsHighlight{ border-color: blue;}
	</style>
	
    <div class="container">
        <div class="row">
            <!-- Side Navigation Starts Here  -->
            <div class="col-md-3 p-sm-0 mt-3 mt-sm-0">
                <div class="p-2" id="sidebar">
                    <div class="sidebar-content">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white border-right-0">
                                    <i class="fas fa-search"></i>
                                </span>
                            </div>
                                <input type="text" class="form-control form-control-lg" onKeyUp="searchCustomer();" id="validationDefaultUsername" placeholder="Find Customers" aria-describedby="inputGroupPrepend2" required>
                            </div>
                            <div class="row">
                                <div class="col-5">
                                    <select class="form-control" onChange="searchCustomer();" id="exampleFormControlSelect1">
                                        <option>Active</option>
										<option>Inactive</option>
                                    </select>
                                </div>
                                <div class="col"></div>
                                <div class="col-5 ">
                                    <select class="form-control" onChange="searchCustomer();" id="exampleFormControlSelect2">
                                        <option>A-Z</option>
                                        <option>Z-A</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col left-menu mt-1 p-3">
                                    <select class="form-control d-block d-sm-none" id="exampleFormControlSelect3">
                                        
    
                                    </select>
                                    <ul class="bg-white p-0 d-none d-sm-block customerList">
										<?php foreach($customers as $customer){ ?>
                                        <li class="nav-item">
                                            <a class="nav-link active" href="javascript:void();" onClick="loadCustomer(<?php echo $customer['JobNumber'];?>);" >
                                                <span class="text-uppercase"><?php echo $customer['Surname']; ?></span> <?php echo $customer['FirstName']; ?></a>
                                        </li>
										<?php } ?>
										<?php if(count($customers)==0){?>
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


            <!-- Main Right content sections starts  -->
            <section class="col-md-9" id="main-content">
                <div class="row">
                    <div class="col">
                        <a class="nav-link py-4 p-sm-5 text-secondary font-weight-bold" href="javascript:void();" onClick="emptyAllFields();">
                            <i class="fas fa-plus-circle fa-2x align-middle"></i> &nbsp; Create new customer
                        </a>
                    </div>
					<input type="hidden" id="current_form_submit_fn" value="createCustomer" />
					<input type="hidden" id="save_flag_reset" value="1" />
                    <div class="w-100"></div>
                    <div class="col lead font-weight-bold py-3" id="customer_info_section" style="display:none;">
                        <span class="text-primary" id="customer_display_text">MAZZA Jeanette</span>
                        <span class="badge badge-secondary mx-3">Customer</span>
                        <span class="text-secondary" id="customer_address_text">
                            <i class="fas fa-map-marker-alt"></i> 42 Hasselhoff st, Browns Bay, NZ</span>
                    </div>

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
                                    <i class="far fa-check-square"></i> Tasks </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 border border-secondary" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">
                                    <i class="far fa-plus-square"></i> Notes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-0 border border-secondary" id="pills-availability-tab" data-toggle="pill" href="#pills-availability"
                                    role="tab" aria-controls="pills-availability" aria-selected="false">
                                    <i class="fas fa-paperclip"></i> Files</a>
                            </li>
                            <li class="ml-auto text-primary font-weight-bold mt-3 mt-sm-0">
                                <small id="save_flag">Unsaved</small>
                            </li>
                        </ul>
                        <div class="tab-content px-3 pb-3 mt-1" id="pills-tabContent">
                            <!-- General Tab Content Starts -->
                            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <form id="general_customer_form" action="" method="post" onclick="$('#save_flag').html('Unsaved'); $('#save_flag_reset').val(1);">
									<input type="hidden" name='current_job_number' id="current_job_number" value="0" />
                                    <div class="form-group row content-row  mb-1 border py-3 px-2">
                                        <label for="inputResource" class="col-sm-2 col-form-label">Job #</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="jobnumber" readonly="" placeholder="Job Number">
                                        </div>
                                        <label for="inputCreateDate" class="col-sm-2 col-form-label offset-md-2">Create Date</label>
                                        <div class="col-sm-3 mb-2">
                                            <div id="inputCreatedate" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                        <input class="form-control bg-white border-right-0" type="text" name="create_date" id="create_date" readonly />
                                                        <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                            <i class="far fa-calendar-alt"></i>
                                                        </span>
                                                    </div>
                                        </div>
                                        <label for="inputSurname" class="col-sm-2 col-form-label ">Surname</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control requiredField" name="surname" id="inputSurname" placeholder="Surname">
                                        </div>
                                        <label for="inputDisplayname" class="col-sm-2 col-form-label offset-md-2">Display Name</label>
                                        <div class="col-sm-3 mb-2">
                                            <input type="text" class="form-control" id="inputDisplayname" name="display_name" placeholder="Display Name">
                                        </div>
                                        <label for="inputFirstname" class="col-sm-2 col-form-label">First Name</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control requiredField" id="inputFirstname" name="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                    <div class="form-group row content-row  mb-1 border py-3 px-2">
                                        <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                                        <div class="col-sm-10 mb-2">
                                            <input type="text" class="form-control" name="address" id="inputAddress" placeholder="Address">
                                        </div>
                                        <label for="inputSuburb" class="col-sm-2 col-form-label">Suburb</label>
                                        <div class="col-sm-3 mb-2">
                                            <input type="text" class="form-control" name="suburb" id="inputSuburb" placeholder="Suburb">
                                        </div>
                                        <label for="inputPostcode" class="col-sm-2 col-form-label offset-md-2">Postcode</label>
                                        <div class="col-sm-3 mb-2">
                                            <input type="text" class="form-control digitField" name="postcode" id="inputPostcode" placeholder="Postcode">
                                        </div>
                                        <label for="inputCity" class="col-sm-2 col-form-label">City</label>
                                        <div class="col-sm-3 mb-2">
                                            <input type="text" class="form-control" name="city" id="inputCity" placeholder="City">
                                        </div>
                                        <label for="exampleFormControlCountry" class="col-sm-2 col-form-label offset-md-2">Country</label>
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
                                                <option value="NZ">New Zealand</option>
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
                                        <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
                                        <div class="col-sm-3 mb-2">
                                            <input type="text" class="form-control requiredField digitField" name="phone" id="inputPhone" placeholder="Phone">
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label offset-md-2">Mobile</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control digitField" name="mobile" id="inputMobile" placeholder="Mobile">
                                        </div>
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-3">
                                            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email">
                                        </div>

                                    </div>
                                    <div class="form-group row content-row  mb-1 border py-3 px-2">
                                        <label for="designer" class="col-sm-2 col-form-label">Designer</label>
                                        <div class="col-sm-3 mb-2">
                                            <select class="form-control" name="designer" id="designer">
												<option value="">Select One</option>
                                                <option>Demo</option>
                                                <option>Demo 1 </option>
                                                <option>Demo 2</option>
                                            </select>
                                        </div>

                                        <label for="status" class="col-sm-2 col-form-label offset-md-2">Status</label>
                                        <div class="col-sm-3">
                                            <select class="form-control requiredField" name="status" id="status">
                                                <option value="">Select One</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="w-100"></div>
                                        <label for="letter_1_sent" class="col-sm-2 col-form-label">Letter 1 Sent</label>
                                        <div class="col-sm-3 mb-2">
                                            <div id="datepicker" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                <input class="form-control bg-white border-right-0" name="letter_1_sent" id="letter_1_sent" type="text" readonly />
                                                <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <label for="contract_date" class="col-sm-2 col-form-label offset-md-2">Contract Date</label>
                                        <div class="col-sm-3 mb-2">
                                            <div id="datepicker" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                <input class="form-control bg-white border-right-0" name="contract_date" id="contract_date" type="text" readonly />
                                                <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                        <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                                        <div class="col-sm-3 mb-2">
                                            <div id="datepicker" class="input-group date dates" data-date-format="mm-dd-yyyy">
                                                <input class="form-control bg-white border-right-0" name="start_date" id="start_date" type="text" readonly />
                                                <span class="input-group-addon bg-white border-top border-bottom border-right p-2 px-3">
                                                    <i class="far fa-calendar-alt"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row content-row  mb-1 border py-3 px-2">
                                        <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Installer Comments</label>
                                        <div class="col-sm-10 mb-2">
                                            <textarea class="form-control" name="installer_comments" id="exampleFormControlTextarea1" rows="3"></textarea>
                                        </div>
                                        <label for="exampleFormControlTextarea2" class="col-sm-2 col-form-label">Notes to Client</label>
                                        <div class="col-sm-10 mb-2">
                                            <textarea class="form-control" name="notes_to_client" id="exampleFormControlTextarea2" rows="3"></textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>


                            <!-- Tasks Tab Starts -->


                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                                <div class="col bg-light shadow-sm border p-2 mt-4 text-secondary font-weight-bold">Renovation Part Kitchen / Makeover</div>


                                <div class="table-responsive mt-3">
                                    <table class="table table-bordered">
                                        <thead class="bg-primary text-white text-center">
                                            <tr>
                                                <th scope="col">Due Date</th>
                                                <th scope="col">Task</th>
                                                <th scope="col">Require</th>
                                                <th scope="col">Resources</th>
                                                <th scope="col">Done</th>
                                                <th scope="col">Resource Comments</th>
                                                <th scope="col">Client Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>4 Jun 2018</td>
                                                <td>Client approval of plan and specs</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck17">
                                                        <label class="custom-control-label" for="customCheck17"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck18">
                                                        <label class="custom-control-label" for="customCheck18"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>25 Jun 2018</td>
                                                <td>Send WHN</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck19">
                                                        <label class="custom-control-label" for="customCheck19"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck20">
                                                        <label class="custom-control-label" for="customCheck20"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3 Jul 2018</td>
                                                <td>Prewire</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck21">
                                                        <label class="custom-control-label" for="customCheck21"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck22">
                                                        <label class="custom-control-label" for="customCheck22"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3 Jul 2018</td>
                                                <td>Preplumb</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck23">
                                                        <label class="custom-control-label" for="customCheck23"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck24">
                                                        <label class="custom-control-label" for="customCheck24"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3 jul 2018</td>
                                                <td>Skip delivered</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck25">
                                                        <label class="custom-control-label" for="customCheck25"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck26">
                                                        <label class="custom-control-label" for="customCheck26"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3 Jul 2018</td>
                                                <td>Existing Kitchen Pullout</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck27">
                                                        <label class="custom-control-label" for="customCheck27"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck28">
                                                        <label class="custom-control-label" for="customCheck28"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3 Jul 2018</td>
                                                <td>Electrical Disconnect</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck29">
                                                        <label class="custom-control-label" for="customCheck29"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck30">
                                                        <label class="custom-control-label" for="customCheck30"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3 Jul 2018</td>
                                                <td>Plumbing disconnect</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck31">
                                                        <label class="custom-control-label" for="customCheck31"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck32">
                                                        <label class="custom-control-label" for="customCheck32"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>4 Jul 2018</td>
                                                <td>Plastering</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck33">
                                                        <label class="custom-control-label" for="customCheck33"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck34">
                                                        <label class="custom-control-label" for="customCheck34"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>5 Jul 2018</td>
                                                <td>Building work</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck35">
                                                        <label class="custom-control-label" for="customCheck35"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck36">
                                                        <label class="custom-control-label" for="customCheck36"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>5 Jul 2018</td>
                                                <td>Concrete cutter </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck37">
                                                        <label class="custom-control-label" for="customCheck37"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck38">
                                                        <label class="custom-control-label" for="customCheck38"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>5 Jul 2018</td>
                                                <td>Existing flooring pulled up</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck39">
                                                        <label class="custom-control-label" for="customCheck39"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck40">
                                                        <label class="custom-control-label" for="customCheck40"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>5 Jul 2018</td>
                                                <td>Preassemble Kitchen </td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck41">
                                                        <label class="custom-control-label" for="customCheck41"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck42">
                                                        <label class="custom-control-label" for="customCheck42"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>8 Jul 2018</td>
                                                <td>Painting</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck43">
                                                        <label class="custom-control-label" for="customCheck43"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck44">
                                                        <label class="custom-control-label" for="customCheck44"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>8 Jul 2018</td>
                                                <td>Final Payment</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck45">
                                                        <label class="custom-control-label" for="customCheck46"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck47">
                                                        <label class="custom-control-label" for="customCheck47"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>9 Jul 2018</td>
                                                <td>Kitchen Delivery</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck48">
                                                        <label class="custom-control-label" for="customCheck48"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck49">
                                                        <label class="custom-control-label" for="customCheck49"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>10 Jul 2018</td>
                                                <td>Install day 1</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck50">
                                                        <label class="custom-control-label" for="customCheck50"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck51">
                                                        <label class="custom-control-label" for="customCheck51"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>11 Jul 2018</td>
                                                <td>Install day 2</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck52">
                                                        <label class="custom-control-label" for="customCheck52"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck53">
                                                        <label class="custom-control-label" for="customCheck53"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>12 Jul 2018</td>
                                                <td>Bench Template</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck54">
                                                        <label class="custom-control-label" for="customCheck54"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck55">
                                                        <label class="custom-control-label" for="customCheck55"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>12 Jul 2018</td>
                                                <td>First stage installation review</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck56">
                                                        <label class="custom-control-label" for="customCheck56"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck57">
                                                        <label class="custom-control-label" for="customCheck57"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>12 Jul 2018</td>
                                                <td>Temporary sink hookup</td>
                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" checked id="customCheck58">
                                                        <label class="custom-control-label" for="customCheck58"></label>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <select class="form-control" id="exampleFormControlInstaller">
                                                        <option value=""></option>
                                                        <option value="">Demo 1 </option>
                                                        <option value="">Demo 2</option>
                                                    </select>
                                                </td>

                                                <td class="text-center">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input" id="customCheck59">
                                                        <label class="custom-control-label" for="customCheck5"></label>
                                                    </div>
                                                </td>
                                                <td></td>
                                                <td></td>
                                            </tr>




                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Tasks Tab Ends -->
                            <!-- Notes Tab Starts -->
                            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">


                                <div class="form-group row content-row border py-3 px-2">


                                    <label for="inputPassword" class="col-sm-2 col-form-label">Create Date</label>
                                    <div class="col-sm-3 mb-2">
                                        <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                            <input class="form-control bg-white border-right-0" type="text" readonly />
                                            <span class="input-group-addon bg-white border-top border-bottom border-right rounded p-2 px-3">
                                                <i class="far fa-calendar-alt"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <label for="inputPassword" class="col-sm-2 offset-md-2 col-form-label">Contact Type</label>
                                    <div class="col-sm-3 mb-2">
                                        <input type="text" class="form-control" id="inputContactType" placeholder="Contact Type">
                                    </div>
                                    <div class="w-100"></div>
                                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Note</label>
                                    <div class="col-sm-10 mb-2">
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- Tasks Tab Ends -->
                            <!-- Availability Tab Starts -->
                            <div class="tab-pane fade" id="pills-availability" role="tabpanel" aria-labelledby="#pills-availability-tab">
                                <div class="row content-row">
                                    <div class="col  p-3">
                                        <a href="#">
                                            <i class="fas fa-link border border-primary fa-2x text-primary p-2"></i>
                                            <span class="lead ml-2 font-weight-bold">Create new link</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row content-row mt-2">
                                    <div class="table-responsive p-2">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col"> File Name
                                                        <a href="#" class="float-right">
                                                            <i class="fas fa-caret-up"></i>
                                                        </a>
                                                    </th>
                                                    <th scope="col"> Modified
                                                        <a href="#" class="float-right">
                                                            <i class="fas fa-caret-down"></i>
                                                        </a>
                                                    </th>
                                                    <th scope="col"> </th>
                                                    <th scope="col"> </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <small>Kitchen Plans 23 july 2018</small>
                                                    </td>
                                                    <td>
                                                        <small>Modified 23 july 2018</small>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#" class="text-primary" data-toggle="modal" data-target="#modalOne">Open Link</a>




                                                    </td>
                                                    <td class="text-center">
                                                        <a href="#">
                                                            <i class="fas fa-ellipsis-h"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Availability Tab Ends -->
                    </div>
            </section>
			<img src="templates/loader.gif" style="position:fixed; z-index:999999; right:5%; bottom:10%; display:none;" id="loading_image" />
            <!-- Main content section ends  -->
            </div>
        </div>

        
<script>
 var searchajax = null;
	
	function saveForm(){
		var fnName = $('#current_form_submit_fn').val();
		if(fnName=='createCustomer'){
			createCustomer();
		}
		
		if(fnName=='saveCustomer'){
			saveCustomer();
		}
	}
	
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

function createCustomer(){
	if(generalFieldValidation()){
		$('#loading_image').show();
		$.ajax({
				url       : 'index.php?page=customers/createCustomer',
				type      : 'post',
				data      : $('#general_customer_form').serialize(),
				dataType  : 'json',
				success   : function (json) {
					$('#loading_image').hide();
					if(json['submit_suc'].length!=0){
						$('#save_flag').html('Saved 0 Min Ago');
						$('#save_flag_reset').val(0);
						showFlag(0);
					}
					searchCustomer();
				},
				error     : function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
	}
}

function saveCustomer(){
	if(generalFieldValidation()){
		$('#loading_image').show();
		$.ajax({
				url       : 'index.php?page=customers/saveCustomer',
				type      : 'post',
				data      : $('#general_customer_form').serialize(),
				dataType  : 'json',
				success   : function (json) {
					$('#loading_image').hide();
					if(json['submit_suc'].length!=0){
						$('#save_flag').html('Saved 0 Min Ago');
						$('#save_flag_reset').val(0);
						showFlag(0);
						if($('#inputDisplayname').val()!=''){
							name = $('#inputDisplayname').val();
						}else{
							name = $('#inputSurname').val()+' '+$('#inputFirstname').val();
						}
						$('#customer_display_text').html(name);
						$('#customer_address_text').html('<i class="fas fa-map-marker-alt"></i> '+$('#inputAddress').val()+' '+$('#inputCity').val()+' '+$('#exampleFormControlCountry').val());
					}
					searchCustomer();
				},
				error     : function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
	}
}

function showFlag(time){
	if(time<=30 && $('#save_flag_reset').val()==0){
		$('#save_flag').html('Saved '+time+' Min Ago');
		time++;
		setTimeout('showFlag('+time+')',60000);
	}else{
		if($('#save_flag_reset').val()==0){
			$('#save_flag').html('Saved more than 30 Min Ago');
		}else{
			$('#save_flag').html('Unsaved');
		}
	}
}

function searchCustomer(){
	$('#loading_image').show();
		if (searchajax){ 
			searchajax.abort();
		}
		searchajax = $.ajax({
				url       : 'index.php?page=customers/searchCustomer',
				type      : 'post',
				data      : 'text='+$('#validationDefaultUsername').val()+'&status='+$('#exampleFormControlSelect1').val()+'&order='+$('#exampleFormControlSelect2').val(),
				dataType  : 'html',
				success   : function (html) {
					$('#loading_image').hide();
					$('.customerList').html(html);
				},
				error     : function (xhr, ajaxOptions, thrownError) {
					//alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
	
}

function loadCustomer(jobnumber){
	$('#loading_image').show();
		$.ajax({
				url       : 'index.php?page=customers/getCustomerInfo',
				type      : 'post',
				data      : 'jobnumber='+jobnumber,
				dataType  : 'json',
				success   : function (json) {
					$('#loading_image').hide();
					$('#save_flag').html('Unsaved');
					$('#save_flag_reset').val(1);
					$('#inputSurname').val(json['surname']);
					$('#create_date').val(json['createdate']);
					$('#inputDisplayname').val(json['displayname']);
					$('#inputFirstname').val(json['firstname']);
					$('#inputAddress').val(json['address']);
					$('#inputSuburb').val(json['suburb']);
					$('#inputCity').val(json['city']);
					$('#exampleFormControlCountry').val(json['country']);
					$('#inputPostcode').val(json['postcode']);
					$('#inputPhone').val(json['phone']);
					$('#inputMobile').val(json['mobile']);
					$('#inputEmail').val(json['email']);
					$('#designer').val(json['designer']);
					$('#status').val(json['status']);
					$('#letter_1_sent').val(json['letter_1_sent']);
					$('#contract_date').val(json['contract_date']);
					$('#start_date').val(json['start_date']);
					$('#exampleFormControlTextarea1').val(json['installer_comments']);
					$('#exampleFormControlTextarea2').val(json['notes_to_client']);
					if(json['displayname']!=''){
						name = json['displayname'];
					}else{
						name = json['surname']+' '+json['firstname'];
					}
					$('#customer_display_text').html(name);
					$('#customer_address_text').html('<i class="fas fa-map-marker-alt"></i> '+json['address']+' '+json['city']+' '+json['country']);
					$('#customer_info_section').show();
					$('#current_job_number,#jobnumber').val(json['jobnumber']);
					$('#current_form_submit_fn').val('saveCustomer');
					
					$('.reqFalse').each(function(){
						$(this).removeClass('reqFalse');
					
					});
					
				},
				error     : function (xhr, ajaxOptions, thrownError) {
					alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
				}
        });
}

function emptyAllFields(){
	$('#general_customer_form input,#general_customer_form textarea,#general_customer_form select').val('');
	$('.requiredField').each(function(){
		$(this).addClass('reqFieldsHighlight');
	});
	 $("#create_date, #start_date , #contract_date,#letter_1_sent").val('<?php echo date('m-d-Y');?>');
	$('#current_job_number').val(0);
	$('#current_form_submit_fn').val('createCustomer');
	$('#customer_info_section').hide();
	$('#save_flag').html('Unsaved');
}

</script>


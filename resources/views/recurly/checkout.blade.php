@extends('layouts.app')

@push('head')
<script src="https://js.recurly.com/v4/recurly.js"></script>
<link href="https://js.recurly.com/v4/recurly.css" rel="stylesheet" type="text/css">  
<script>

recurly.configure(env('RECURLY_PUBLIC_KEY'));

const elements = recurly.Elements();

const cardElement = elements.CardElement({
style: {
    inputType: 'mobileSelect',
    fontColor: '#010101'
}
});
cardElement.attach('#recurly-elements');

const checkoutPricing = recurly.Pricing.Checkout();

checkoutPricing.attach('#my-checkout');

// For debugging: when pricing changes or emits an error, we'll just send it to the console
// This should be disabled or removed for your production environment
if (console) {
    checkoutPricing.on('change', function (price) { console.info(price); });
    checkoutPricing.on('error', function (e) { console.error(e); });
}
checkoutPricing.on('set.coupon', function (price) { 
    $('#coupon-errors').removeClass().addClass('alert alert-success').text('Coupon successfully applied').show();
});
checkoutPricing.on('unset.coupon', function (e) { 
    $('#coupon-errors').removeClass().addClass('alert alert-info').text('Coupon removed').show();
});
checkoutPricing.on('error.coupon', function (e) { 
    $('#coupon-errors').removeClass().addClass('alert alert-danger').text(e.message).show();
});
</script>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <form action="{{ route('subscribe', $plan->getId()) }}" method="post" id="recurly-subscribe-card" novalidate="novalidate">
                <div class="card mb-5">
                    <div class="card-header">
                        Contact Information
                    </div>            
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">First Name</label>
                                    <input type="email" data-recurly="first_name" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>   
                            <div class="col-sm-6">                    
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Last Name</label>
                                    <input type="email" data-recurly="last_name" class="form-control" id="exampleFormControlInput1">
                                </div>   
                            </div>   
                        </div>   
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="email" data-recurly="last_name" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->email }}" disabled="disabled">
                        </div>     
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Company / Organisation Name</label>
                            <input type="email" data-recurly="last_name" class="form-control" id="exampleFormControlInput1">
                        </div>
                    </div>                                        
                </div>  
                <div class="card mb-5">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Credit Card</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Paypal</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Payment Card</label>
                            <div id="recurly-elements">
                            <!-- Recurly Elements will be attached here -->
                            </div>  
                        </div>
                        <div class="row">
                            <div class="col-sm-6">                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Country</label>
                                    <select id="country" data-recurly="country" class="form-control">
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Åland Islands</option>
                                        <option value="AL">Albania</option>
                                        <option value="DZ">Algeria</option>
                                        <option value="AS">American Samoa</option>
                                        <option value="AD">Andorra</option>
                                        <option value="AO">Angola</option>
                                        <option value="AI">Anguilla</option>
                                        <option value="AQ">Antarctica</option>
                                        <option value="AG">Antigua and Barbuda</option>
                                        <option value="AR">Argentina</option>
                                        <option value="AM">Armenia</option>
                                        <option value="AW">Aruba</option>
                                        <option value="AU">Australia</option>
                                        <option value="AT">Austria</option>
                                        <option value="AZ">Azerbaijan</option>
                                        <option value="BS">Bahamas</option>
                                        <option value="BH">Bahrain</option>
                                        <option value="BD">Bangladesh</option>
                                        <option value="BB">Barbados</option>
                                        <option value="BY">Belarus</option>
                                        <option value="BE">Belgium</option>
                                        <option value="BZ">Belize</option>
                                        <option value="BJ">Benin</option>
                                        <option value="BM">Bermuda</option>
                                        <option value="BT">Bhutan</option>
                                        <option value="BO">Bolivia, Plurinational State of</option>
                                        <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
                                        <option value="BA">Bosnia and Herzegovina</option>
                                        <option value="BW">Botswana</option>
                                        <option value="BV">Bouvet Island</option>
                                        <option value="BR">Brazil</option>
                                        <option value="IO">British Indian Ocean Territory</option>
                                        <option value="BN">Brunei Darussalam</option>
                                        <option value="BG">Bulgaria</option>
                                        <option value="BF">Burkina Faso</option>
                                        <option value="BI">Burundi</option>
                                        <option value="KH">Cambodia</option>
                                        <option value="CM">Cameroon</option>
                                        <option value="CA">Canada</option>
                                        <option value="CV">Cape Verde</option>
                                        <option value="KY">Cayman Islands</option>
                                        <option value="CF">Central African Republic</option>
                                        <option value="TD">Chad</option>
                                        <option value="CL">Chile</option>
                                        <option value="CN">China</option>
                                        <option value="CX">Christmas Island</option>
                                        <option value="CC">Cocos (Keeling) Islands</option>
                                        <option value="CO">Colombia</option>
                                        <option value="KM">Comoros</option>
                                        <option value="CG">Congo</option>
                                        <option value="CD">Congo, the Democratic Republic of the</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Côte d'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curaçao</option>
                                        <option value="CY">Cyprus</option>
                                        <option value="CZ">Czech Republic</option>
                                        <option value="DK">Denmark</option>
                                        <option value="DJ">Djibouti</option>
                                        <option value="DM">Dominica</option>
                                        <option value="DO">Dominican Republic</option>
                                        <option value="EC">Ecuador</option>
                                        <option value="EG">Egypt</option>
                                        <option value="SV">El Salvador</option>
                                        <option value="GQ">Equatorial Guinea</option>
                                        <option value="ER">Eritrea</option>
                                        <option value="EE">Estonia</option>
                                        <option value="ET">Ethiopia</option>
                                        <option value="FK">Falkland Islands (Malvinas)</option>
                                        <option value="FO">Faroe Islands</option>
                                        <option value="FJ">Fiji</option>
                                        <option value="FI">Finland</option>
                                        <option value="FR">France</option>
                                        <option value="GF">French Guiana</option>
                                        <option value="PF">French Polynesia</option>
                                        <option value="TF">French Southern Territories</option>
                                        <option value="GA">Gabon</option>
                                        <option value="GM">Gambia</option>
                                        <option value="GE">Georgia</option>
                                        <option value="DE">Germany</option>
                                        <option value="GH">Ghana</option>
                                        <option value="GI">Gibraltar</option>
                                        <option value="GR">Greece</option>
                                        <option value="GL">Greenland</option>
                                        <option value="GD">Grenada</option>
                                        <option value="GP">Guadeloupe</option>
                                        <option value="GU">Guam</option>
                                        <option value="GT">Guatemala</option>
                                        <option value="GG">Guernsey</option>
                                        <option value="GN">Guinea</option>
                                        <option value="GW">Guinea-Bissau</option>
                                        <option value="GY">Guyana</option>
                                        <option value="HT">Haiti</option>
                                        <option value="HM">Heard Island and McDonald Islands</option>
                                        <option value="VA">Holy See (Vatican City State)</option>
                                        <option value="HN">Honduras</option>
                                        <option value="HK">Hong Kong</option>
                                        <option value="HU">Hungary</option>
                                        <option value="IS">Iceland</option>
                                        <option value="IN">India</option>
                                        <option value="ID">Indonesia</option>
                                        <option value="IR">Iran, Islamic Republic of</option>
                                        <option value="IQ">Iraq</option>
                                        <option value="IE">Ireland</option>
                                        <option value="IM">Isle of Man</option>
                                        <option value="IL">Israel</option>
                                        <option value="IT">Italy</option>
                                        <option value="JM">Jamaica</option>
                                        <option value="JP">Japan</option>
                                        <option value="JE">Jersey</option>
                                        <option value="JO">Jordan</option>
                                        <option value="KZ">Kazakhstan</option>
                                        <option value="KE">Kenya</option>
                                        <option value="KI">Kiribati</option>
                                        <option value="KP">Korea, Democratic People's Republic of</option>
                                        <option value="KR">Korea, Republic of</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the former Yugoslav Republic of</option>
                                        <option value="MG">Madagascar</option>
                                        <option value="MW">Malawi</option>
                                        <option value="MY">Malaysia</option>
                                        <option value="MV">Maldives</option>
                                        <option value="ML">Mali</option>
                                        <option value="MT">Malta</option>
                                        <option value="MH">Marshall Islands</option>
                                        <option value="MQ">Martinique</option>
                                        <option value="MR">Mauritania</option>
                                        <option value="MU">Mauritius</option>
                                        <option value="YT">Mayotte</option>
                                        <option value="MX">Mexico</option>
                                        <option value="FM">Micronesia, Federated States of</option>
                                        <option value="MD">Moldova, Republic of</option>
                                        <option value="MC">Monaco</option>
                                        <option value="MN">Mongolia</option>
                                        <option value="ME">Montenegro</option>
                                        <option value="MS">Montserrat</option>
                                        <option value="MA">Morocco</option>
                                        <option value="MZ">Mozambique</option>
                                        <option value="MM">Myanmar</option>
                                        <option value="NA">Namibia</option>
                                        <option value="NR">Nauru</option>
                                        <option value="NP">Nepal</option>
                                        <option value="NL">Netherlands</option>
                                        <option value="NC">New Caledonia</option>
                                        <option value="NZ">New Zealand</option>
                                        <option value="NI">Nicaragua</option>
                                        <option value="NE">Niger</option>
                                        <option value="NG">Nigeria</option>
                                        <option value="NU">Niue</option>
                                        <option value="NF">Norfolk Island</option>
                                        <option value="MP">Northern Mariana Islands</option>
                                        <option value="NO">Norway</option>
                                        <option value="OM">Oman</option>
                                        <option value="PK">Pakistan</option>
                                        <option value="PW">Palau</option>
                                        <option value="PS">Palestinian Territory, Occupied</option>
                                        <option value="PA">Panama</option>
                                        <option value="PG">Papua New Guinea</option>
                                        <option value="PY">Paraguay</option>
                                        <option value="PE">Peru</option>
                                        <option value="PH">Philippines</option>
                                        <option value="PN">Pitcairn</option>
                                        <option value="PL">Poland</option>
                                        <option value="PT">Portugal</option>
                                        <option value="PR">Puerto Rico</option>
                                        <option value="QA">Qatar</option>
                                        <option value="RE">Réunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthélemy</option>
                                        <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin (French part)</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten (Dutch part)</option>
                                        <option value="SK">Slovakia</option>
                                        <option value="SI">Slovenia</option>
                                        <option value="SB">Solomon Islands</option>
                                        <option value="SO">Somalia</option>
                                        <option value="ZA">South Africa</option>
                                        <option value="GS">South Georgia and the South Sandwich Islands</option>
                                        <option value="SS">South Sudan</option>
                                        <option value="ES">Spain</option>
                                        <option value="LK">Sri Lanka</option>
                                        <option value="SD">Sudan</option>
                                        <option value="SR">Suriname</option>
                                        <option value="SJ">Svalbard and Jan Mayen</option>
                                        <option value="SZ">Swaziland</option>
                                        <option value="SE">Sweden</option>
                                        <option value="CH">Switzerland</option>
                                        <option value="SY">Syrian Arab Republic</option>
                                        <option value="TW">Taiwan, Province of China</option>
                                        <option value="TJ">Tajikistan</option>
                                        <option value="TZ">Tanzania, United Republic of</option>
                                        <option value="TH">Thailand</option>
                                        <option value="TL">Timor-Leste</option>
                                        <option value="TG">Togo</option>
                                        <option value="TK">Tokelau</option>
                                        <option value="TO">Tonga</option>
                                        <option value="TT">Trinidad and Tobago</option>
                                        <option value="TN">Tunisia</option>
                                        <option value="TR">Turkey</option>
                                        <option value="TM">Turkmenistan</option>
                                        <option value="TC">Turks and Caicos Islands</option>
                                        <option value="TV">Tuvalu</option>
                                        <option value="UG">Uganda</option>
                                        <option value="UA">Ukraine</option>
                                        <option value="AE">United Arab Emirates</option>
                                        <option value="GB">United Kingdom</option>
                                        <option value="US">United States</option>
                                        <option value="UM">United States Minor Outlying Islands</option>
                                        <option value="UY">Uruguay</option>
                                        <option value="UZ">Uzbekistan</option>
                                        <option value="VU">Vanuatu</option>
                                        <option value="VE">Venezuela, Bolivarian Republic of</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.S.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>   
                            <div class="col-sm-6">                    
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">VAT Number</label>
                                    <input type="email" data-recurly="last_name" class="form-control" id="exampleFormControlInput1">
                                </div>   
                            </div>   
                        </div>   
                        <div class="row">
                            <div class="col-sm-6">                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Street Address</label>
                                    <input type="email" data-recurly="first_name" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>   
                            <div class="col-sm-6">                    
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Address 2</label>
                                    <input type="email" data-recurly="last_name" class="form-control" id="exampleFormControlInput1">
                                </div>   
                            </div>   
                        </div> 
                        <div class="row">
                            <div class="col-sm-6">                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">City</label>
                                    <input type="email" data-recurly="first_name" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>   
                            <div class="col-sm-6">                    
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">State</label>
                                    <input type="email" data-recurly="last_name" class="form-control" id="exampleFormControlInput1">
                                </div>   
                            </div>   
                        </div> 
                        <div class="row">
                            <div class="col-sm-6">                
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Postal</label>
                                    <input type="email" data-recurly="first_name" class="form-control" id="exampleFormControlInput1">
                                </div>
                            </div>  
                        </div> 
                    </div>
                </div>
                <section id="my-checkout">
                <div class="card mb-5">
                    <div class="card-header">
                        Coupon
                    </div>            
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">                
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control" data-recurly="coupon">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Apply</button>
                                    </div>
                                </div>
                                <div id="coupon-errors" class="alert" role="alert"></div>
                            </div> 
                        </div>   
                    </div>                                        
                </div> 
                <div class="card text-white bg-secondary mb-5">
                    <div class="card-header">{{ $plan->getName() }}</div>
                    <div class="card-body">
                      
                            <input type="hidden" data-recurly="plan" value="{{ $plan->getCode() }}">    
                            <input type="hidden" data-recurly="plan_quantity" id="plan_quantity" value="1">    
                            <input type="hidden" data-recurly="currency" id="currency" value="GBP">         

                            <div class="row mb-2">
                                <div class="col-sm-8">   
                                    Plan
                                </div>
                                <div class="col-sm-4 text-right">   
                                    <span data-recurly="currency_symbol"></span>
                                    <span data-recurly="plan_now">0.00</span>
                                    <small><span data-recurly="currency_code"></span></small>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-8">        
                                    Discount
                                </div>
                                <div class="col-sm-4 text-right">   
                                    <span data-recurly="currency_symbol"></span>
                                    <span data-recurly="discount_now">0.00</span>
                                    <small><span data-recurly="currency_code"></span></small>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-8">        
                                    Subtotal
                                </div>
                                <div class="col-sm-4 text-right">   
                                    <span data-recurly="currency_symbol"></span>
                                    <span data-recurly="subtotal_now">0.00</span>
                                    <small><span data-recurly="currency_code"></span></small>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-8">           
                                    Tax
                                </div>
                                <div class="col-sm-4 text-right">   
                                    <span data-recurly="currency_symbol"></span>
                                    <span data-recurly="tax_now">0.00</span>
                                    <small><span data-recurly="currency_code"></span></small>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-sm-8">           
                                    <strong>Order Total</strong>
                                </div>
                                <div class="col-sm-4 text-right">   
                                    <strong>
                                    <span data-recurly="currency_symbol"></span>
                                    <span data-recurly="total_now">0.00</span>
                                    <small><span data-recurly="currency_code"></span></small>
                                    </strong>
                                </div>
                            </div>                                   
                    </div>
                </div>
                </section>
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">I accept the <a target="_blank" rel="nofollow noopener" href="">Privacy Policy</a> and <a target="_blank" rel="nofollow noopener" href="">Terms of Service</a>.</label>
                </div>
                <button type="submit" class="btn btn-lg btn-info">Subscribe</button>

                <input type="hidden" name="recurly-token" data-recurly="token">   
            </form>                                 
        </div> 
        <!--
        <script>
            //recurly.configure('{{ env("RECURLY_PUBLIC_KEY") }}');
        </script>
        -->
    </div>
</div>
@endsection

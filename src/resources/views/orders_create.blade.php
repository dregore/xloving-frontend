@extends('layouts.admin')

@section('main-content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Create Order') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-12 order-lg-2">

        <div class="card shadow mb-4">
            <div class="card-body">

                <form method="POST" action="{{ route('orders.store') }}" autocomplete="off">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="hidden" name="_method" value="POST">

                    <h6 class="heading-small text-muted mb-4">Create new order</h6>

                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group focused">
                                    <label class="form-control-label">Order type</label>
                                    <select class="form-control" name="order_type" id="order_type">
                                        <option value="0">Choose</option>
                                        <option value="install">Install App</option>
                                        <option value="tiktok">Tiktok</option>
                                        <option value="youtube">Youtube</option>
                                        <!-- <option value="import_chrome_cookies">import_chrome_cookies</option> -->
                                        <!-- <option value="export_chrome_cookies">export_chrome_cookies</option> -->
                                    </select>
                                </div>
                            </div>
                            <!-- Install Order -->
                            <div class="col-lg-4 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="app_name">App name</label>
                                    <input type="text" id="app_name" class="form-control" name="app_name" placeholder="Live Wallpapers, 4K Wallpapers">
                                </div>
                            </div>
                            <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="app_bundle">App bundle<span class="small text-danger">*</span></label>
                                    <input type="text" id="app_bundle" class="form-control" name="app_bundle" placeholder="hd.uhd.live.wallpapers.topwallpapers">
                                </div>
                            </div>
                            <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Delete</label>
                                    <select class="form-control" name="delete" id="delete">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tiktok Order -->
                            <div class="col-lg-4 tiktok" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="tiktok_url">Video url</label>
                                    <input type="text" id="tiktok_url" class="form-control" name="tiktok_url" placeholder="https://www.tiktok.com/@emzoo4ka/video/7071294504153746690">
                                </div>
                            </div>

                            <div class="col-lg-2 tiktok" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Like</label>
                                    <select class="form-control" name="tiktok_like" id="tiktok_like">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 tiktok" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Share</label>
                                    <select class="form-control" name="share" id="share">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Youtube Order -->
                            <div class="col-lg-4 youtube" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="youtube_url">Video url</label>
                                    <input type="text" id="youtube_url" class="form-control" name="youtube_url" placeholder="https://www.youtube.com/watch?v=sZxaOqn00Is">
                                </div>
                            </div>

                            <div class="col-lg-2 youtube" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Like</label>
                                    <select class="form-control" name="youtube_like" id="youtube_like">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>

                            <!-- export_chrome_cookies order -->
                            <?/* */ ?>
                            <div class="col-lg-2 export_chrome_cookies" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Cookies</label>
                                    <select class="form-control" name="cookies" id="cookies">
                                        @foreach($xcookies['data'] as $item)
                                        <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <?/**/ ?>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Review?</label>
                                    <select class="form-control" name="install_review" id="install_review">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 install" id="rage" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="customRange2">Review's percents</label>
                                    <input type="range" class="form-control" min="0" max="100" id="customRange2" name="customRange2" value="50" oninput="this.nextElementSibling.value = this.value">
                                    <output>50</output>
                                </div>
                            </div>

                            <div class="col-lg-2 install" id="rate" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="rating">Rating</label>
                                    <br />
                                    <div class="rate">
                                        <input type="radio" id="star5" class="rate" name="rating" value="5" />
                                        <label for="star5" title="text">5 stars</label>
                                        <input type="radio" id="star4" class="rate" name="rating" value="4" />
                                        <label for="star4" title="text">4 stars</label>
                                        <input type="radio" id="star3" class="rate" name="rating" value="3" />
                                        <label for="star3" title="text">3 stars</label>
                                        <input type="radio" id="star2" class="rate" name="rating" value="2" />
                                        <label for="star2" title="text">2 stars</label>
                                        <input type="radio" id="star1" class="rate" name="rating" value="1" />
                                        <label for="star1" title="text">1 star</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-2 allkind" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Country</label>
                                    <select class="form-control" name="country" id="country">
                                        <option value="any">ANY</option>
                                        <option value="AF">Afghanistan</option>
                                        <option value="AX">Aland Islands</option>
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
                                        <option value="BO">Bolivia</option>
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
                                        <option value="CD">Congo, Democratic Republic of the Congo</option>
                                        <option value="CK">Cook Islands</option>
                                        <option value="CR">Costa Rica</option>
                                        <option value="CI">Cote D'Ivoire</option>
                                        <option value="HR">Croatia</option>
                                        <option value="CU">Cuba</option>
                                        <option value="CW">Curacao</option>
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
                                        <option value="HM">Heard Island and Mcdonald Islands</option>
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
                                        <option value="XK">Kosovo</option>
                                        <option value="KW">Kuwait</option>
                                        <option value="KG">Kyrgyzstan</option>
                                        <option value="LA">Lao People's Democratic Republic</option>
                                        <option value="LV">Latvia</option>
                                        <option value="LB">Lebanon</option>
                                        <option value="LS">Lesotho</option>
                                        <option value="LR">Liberia</option>
                                        <option value="LY">Libyan Arab Jamahiriya</option>
                                        <option value="LI">Liechtenstein</option>
                                        <option value="LT">Lithuania</option>
                                        <option value="LU">Luxembourg</option>
                                        <option value="MO">Macao</option>
                                        <option value="MK">Macedonia, the Former Yugoslav Republic of</option>
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
                                        <option value="AN">Netherlands Antilles</option>
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
                                        <option value="RE">Reunion</option>
                                        <option value="RO">Romania</option>
                                        <option value="RU">Russian Federation</option>
                                        <option value="RW">Rwanda</option>
                                        <option value="BL">Saint Barthelemy</option>
                                        <option value="SH">Saint Helena</option>
                                        <option value="KN">Saint Kitts and Nevis</option>
                                        <option value="LC">Saint Lucia</option>
                                        <option value="MF">Saint Martin</option>
                                        <option value="PM">Saint Pierre and Miquelon</option>
                                        <option value="VC">Saint Vincent and the Grenadines</option>
                                        <option value="WS">Samoa</option>
                                        <option value="SM">San Marino</option>
                                        <option value="ST">Sao Tome and Principe</option>
                                        <option value="SA">Saudi Arabia</option>
                                        <option value="SN">Senegal</option>
                                        <option value="RS">Serbia</option>
                                        <option value="CS">Serbia and Montenegro</option>
                                        <option value="SC">Seychelles</option>
                                        <option value="SL">Sierra Leone</option>
                                        <option value="SG">Singapore</option>
                                        <option value="SX">Sint Maarten</option>
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
                                        <option value="VE">Venezuela</option>
                                        <option value="VN">Viet Nam</option>
                                        <option value="VG">Virgin Islands, British</option>
                                        <option value="VI">Virgin Islands, U.s.</option>
                                        <option value="WF">Wallis and Futuna</option>
                                        <option value="EH">Western Sahara</option>
                                        <option value="YE">Yemen</option>
                                        <option value="ZM">Zambia</option>
                                        <option value="ZW">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Install order -->
                            <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="retention">Retention (days)</label>
                                    <!-- <input type="number" id="retention" class="form-control" name="retention" step="1" value="1" max="100"> -->
                                    <select class="form-control" name="retention[]" id="retention" multiple="multiple">
                                        @for ($i = 1; $i < 101; $i++)
                                            <option value="{{$i}}">{{$i}} days</option>
                                            @endfor
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 install" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="fill_type">Fill type</label>
                                            <select class="form-control" name="fill_type" id="fill_type">
                                                <option value="fast">Fast</option>
                                                <option value="spread">Spread</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="spread_days">Spread days</label>
                                            <input type="number" id="spread_days" class="form-control" name="spread_days" step="1" value="1" min="1" max="100" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label">Fill type</label>
                                    <select class="form-control" name="fill_type" id="fill_type">
                                        <option value="fast">Fast</option>
                                        <option value="spread">Spread</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="open_time">Open time (mins)</label>
                                    <input type="text" id="open_time" class="form-control" name="open_time">
                                </div>
                            </div> -->

                            <!-- <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="search_term">Search term</label>
                                    <input type="text" id="search_term" class="form-control" name="search_term">
                                </div>
                            </div> -->

                            <div class="col-lg-2 install" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="search_term">Search term</label>
                                            <input type="text" id="search_term" class="form-control" name="search_term">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="search_term_null">Search null?</label>
                                            <select class="form-control" name="search_term_null" id="search_term_null">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="deeplink_page">Deeplink page open?</label>
                                    <select class="form-control" name="deeplink_page" id="deeplink_page">
                                        <option value="0">No</option>
                                        <option value="1">Yes</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-2 install" style="display: none;">
                                <div class="form-group">
                                    <label class="form-control-label" for="scroll_duration">Scroll timeout</label>
                                    <input type="number" id="scroll_duration" class="form-control" name="scroll_duration" step="1" value="30" min="30">
                                </div>
                            </div>
                        </div>

                        <!-- allkind order -->
                        <div class="row allkind" style="display: none;">
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="amount">Number of tasks</label>
                                    <input type="number" id="amount" class="form-control" name="amount" step="1" value="1">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="form-control-label" for="attempts">Attempts</label>
                                    <input type="number" id="attempts" class="form-control" name="attempts" step="1" value="3">
                                </div>
                            </div>
                            <div class="col-lg-2 nocookie">
                                <div class="form-group">
                                    <label class="form-control-label" for="delay_min">Delay min</label>
                                    <input type="number" id="delay_min" class="form-control" name="delay_min" step="1" value="1">
                                </div>
                            </div>
                            <div class="col-lg-2 nocookie">
                                <div class="form-group">
                                    <label class="form-control-label" for="delay_max">Delay max</label>
                                    <input type="number" id="delay_max" class="form-control" name="delay_max" step="1" value="4">
                                </div>
                            </div>
                            <div class="col-lg-2 nocookie">
                                <div class="form-group">
                                    <label class="form-control-label" for="minutes">Minutes</label>
                                    <input type="number" id="minutes" class="form-control" name="minutes" step="1" value="1">
                                </div>
                            </div>
                            <div class="col-lg-2 nocookie">
                                <div class="form-group">
                                    <label class="form-control-label" for="seconds">Seconds</label>
                                    <input type="number" id="seconds" class="form-control" name="seconds" step="1" value="23">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Button -->
                    <div class="pl-lg-4">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    </div>
</div>

@endsection
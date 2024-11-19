<?php
    require_once('header.php');
?>
<script type="text/javascript" src="<?php echo plugin_dir_url( __FILE__ ) ?>assets/js/page_stafflist.js?ver=8"></script>

<h1>Staff List</h1>
<div class="portlet-body" id="tabswidget">
     <ul class="nav nav-tabs">
        <li class="active" id="tabmenu-first">
            <a href="#tab-list" data-toggle="tab">Staff List</a>
        </li>
        <li id="tabmenu-second">
            <a href="#tab-add" data-toggle="tab">Adicionar novo</a>
        </li>
    </ul>   
    <div class="tab-content">
        <div class="tab-pane fade active in" id="tab-list">
            <div class="">
                <input type="text" name="" id="staff-search" placeholder="Procurar por nome" style="width:200px; border-radius:2em; margin-top:30px">
                <select id="search-staff-category" style="width: 150px; margin:20px">
                    <option value="">Todos</option>
                </select>
                <!-- <button class="btn btn-primary" id="search-staff" style="border-radius: 2em">Search</button> -->
            </div>
            <div id="pagination-above"></div>
            <div id="tab-list-content">
                <table>
                    <thead>
                        <!-- <th>No</th> -->
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Telefone2</th>
                        <th>Fax</th>
                        <th>E-mail</th>
                        <th>Nacionalidade</th>
                        <th>Idiomas</th>
                        <th>Países licenciados<br>para advogar</th>
                        <th>Curriculum Vitae</th>
                        <th>Links Sociais</th>
                        <th>Tipo de Pessoa</th>
                        <th>Seção</th>
                        <th></th>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div id="pagination-bellow"></div>
        </div>
        <div class="tab-pane fade" id="tab-add">
            <table>
                <body>
                    <tr>
                         <td>Categoria</td>
                        <td>
                            <select class="disable-item" id="staff-category">
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td><input class="disable-item" type="text" name="" id="staff-name"></td>
                    </tr>
                    <tr>
                        <td>Endereço</td>
                        <td><input class="disable-item" type="text" name="" id="staff-address"></td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td><input class="disable-item" type="text" name="" id="staff-phone"></td>
                    </tr>
                    <tr>
                        <td>Telefone2</td>
                        <td><input class="disable-item" type="text" name="" id="staff-phone2"></td>
                    </tr>
                    <tr>
                        <td>Fax</td>
                        <td><input class="disable-item" type="text" name="" id="staff-fax"></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input class="disable-item" type="text" name="" id="staff-email"></td>
                    </tr>
                    <tr>
                        <td>Nacionalidade</td>
                        <td>
                            <select class="disable-item" multiple="multiple" id="staff-nationality">
                            <!-- <select class="disable-item" id="staff-nationality"> -->
                                <!-- <option value="">No selected</option> -->
                                <option value="Afghan">Afghan</option>
                                <option value="Albanian">Albanian</option>
                                <option value="Algerian">Algerian</option>
                                <option value="American">American</option>
                                <option value="Andorran">Andorran</option>
                                <option value="Angolan">Angolan</option>
                                <option value="Antiguans">Antiguans</option>
                                <option value="Argentinean">Argentinean</option>
                                <option value="Armenian">Armenian</option>
                                <option value="Australian">Australian</option>
                                <option value="Austrian">Austrian</option>
                                <option value="Azerbaijani">Azerbaijani</option>
                                <option value="Bahamian">Bahamian</option>
                                <option value="Bahraini">Bahraini</option>
                                <option value="Bangladeshi">Bangladeshi</option>
                                <option value="Barbadian">Barbadian</option>
                                <option value="Barbudans">Barbudans</option>
                                <option value="Batswana">Batswana</option>
                                <option value="Belarusian">Belarusian</option>
                                <option value="Belgian">Belgian</option>
                                <option value="Belizean">Belizean</option>
                                <option value="Beninese">Beninese</option>
                                <option value="Bhutanese">Bhutanese</option>
                                <option value="Bolivian">Bolivian</option>
                                <option value="Bosnian">Bosnian</option>
                                <option value="Brazilian">Brazilian</option>
                                <option value="British">British</option>
                                <option value="Bruneian">Bruneian</option>
                                <option value="Bulgarian">Bulgarian</option>
                                <option value="Burkinabe">Burkinabe</option>
                                <option value="Burmese">Burmese</option>
                                <option value="Burundian">Burundian</option>
                                <option value="Cambodian">Cambodian</option>
                                <option value="Cameroonian">Cameroonian</option>
                                <option value="Canadian">Canadian</option>
                                <option value="Cape Verdean">Cape Verdean</option>
                                <option value="Central African">Central African</option>
                                <option value="Chadian">Chadian</option>
                                <option value="Chilean">Chilean</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Colombian">Colombian</option>
                                <option value="Comoran">Comoran</option>
                                <option value="Congolese">Congolese</option>
                                <option value="Costa rican">Costa Rican</option>
                                <option value="Croatian">Croatian</option>
                                <option value="Cuban">Cuban</option>
                                <option value="Cypriot">Cypriot</option>
                                <option value="Czech">Czech</option>
                                <option value="Danish">Danish</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominican">Dominican</option>
                                <option value="Dutch">Dutch</option>
                                <option value="East timorese">East Timorese</option>
                                <option value="Ecuadorean">Ecuadorean</option>
                                <option value="Egyptian">Egyptian</option>
                                <option value="Emirian">Emirian</option>
                                <option value="English">English</option>
                                <option value="Equatorial Guinean">Equatorial Guinean</option>
                                <option value="Eritrean">Eritrean</option>
                                <option value="Estonian">Estonian</option>
                                <option value="Ethiopian">Ethiopian</option>
                                <option value="Fijian">Fijian</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Finnish">Finnish</option>
                                <option value="French">French</option>
                                <option value="Gabonese">Gabonese</option>
                                <option value="Gambian">Gambian</option>
                                <option value="Georgian">Georgian</option>
                                <option value="German">German</option>
                                <option value="Ghanaian">Ghanaian</option>
                                <option value="Greek">Greek</option>
                                <option value="Grenadian">Grenadian</option>
                                <option value="Guatemalan">Guatemalan</option>
                                <option value="Guinea-bissauan">Guinea-Bissauan</option>
                                <option value="Guinean">Guinean</option>
                                <option value="Guyanese">Guyanese</option>
                                <option value="Gaitian">Haitian</option>
                                <option value="Herzegovinian">Herzegovinian</option>
                                <option value="Honduran">Honduran</option>
                                <option value="Hungarian">Hungarian</option>
                                <option value="Icelander">Icelander</option>
                                <option value="Indian">Indian</option>
                                <option value="Indonesian">Indonesian</option>
                                <option value="Iranian">Iranian</option>
                                <option value="Iraqi">Iraqi</option>
                                <option value="Irish">Irish</option>
                                <option value="Israeli">Israeli</option>
                                <option value="Italian">Italian</option>
                                <option value="Ivorian">Ivorian</option>
                                <option value="Jamaican">Jamaican</option>
                                <option value="Japanese">Japanese</option>
                                <option value="Jordanian">Jordanian</option>
                                <option value="Kazakhstani">Kazakhstani</option>
                                <option value="Kenyan">Kenyan</option>
                                <option value="Kittian and Nevisian">Kittian and Nevisian</option>
                                <option value="Kuwaiti">Kuwaiti</option>
                                <option value="Kyrgyz">Kyrgyz</option>
                                <option value="Laotian">Laotian</option>
                                <option value="Latvian">Latvian</option>
                                <option value="Lebanese">Lebanese</option>
                                <option value="Liberian">Liberian</option>
                                <option value="Libyan">Libyan</option>
                                <option value="Liechtensteiner">Liechtensteiner</option>
                                <option value="Lithuanian">Lithuanian</option>
                                <option value="Luxembourger">Luxembourger</option>
                                <option value="Macedonian">Macedonian</option>
                                <option value="Malagasy">Malagasy</option>
                                <option value="Malawian">Malawian</option>
                                <option value="Malaysian">Malaysian</option>
                                <option value="Maldivan">Maldivan</option>
                                <option value="Malian">Malian</option>
                                <option value="Maltese">Maltese</option>
                                <option value="Marshallese">Marshallese</option>
                                <option value="Mauritanian">Mauritanian</option>
                                <option value="Mauritian">Mauritian</option>
                                <option value="Mexican">Mexican</option>
                                <option value="Micronesian">Micronesian</option>
                                <option value="Moldovan">Moldovan</option>
                                <option value="Monacan">Monacan</option>
                                <option value="Mongolian">Mongolian</option>
                                <option value="Moroccan">Moroccan</option>
                                <option value="Mosotho">Mosotho</option>
                                <option value="Motswana">Motswana</option>
                                <option value="Mozambican">Mozambican</option>
                                <option value="Namibian">Namibian</option>
                                <option value="Nauruan">Nauruan</option>
                                <option value="Nepalese">Nepalese</option>
                                <option value="New Zealander">New Zealander</option>
                                <option value="Ni-Vanuatu">Ni-Vanuatu</option>
                                <option value="Nicaraguan">Nicaraguan</option>
                                <option value="Nigerien">Nigerien</option>
                                <option value="North Korean">North Korean</option>
                                <option value="Northern Irish">Northern Irish</option>
                                <option value="Norwegian">Norwegian</option>
                                <option value="Omani">Omani</option>
                                <option value="Pakistani">Pakistani</option>
                                <option value="Palauan">Palauan</option>
                                <option value="Panamanian">Panamanian</option>
                                <option value="Papua New Guinean">Papua New Guinean</option>
                                <option value="Paraguayan">Paraguayan</option>
                                <option value="Peruvian">Peruvian</option>
                                <option value="Polish">Polish</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Qatari">Qatari</option>
                                <option value="Romanian">Romanian</option>
                                <option value="Russian">Russian</option>
                                <option value="Rwandan">Rwandan</option>
                                <option value="Saint Lucian">Saint Lucian</option>
                                <option value="Salvadoran">Salvadoran</option>
                                <option value="Samoan">Samoan</option>
                                <option value="San Marinese">San Marinese</option>
                                <option value="Sao Tomean">Sao Tomean</option>
                                <option value="Saudi">Saudi</option>
                                <option value="Scottish">Scottish</option>
                                <option value="Senegalese">Senegalese</option>
                                <option value="Serbian">Serbian</option>
                                <option value="Seychellois">Seychellois</option>
                                <option value="Sierra leonean">Sierra Leonean</option>
                                <option value="Singaporean">Singaporean</option>
                                <option value="Slovakian">Slovakian</option>
                                <option value="Slovenian">Slovenian</option>
                                <option value="Solomon islander">Solomon Islander</option>
                                <option value="Somali">Somali</option>
                                <option value="South african">South African</option>
                                <option value="South korean">South Korean</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Sri Lankan">Sri Lankan</option>
                                <option value="Sudanese">Sudanese</option>
                                <option value="Surinamer">Surinamer</option>
                                <option value="Swazi">Swazi</option>
                                <option value="Swedish">Swedish</option>
                                <option value="Swiss">Swiss</option>
                                <option value="Syrian">Syrian</option>
                                <option value="Taiwanese">Taiwanese</option>
                                <option value="Tajik">Tajik</option>
                                <option value="Tanzanian">Tanzanian</option>
                                <option value="Thai">Thai</option>
                                <option value="Togolese">Togolese</option>
                                <option value="Tongan">Tongan</option>
                                <option value="Trinidadian or Tobagonian">Trinidadian or Tobagonian</option>
                                <option value="Tunisian">Tunisian</option>
                                <option value="Turkish">Turkish</option>
                                <option value="Tuvaluan">Tuvaluan</option>
                                <option value="Ugandan">Ugandan</option>
                                <option value="Ukrainian">Ukrainian</option>
                                <option value="Uruguayan">Uruguayan</option>
                                <option value="Uzbekistani">Uzbekistani</option>
                                <option value="Venezuelan">Venezuelan</option>
                                <option value="Vietnamese">Vietnamese</option>
                                <option value="Welsh">Welsh</option>
                                <option value="Yemenite">Yemenite</option>
                                <option value="Zambian">Zambian</option>
                                <option value="Zimbabwean">Zimbabwean</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Idiomas</td>
                        <td>
                            <select class="disable-item" multiple="multiple" id="staff-languages">
                                <option value="af">Afrikanns</option>
                                <option value="sq">Albanian</option>
                                <option value="ar">Arabic</option>
                                <option value="hy">Armenian</option>
                                <option value="eu">Basque</option>
                                <option value="bn">Bengali</option>
                                <option value="bg">Bulgarian</option>
                                <option value="ca">Catalan</option>
                                <!-- <option value="Cambodian">Cambodian</option> -->
                                <option value="zh">Chinese (Mandarin)</option>
                                <!-- <option value="Croation">Croation</option> -->
                                <option value="cs">Czech</option>
                                <option value="da">Danish</option>
                                <option value="nl">Dutch</option>
                                <option value="en">English</option>
                                <option value="et">Estonian</option>
                                <option value="hif">Fiji Hindi</option>
                                <option value="fi">Finnish</option>
                                <option value="fr">French</option>
                                <option value="ka">Georgian</option>
                                <option value="de">German</option>
                                <option value="el">Greek</option>
                                <option value="gu">Gujarati</option>
                                <option value="he">Hebrew</option>
                                <option value="hi">Hindi</option>
                                <option value="hu">Hungarian</option>
                                <option value="is">Icelandic</option>
                                <option value="id">Indonesian</option>
                                <option value="ga">Irish</option>
                                <option value="it">Italian</option>
                                <option value="ja">Japanese</option>
                                <option value="jv">Javanese</option>
                                <option value="ko">Korean</option>
                                <option value="la">Latin</option>
                                <option value="lv">Latvian</option>
                                <option value="lt">Lithuanian</option>
                                <option value="mk">Macedonian</option>
                                <option value="ms">Malay</option>
                                <option value="ml">Malayalam</option>
                                <option value="mt">Maltese</option>
                                <option value="mi">Maori</option>
                                <option value="mr">Marathi</option>
                                <option value="mn">Mongolian</option>
                                <option value="ne">Nepali</option>
                                <option value="no">Norwegian</option>
                                <option value="fa">Persian</option>
                                <option value="pl">Polish</option>
                                <option value="pt">Portuguese</option>
                                <option value="pa">Punjabi</option>
                                <option value="qu">Quechua</option>
                                <option value="ro">Romanian</option>
                                <option value="ru">Russian</option>
                                <option value="sm">Samoan</option>
                                <option value="sr">Serbian</option>
                                <option value="sk">Slovak</option>
                                <option value="sl">Slovenian</option>
                                <option value="es">Spanish</option>
                                <option value="sw">Swahili</option>
                                <option value="sv ">Swedish </option>
                                <option value="ta">Tamil</option>
                                <option value="tt">Tatar</option>
                                <option value="te">Telugu</option>
                                <option value="th">Thai</option>
                                <option value="bo">Tibetan</option>
                                <option value="to">Tongan</option>
                                <option value="tr">Turkish</option>
                                <!-- <option value="Ukranian">Ukranian</option> -->
                                <option value="ur">Urdu</option>
                                <option value="uz">Uzbek</option>
                                <option value="vi">Vietnamese</option>
                                <option value="cy">Welsh</option>
                                <option value="xh">Xhosa</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Países licenciados para advogar</td>
                        <td>
                            <select class="disable-item" multiple="multiple" id="staff-licensed">
                                <option value="Afghanistan">Afghanistan</option> 
                                <option value="Albania">Albania</option> 
                                <option value="Algeria">Algeria</option> 
                                <option value="American Samoa">American Samoa</option> 
                                <option value="Andorra">Andorra</option> 
                                <option value="Angola">Angola</option> 
                                <option value="Anguilla">Anguilla</option> 
                                <option value="Antarctica">Antarctica</option> 
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                                <option value="Argentina">Argentina</option> 
                                <option value="Armenia">Armenia</option> 
                                <option value="Aruba">Aruba</option> 
                                <option value="Australia">Australia</option> 
                                <option value="Austria">Austria</option> 
                                <option value="Azerbaijan">Azerbaijan</option> 
                                <option value="Bahamas">Bahamas</option> 
                                <option value="Bahrain">Bahrain</option> 
                                <option value="Bangladesh">Bangladesh</option> 
                                <option value="Barbados">Barbados</option> 
                                <option value="Belarus">Belarus</option> 
                                <option value="Belgium">Belgium</option> 
                                <option value="Belize">Belize</option> 
                                <option value="Benin">Benin</option> 
                                <option value="Bermuda">Bermuda</option> 
                                <option value="Bhutan">Bhutan</option> 
                                <option value="Bolivia">Bolivia</option> 
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                                <option value="Botswana">Botswana</option> 
                                <option value="Bouvet Island">Bouvet Island</option> 
                                <option value="Brazil">Brazil</option> 
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                                <option value="Brunei Darussalam">Brunei Darussalam</option> 
                                <option value="Bulgaria">Bulgaria</option> 
                                <option value="Burkina Faso">Burkina Faso</option> 
                                <option value="Burundi">Burundi</option> 
                                <option value="Cambodia">Cambodia</option> 
                                <option value="Cameroon">Cameroon</option> 
                                <option value="Canada">Canada</option> 
                                <option value="Cape Verde">Cape Verde</option> 
                                <option value="Cayman Islands">Cayman Islands</option> 
                                <option value="Central African Republic">Central African Republic</option> 
                                <option value="Chad">Chad</option> 
                                <option value="Chile">Chile</option> 
                                <option value="China">China</option> 
                                <option value="Christmas Island">Christmas Island</option> 
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                                <option value="Colombia">Colombia</option> 
                                <option value="Comoros">Comoros</option> 
                                <option value="Congo">Congo</option> 
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                                <option value="Cook Islands">Cook Islands</option> 
                                <option value="Costa Rica">Costa Rica</option> 
                                <option value="Cote D'ivoire">Cote D'ivoire</option> 
                                <option value="Croatia">Croatia</option> 
                                <option value="Cuba">Cuba</option> 
                                <option value="Cyprus">Cyprus</option> 
                                <option value="Czech Republic">Czech Republic</option> 
                                <option value="Denmark">Denmark</option> 
                                <option value="Djibouti">Djibouti</option> 
                                <option value="Dominica">Dominica</option> 
                                <option value="Dominican Republic">Dominican Republic</option> 
                                <option value="Ecuador">Ecuador</option> 
                                <option value="Egypt">Egypt</option> 
                                <option value="El Salvador">El Salvador</option> 
                                <option value="Equatorial Guinea">Equatorial Guinea</option> 
                                <option value="Eritrea">Eritrea</option> 
                                <option value="Estonia">Estonia</option> 
                                <option value="Ethiopia">Ethiopia</option> 
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                                <option value="Faroe Islands">Faroe Islands</option> 
                                <option value="Fiji">Fiji</option> 
                                <option value="Finland">Finland</option> 
                                <option value="France">France</option> 
                                <option value="French Guiana">French Guiana</option> 
                                <option value="French Polynesia">French Polynesia</option> 
                                <option value="French Southern Territories">French Southern Territories</option> 
                                <option value="Gabon">Gabon</option> 
                                <option value="Gambia">Gambia</option> 
                                <option value="Georgia">Georgia</option> 
                                <option value="Germany">Germany</option> 
                                <option value="Ghana">Ghana</option> 
                                <option value="Gibraltar">Gibraltar</option> 
                                <option value="Greece">Greece</option> 
                                <option value="Greenland">Greenland</option> 
                                <option value="Grenada">Grenada</option> 
                                <option value="Guadeloupe">Guadeloupe</option> 
                                <option value="Guam">Guam</option> 
                                <option value="Guatemala">Guatemala</option> 
                                <option value="Guinea">Guinea</option> 
                                <option value="Guinea-bissau">Guinea-bissau</option> 
                                <option value="Guyana">Guyana</option> 
                                <option value="Haiti">Haiti</option> 
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                                <option value="Honduras">Honduras</option> 
                                <option value="Hong Kong">Hong Kong</option> 
                                <option value="Hungary">Hungary</option> 
                                <option value="Iceland">Iceland</option> 
                                <option value="India">India</option> 
                                <option value="Indonesia">Indonesia</option> 
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                                <option value="Iraq">Iraq</option> 
                                <option value="Ireland">Ireland</option> 
                                <option value="Israel">Israel</option> 
                                <option value="Italy">Italy</option> 
                                <option value="Jamaica">Jamaica</option> 
                                <option value="Japan">Japan</option> 
                                <option value="Jordan">Jordan</option> 
                                <option value="Kazakhstan">Kazakhstan</option> 
                                <option value="Kenya">Kenya</option> 
                                <option value="Kiribati">Kiribati</option> 
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                                <option value="Korea, Republic of">Korea, Republic of</option> 
                                <option value="Kuwait">Kuwait</option> 
                                <option value="Kyrgyzstan">Kyrgyzstan</option> 
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                                <option value="Latvia">Latvia</option> 
                                <option value="Lebanon">Lebanon</option> 
                                <option value="Lesotho">Lesotho</option> 
                                <option value="Liberia">Liberia</option> 
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                                <option value="Liechtenstein">Liechtenstein</option> 
                                <option value="Lithuania">Lithuania</option> 
                                <option value="Luxembourg">Luxembourg</option> 
                                <option value="Macao">Macao</option> 
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                                <option value="Madagascar">Madagascar</option> 
                                <option value="Malawi">Malawi</option> 
                                <option value="Malaysia">Malaysia</option> 
                                <option value="Maldives">Maldives</option> 
                                <option value="Mali">Mali</option> 
                                <option value="Malta">Malta</option> 
                                <option value="Marshall Islands">Marshall Islands</option> 
                                <option value="Martinique">Martinique</option> 
                                <option value="Mauritania">Mauritania</option> 
                                <option value="Mauritius">Mauritius</option> 
                                <option value="Mayotte">Mayotte</option> 
                                <option value="Mexico">Mexico</option> 
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                                <option value="Moldova, Republic of">Moldova, Republic of</option> 
                                <option value="Monaco">Monaco</option> 
                                <option value="Mongolia">Mongolia</option> 
                                <option value="Montserrat">Montserrat</option> 
                                <option value="Morocco">Morocco</option> 
                                <option value="Mozambique">Mozambique</option> 
                                <option value="Myanmar">Myanmar</option> 
                                <option value="Namibia">Namibia</option> 
                                <option value="Nauru">Nauru</option> 
                                <option value="Nepal">Nepal</option> 
                                <option value="Netherlands">Netherlands</option> 
                                <option value="Netherlands Antilles">Netherlands Antilles</option> 
                                <option value="New Caledonia">New Caledonia</option> 
                                <option value="New Zealand">New Zealand</option> 
                                <option value="Nicaragua">Nicaragua</option> 
                                <option value="Niger">Niger</option> 
                                <option value="Nigeria">Nigeria</option> 
                                <option value="Niue">Niue</option> 
                                <option value="Norfolk Island">Norfolk Island</option> 
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                                <option value="Norway">Norway</option> 
                                <option value="Oman">Oman</option> 
                                <option value="Pakistan">Pakistan</option> 
                                <option value="Palau">Palau</option> 
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                                <option value="Panama">Panama</option> 
                                <option value="Papua New Guinea">Papua New Guinea</option> 
                                <option value="Paraguay">Paraguay</option> 
                                <option value="Peru">Peru</option> 
                                <option value="Philippines">Philippines</option> 
                                <option value="Pitcairn">Pitcairn</option> 
                                <option value="Poland">Poland</option> 
                                <option value="Portugal">Portugal</option> 
                                <option value="Puerto Rico">Puerto Rico</option> 
                                <option value="Qatar">Qatar</option> 
                                <option value="Reunion">Reunion</option> 
                                <option value="Romania">Romania</option> 
                                <option value="Russian Federation">Russian Federation</option> 
                                <option value="Rwanda">Rwanda</option> 
                                <option value="Saint Helena">Saint Helena</option> 
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                <option value="Saint Lucia">Saint Lucia</option> 
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                                <option value="Samoa">Samoa</option> 
                                <option value="San Marino">San Marino</option> 
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                <option value="Saudi Arabia">Saudi Arabia</option> 
                                <option value="Senegal">Senegal</option> 
                                <option value="Serbia and Montenegro">Serbia and Montenegro</option> 
                                <option value="Seychelles">Seychelles</option> 
                                <option value="Sierra Leone">Sierra Leone</option> 
                                <option value="Singapore">Singapore</option> 
                                <option value="Slovakia">Slovakia</option> 
                                <option value="Slovenia">Slovenia</option> 
                                <option value="Solomon Islands">Solomon Islands</option> 
                                <option value="Somalia">Somalia</option> 
                                <option value="South Africa">South Africa</option> 
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                                <option value="Spain">Spain</option> 
                                <option value="Sri Lanka">Sri Lanka</option> 
                                <option value="Sudan">Sudan</option> 
                                <option value="Suriname">Suriname</option> 
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                                <option value="Swaziland">Swaziland</option> 
                                <option value="Sweden">Sweden</option> 
                                <option value="Switzerland">Switzerland</option> 
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                                <option value="Taiwan, Province of China">Taiwan, Province of China</option> 
                                <option value="Tajikistan">Tajikistan</option> 
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                                <option value="Thailand">Thailand</option> 
                                <option value="Timor-leste">Timor-leste</option> 
                                <option value="Togo">Togo</option> 
                                <option value="Tokelau">Tokelau</option> 
                                <option value="Tonga">Tonga</option> 
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                                <option value="Tunisia">Tunisia</option> 
                                <option value="Turkey">Turkey</option> 
                                <option value="Turkmenistan">Turkmenistan</option> 
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                                <option value="Tuvalu">Tuvalu</option> 
                                <option value="Uganda">Uganda</option> 
                                <option value="Ukraine">Ukraine</option> 
                                <option value="United Arab Emirates">United Arab Emirates</option> 
                                <option value="United Kingdom">United Kingdom</option> 
                                <option value="United States">United States</option> 
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                                <option value="Uruguay">Uruguay</option> 
                                <option value="Uzbekistan">Uzbekistan</option> 
                                <option value="Vanuatu">Vanuatu</option> 
                                <option value="Venezuela">Venezuela</option> 
                                <option value="Viet Nam">Viet Nam</option> 
                                <option value="Virgin Islands, British">Virgin Islands, British</option> 
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                                <option value="Wallis and Futuna">Wallis and Futuna</option> 
                                <option value="Western Sahara">Western Sahara</option> 
                                <option value="Yemen">Yemen</option> 
                                <option value="Zambia">Zambia</option> 
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </td>
                    </tr>
                    <?php $active_languages = apply_filters( 'wpml_active_languages', NULL );
                    foreach ($active_languages as $active_language): ?>
                        <tr>
                            <td>Descrição <img src="<?= $active_language['country_flag_url'] ?>" /></td>
                            <td><textarea class="disable-item" id="company-description-<?= $active_language['id'] ?>"></textarea></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr id="tr-staff-personType">
                        <td>Tipo de Pessoa</td>
                            <td>
                                <select class="disable-item" id="staff-personType">
                                    <!-- <option value=""></option>  -->
<!--                                     <option value="Natural Person">Natural Person</option> 
                                    <option value="Legal Person">Legal Person</option> -->
                                </select> 
                            </td>
                    </tr>
                    <tr id="tr-staff-section">
                        <td>Seção</td>
                            <td>
                                <select class="disable-item" id="staff-section">
                                    <option value=""></option>
                                        
                                </select> 
                            </td>
                    </tr>
                    <tr>
                        <td>Instagram Link</td>
                        <td><input class="disable-item" type="text" name="" id="staff-instagram"></td>
                    </tr>
                    <tr>
                        <td>Facebook Link</td>
                        <td><input class="disable-item" type="text" name="" id="staff-facebook"></td>
                    </tr>
                    <tr>
                        <td>LinkedIn Link</td>
                        <td><input class="disable-item" type="text" name="" id="staff-linkedin"></td>
                    </tr>
                    <tr>
                        <td>Site</td>
                        <td><input class="disable-item" type="text" name="" id="staff-site"></td>
                    </tr>
                    <tr id="tr-staff-image">
                        <td>
                            <a id="btn-remove-image" title="<?php _e('Remove this image'); ?>">x</a>
                            <?php
                                // default image
                                $image = '<img id="image-preview" src="' . plugin_dir_url( __FILE__ ) . 'assets/img/placeholder.png' . '">';
                                echo $image;
                            ?>
                        </td>
                        <td>
                            <input type="hidden" name="staff-image" id="staff-image"/>
                            <input type='button' class="button-primary" value="<?php esc_attr_e( 'Select a image', 'staff-listing' ); ?>" id="stafflist_media_manager"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn btn-primary" id="add-staff">Registrar</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            Curriculum Vitae
                        </td>
                    </tr>
                    <tr>
                        <td>PDF Idioma</td>
                        <td>
                            <select id="vitae-language">
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
                        </td>
                    </tr>
                    <tr>
                         <td> Arquivo PDF</td>
                        <td><input id="vitae-file" name="vitae-file" type="file"></td>
                    </tr>
                </body>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="edit-staff-modal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Funcionário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <table>
                <body>
                    <tr>
                        <td>Categoria</td>
                        <td>
                            <select id="edit-staff-category">
                                
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td><input type="text" name="" id="edit-staff-name"></td>
                    </tr>
                    <tr>
                         <td>Endereço</td>
                        <td><input type="text" name="" id="edit-staff-address"></td>
                    </tr>
                    <tr>
                        <td>Telefone</td>
                        <td><input type="text" name="" id="edit-staff-phone"></td>
                    </tr>
                    <tr>
                        <td>Telefone2</td>
                        <td><input type="text" name="" id="edit-staff-phone2"></td>
                    </tr>
                    <tr>
                        <td>Fax</td>
                        <td><input type="text" name="" id="edit-staff-fax"></td>
                    </tr>
                    <tr>
                        <td>E-mail</td>
                        <td><input type="text" name="" id="edit-staff-email"></td>
                    </tr>
                    <tr>
                        <td>Nacionalidade</td>
                        <td>
                            <select multiple="multiple" id="edit-staff-nationality">
                            <!-- <select id="edit-staff-nationality"> -->
                                <!-- <option value="">No selected</option> -->
                                <option value="Afghan">Afghan</option>
                                <option value="Albanian">Albanian</option>
                                <option value="Algerian">Algerian</option>
                                <option value="American">American</option>
                                <option value="Andorran">Andorran</option>
                                <option value="Angolan">Angolan</option>
                                <option value="Antiguans">Antiguans</option>
                                <option value="Argentinean">Argentinean</option>
                                <option value="Armenian">Armenian</option>
                                <option value="Australian">Australian</option>
                                <option value="Austrian">Austrian</option>
                                <option value="Azerbaijani">Azerbaijani</option>
                                <option value="Bahamian">Bahamian</option>
                                <option value="Bahraini">Bahraini</option>
                                <option value="Bangladeshi">Bangladeshi</option>
                                <option value="Barbadian">Barbadian</option>
                                <option value="Barbudans">Barbudans</option>
                                <option value="Batswana">Batswana</option>
                                <option value="Belarusian">Belarusian</option>
                                <option value="Belgian">Belgian</option>
                                <option value="Belizean">Belizean</option>
                                <option value="Beninese">Beninese</option>
                                <option value="Bhutanese">Bhutanese</option>
                                <option value="Bolivian">Bolivian</option>
                                <option value="Bosnian">Bosnian</option>
                                <option value="Brazilian">Brazilian</option>
                                <option value="British">British</option>
                                <option value="Bruneian">Bruneian</option>
                                <option value="Bulgarian">Bulgarian</option>
                                <option value="Burkinabe">Burkinabe</option>
                                <option value="Burmese">Burmese</option>
                                <option value="Burundian">Burundian</option>
                                <option value="Cambodian">Cambodian</option>
                                <option value="Cameroonian">Cameroonian</option>
                                <option value="Canadian">Canadian</option>
                                <option value="Cape Verdian">Cape Verdean</option>
                                <option value="Central African">Central African</option>
                                <option value="Chadian">Chadian</option>
                                <option value="Chilean">Chilean</option>
                                <option value="Chinese">Chinese</option>
                                <option value="Colombian">Colombian</option>
                                <option value="Comoran">Comoran</option>
                                <option value="Congolese">Congolese</option>
                                <option value="Costa Rican">Costa Rican</option>
                                <option value="Croatian">Croatian</option>
                                <option value="Cuban">Cuban</option>
                                <option value="Cypriot">Cypriot</option>
                                <option value="Czech">Czech</option>
                                <option value="Danish">Danish</option>
                                <option value="Djibouti">Djibouti</option>
                                <option value="Dominican">Dominican</option>
                                <option value="Dutch">Dutch</option>
                                <option value="East Timorese">East Timorese</option>
                                <option value="Ecuadorean">Ecuadorean</option>
                                <option value="Egyptian">Egyptian</option>
                <option value="Emirian">Emirian</option>
                                <option value="English">English</option>
                                <option value="Equatorial Guinean">Equatorial Guinean</option>
                                <option value="Eritrean">Eritrean</option>
                                <option value="Estonian">Estonian</option>
                                <option value="Ethiopian">Ethiopian</option>
                                <option value="Fijian">Fijian</option>
                                <option value="Filipino">Filipino</option>
                                <option value="Finnish">Finnish</option>
                                <option value="French">French</option>
                                <option value="Gabonese">Gabonese</option>
                                <option value="Gambian">Gambian</option>
                                <option value="Georgian">Georgian</option>
                                <option value="German">German</option>
                                <option value="Ghanaian">Ghanaian</option>
                                <option value="Greek">Greek</option>
                                <option value="Grenadian">Grenadian</option>
                                <option value="Guatemalan">Guatemalan</option>
                                <option value="Guinea-Bissauan">Guinea-Bissauan</option>
                                <option value="Guinean">Guinean</option>
                                <option value="Guyanese">Guyanese</option>
                                <option value="Gaitian">Haitian</option>
                                <option value="Herzegovinian">Herzegovinian</option>
                                <option value="Honduran">Honduran</option>
                                <option value="Hungarian">Hungarian</option>
                                <option value="Icelander">Icelander</option>
                                <option value="Indian">Indian</option>
                                <option value="Indonesian">Indonesian</option>
                                <option value="Iranian">Iranian</option>
                                <option value="Iraqi">Iraqi</option>
                                <option value="Irish">Irish</option>
                                <option value="Israeli">Israeli</option>
                                <option value="Italian">Italian</option>
                                <option value="Ivorian">Ivorian</option>
                                <option value="Jamaican">Jamaican</option>
                                <option value="Japanese">Japanese</option>
                                <option value="Jordanian">Jordanian</option>
                                <option value="Kazakhstani">Kazakhstani</option>
                                <option value="Kenyan">Kenyan</option>
                                <option value="Kittitian or Nevisian">Kittian and Nevisian</option>
                                <option value="Kuwaiti">Kuwaiti</option>
                                <option value="Kyrgyz">Kyrgyz</option>
                                <option value="Laotian">Laotian</option>
                                <option value="Latvian">Latvian</option>
                                <option value="Lebanese">Lebanese</option>
                                <option value="Liberian">Liberian</option>
                                <option value="Libyan">Libyan</option>
                                <option value="Liechtensteiner">Liechtensteiner</option>
                                <option value="Lithuanian">Lithuanian</option>
                                <option value="Luxembourger">Luxembourger</option>
                                <option value="Macedonian">Macedonian</option>
                                <option value="Malagasy">Malagasy</option>
                                <option value="Malawian">Malawian</option>
                                <option value="Malaysian">Malaysian</option>
                                <option value="Maldivan">Maldivan</option>
                                <option value="Malian">Malian</option>
                                <option value="Maltese">Maltese</option>
                                <option value="Marshallese">Marshallese</option>
                                <option value="Mauritanian">Mauritanian</option>
                                <option value="Mauritian">Mauritian</option>
                                <option value="Mexican">Mexican</option>
                                <option value="Micronesian">Micronesian</option>
                                <option value="Moldovan">Moldovan</option>
                                <option value="Monacan">Monacan</option>
                                <option value="Mongolian">Mongolian</option>
                                <option value="Moroccan">Moroccan</option>
                                <option value="Mosotho">Mosotho</option>
                                <option value="Motswana">Motswana</option>
                                <option value="Mozambican">Mozambican</option>
                                <option value="Namibian">Namibian</option>
                                <option value="Nauruan">Nauruan</option>
                                <option value="Nepalese">Nepalese</option>
                                <option value="New Zealander">New Zealander</option>
                                <option value="Ni-Vanuatu">Ni-Vanuatu</option>
                                <option value="Nicaraguan">Nicaraguan</option>
                                <option value="Nigerien">Nigerien</option>
                                <option value="North Korean">North Korean</option>
                                <option value="Norwegian">Norwegian</option>
                                <option value="Omani">Omani</option>
                                <option value="Pakistani">Pakistani</option>
                                <option value="Palauan">Palauan</option>
                                <option value="Panamanian">Panamanian</option>
                                <option value="Papua New Guinean">Papua New Guinean</option>
                                <option value="Paraguayan">Paraguayan</option>
                                <option value="Peruvian">Peruvian</option>
                                <option value="Polish">Polish</option>
                                <option value="Portuguese">Portuguese</option>
                                <option value="Qatari">Qatari</option>
                                <option value="Romanian">Romanian</option>
                                <option value="Russian">Russian</option>
                                <option value="Rwandan">Rwandan</option>
                                <option value="Saint Lucian">Saint Lucian</option>
                                <option value="Salvadoran">Salvadoran</option>
                                <option value="Samoan">Samoan</option>
                                <option value="Sammarinese">San Marinese</option>
                                <option value="Sao Tomean">Sao Tomean</option>
                                <option value="Saudi">Saudi</option>
                                <option value="Scottish">Scottish</option>
                                <option value="Senegalese">Senegalese</option>
                                <option value="Serbian">Serbian</option>
                                <option value="Seychellois">Seychellois</option>
                                <option value="Sierra Leonean">Sierra Leonean</option>
                                <option value="Singaporean">Singaporean</option>
                                <option value="Slovakian">Slovakian</option>
                                <option value="Slovenian">Slovenian</option>
                                <option value="Solomon Islander">Solomon Islander</option>
                                <option value="Somali">Somali</option>
                                <option value="South African">South African</option>
                                <option value="South Korean">South Korean</option>
                                <option value="Spanish">Spanish</option>
                                <option value="Sri Lankan">Sri Lankan</option>
                                <option value="Sudanese">Sudanese</option>
                                <option value="Surinamer">Surinamer</option>
                                <option value="Swazi">Swazi</option>
                                <option value="Swedish">Swedish</option>
                                <option value="Swiss">Swiss</option>
                                <option value="Syrian">Syrian</option>
                                <option value="Taiwanese">Taiwanese</option>
                                <option value="Tajik">Tajik</option>
                                <option value="Tanzanian">Tanzanian</option>
                                <option value="Thai">Thai</option>
                                <option value="Togolese">Togolese</option>
                                <option value="Tongan">Tongan</option>
                                <option value="Trinidadian">Trinidadian or Tobagonian</option>
                                <option value="Tunisian">Tunisian</option>
                                <option value="Turkish">Turkish</option>
                                <option value="Tuvaluan">Tuvaluan</option>
                                <option value="Ugandan">Ugandan</option>
                                <option value="Ukrainian">Ukrainian</option>
                                <option value="Uruguayan">Uruguayan</option>
                                <option value="Uzbekistani">Uzbekistani</option>
                                <option value="Venezuelan">Venezuelan</option>
                                <option value="Vietnamese">Vietnamese</option>
                                <option value="Welsh">Welsh</option>
                                <option value="Yemenite">Yemenite</option>
                                <option value="Zambian">Zambian</option>
                                <option value="Zimbabwean">Zimbabwean</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                         <td> Idiomas</td>
                        <td>
                            <select multiple="multiple" id="edit-staff-languages">
                            <option value="af">Afrikanns</option>
                                <option value="sq">Albanian</option>
                                <option value="ar">Arabic</option>
                                <option value="hy">Armenian</option>
                                <option value="eu">Basque</option>
                                <option value="bn">Bengali</option>
                                <option value="bg">Bulgarian</option>
                                <option value="ca">Catalan</option>
                                <!-- <option value="Cambodian">Cambodian</option> -->
                                <option value="zh">Chinese (Mandarin)</option>
                                <!-- <option value="Croation">Croation</option> -->
                                <option value="cs">Czech</option>
                                <option value="da">Danish</option>
                                <option value="nl">Dutch</option>
                                <option value="en">English</option>
                                <option value="et">Estonian</option>
                                <option value="hif">Fiji Hindi</option>
                                <option value="fi">Finnish</option>
                                <option value="fr">French</option>
                                <option value="ka">Georgian</option>
                                <option value="de">German</option>
                                <option value="el">Greek</option>
                                <option value="gu">Gujarati</option>
                                <option value="he">Hebrew</option>
                                <option value="hi">Hindi</option>
                                <option value="hu">Hungarian</option>
                                <option value="is">Icelandic</option>
                                <option value="id">Indonesian</option>
                                <option value="ga">Irish</option>
                                <option value="it">Italian</option>
                                <option value="ja">Japanese</option>
                                <option value="jv">Javanese</option>
                                <option value="ko">Korean</option>
                                <option value="la">Latin</option>
                                <option value="lv">Latvian</option>
                                <option value="lt">Lithuanian</option>
                                <option value="mk">Macedonian</option>
                                <option value="ms">Malay</option>
                                <option value="ml">Malayalam</option>
                                <option value="mt">Maltese</option>
                                <option value="mi">Maori</option>
                                <option value="mr">Marathi</option>
                                <option value="mn">Mongolian</option>
                                <option value="ne">Nepali</option>
                                <option value="no">Norwegian</option>
                                <option value="fa">Persian</option>
                                <option value="pl">Polish</option>
                                <option value="pt">Portuguese</option>
                                <option value="pa">Punjabi</option>
                                <option value="qu">Quechua</option>
                                <option value="ro">Romanian</option>
                                <option value="ru">Russian</option>
                                <option value="sm">Samoan</option>
                                <option value="sr">Serbian</option>
                                <option value="sk">Slovak</option>
                                <option value="sl">Slovenian</option>
                                <option value="es">Spanish</option>
                                <option value="sw">Swahili</option>
                                <option value="sv ">Swedish </option>
                                <option value="ta">Tamil</option>
                                <option value="tt">Tatar</option>
                                <option value="te">Telugu</option>
                                <option value="th">Thai</option>
                                <option value="bo">Tibetan</option>
                                <option value="to">Tongan</option>
                                <option value="tr">Turkish</option>
                                <!-- <option value="Ukranian">Ukranian</option> -->
                                <option value="ur">Urdu</option>
                                <option value="uz">Uzbek</option>
                                <option value="vi">Vietnamese</option>
                                <option value="cy">Welsh</option>
                                <option value="xh">Xhosa</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Países licenciados para advogar</td>
                        <td>
                            <select multiple="multiple" id="edit-staff-licensed">
                                <option value="Afghanistan">Afghanistan</option> 
                                <option value="Albania">Albania</option> 
                                <option value="Algeria">Algeria</option> 
                                <option value="American Samoa">American Samoa</option> 
                                <option value="Andorra">Andorra</option> 
                                <option value="Angola">Angola</option> 
                                <option value="Anguilla">Anguilla</option> 
                                <option value="Antarctica">Antarctica</option> 
                                <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
                                <option value="Argentina">Argentina</option> 
                                <option value="Armenia">Armenia</option> 
                                <option value="Aruba">Aruba</option> 
                                <option value="Australia">Australia</option> 
                                <option value="Austria">Austria</option> 
                                <option value="Azerbaijan">Azerbaijan</option> 
                                <option value="Bahamas">Bahamas</option> 
                                <option value="Bahrain">Bahrain</option> 
                                <option value="Bangladesh">Bangladesh</option> 
                                <option value="Barbados">Barbados</option> 
                                <option value="Belarus">Belarus</option> 
                                <option value="Belgium">Belgium</option> 
                                <option value="Belize">Belize</option> 
                                <option value="Benin">Benin</option> 
                                <option value="Bermuda">Bermuda</option> 
                                <option value="Bhutan">Bhutan</option> 
                                <option value="Bolivia">Bolivia</option> 
                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
                                <option value="Botswana">Botswana</option> 
                                <option value="Bouvet Island">Bouvet Island</option> 
                                <option value="Brazil">Brazil</option> 
                                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
                                <option value="Brunei Darussalam">Brunei Darussalam</option> 
                                <option value="Bulgaria">Bulgaria</option> 
                                <option value="Burkina Faso">Burkina Faso</option> 
                                <option value="Burundi">Burundi</option> 
                                <option value="Cambodia">Cambodia</option> 
                                <option value="Cameroon">Cameroon</option> 
                                <option value="Canada">Canada</option> 
                                <option value="Cape Verde">Cape Verde</option> 
                                <option value="Cayman Islands">Cayman Islands</option> 
                                <option value="Central African Republic">Central African Republic</option> 
                                <option value="Chad">Chad</option> 
                                <option value="Chile">Chile</option> 
                                <option value="China">China</option> 
                                <option value="Christmas Island">Christmas Island</option> 
                                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
                                <option value="Colombia">Colombia</option> 
                                <option value="Comoros">Comoros</option> 
                                <option value="Congo">Congo</option> 
                                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
                                <option value="Cook Islands">Cook Islands</option> 
                                <option value="Costa Rica">Costa Rica</option> 
                                <option value="Cote D'ivoire">Cote D'ivoire</option> 
                                <option value="Croatia">Croatia</option> 
                                <option value="Cuba">Cuba</option> 
                                <option value="Cyprus">Cyprus</option> 
                                <option value="Czech Republic">Czech Republic</option> 
                                <option value="Denmark">Denmark</option> 
                                <option value="Djibouti">Djibouti</option> 
                                <option value="Dominica">Dominica</option> 
                                <option value="Dominican Republic">Dominican Republic</option> 
                                <option value="Ecuador">Ecuador</option> 
                                <option value="Egypt">Egypt</option> 
                                <option value="El Salvador">El Salvador</option> 
                                <option value="Equatorial Guinea">Equatorial Guinea</option> 
                                <option value="Eritrea">Eritrea</option> 
                                <option value="Estonia">Estonia</option> 
                                <option value="Ethiopia">Ethiopia</option> 
                                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
                                <option value="Faroe Islands">Faroe Islands</option> 
                                <option value="Fiji">Fiji</option> 
                                <option value="Finland">Finland</option> 
                                <option value="France">France</option> 
                                <option value="French Guiana">French Guiana</option> 
                                <option value="French Polynesia">French Polynesia</option> 
                                <option value="French Southern Territories">French Southern Territories</option> 
                                <option value="Gabon">Gabon</option> 
                                <option value="Gambia">Gambia</option> 
                                <option value="Georgia">Georgia</option> 
                                <option value="Germany">Germany</option> 
                                <option value="Ghana">Ghana</option> 
                                <option value="Gibraltar">Gibraltar</option> 
                                <option value="Greece">Greece</option> 
                                <option value="Greenland">Greenland</option> 
                                <option value="Grenada">Grenada</option> 
                                <option value="Guadeloupe">Guadeloupe</option> 
                                <option value="Guam">Guam</option> 
                                <option value="Guatemala">Guatemala</option> 
                                <option value="Guinea">Guinea</option> 
                                <option value="Guinea-bissau">Guinea-bissau</option> 
                                <option value="Guyana">Guyana</option> 
                                <option value="Haiti">Haiti</option> 
                                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
                                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
                                <option value="Honduras">Honduras</option> 
                                <option value="Hong Kong">Hong Kong</option> 
                                <option value="Hungary">Hungary</option> 
                                <option value="Iceland">Iceland</option> 
                                <option value="India">India</option> 
                                <option value="Indonesia">Indonesia</option> 
                                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
                                <option value="Iraq">Iraq</option> 
                                <option value="Ireland">Ireland</option> 
                                <option value="Israel">Israel</option> 
                                <option value="Italy">Italy</option> 
                                <option value="Jamaica">Jamaica</option> 
                                <option value="Japan">Japan</option> 
                                <option value="Jordan">Jordan</option> 
                                <option value="Kazakhstan">Kazakhstan</option> 
                                <option value="Kenya">Kenya</option> 
                                <option value="Kiribati">Kiribati</option> 
                                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
                                <option value="Korea, Republic of">Korea, Republic of</option> 
                                <option value="Kuwait">Kuwait</option> 
                                <option value="Kyrgyzstan">Kyrgyzstan</option> 
                                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
                                <option value="Latvia">Latvia</option> 
                                <option value="Lebanon">Lebanon</option> 
                                <option value="Lesotho">Lesotho</option> 
                                <option value="Liberia">Liberia</option> 
                                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
                                <option value="Liechtenstein">Liechtenstein</option> 
                                <option value="Lithuania">Lithuania</option> 
                                <option value="Luxembourg">Luxembourg</option> 
                                <option value="Macao">Macao</option> 
                                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
                                <option value="Madagascar">Madagascar</option> 
                                <option value="Malawi">Malawi</option> 
                                <option value="Malaysia">Malaysia</option> 
                                <option value="Maldives">Maldives</option> 
                                <option value="Mali">Mali</option> 
                                <option value="Malta">Malta</option> 
                                <option value="Marshall Islands">Marshall Islands</option> 
                                <option value="Martinique">Martinique</option> 
                                <option value="Mauritania">Mauritania</option> 
                                <option value="Mauritius">Mauritius</option> 
                                <option value="Mayotte">Mayotte</option> 
                                <option value="Mexico">Mexico</option> 
                                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
                                <option value="Moldova, Republic of">Moldova, Republic of</option> 
                                <option value="Monaco">Monaco</option> 
                                <option value="Mongolia">Mongolia</option> 
                                <option value="Montserrat">Montserrat</option> 
                                <option value="Morocco">Morocco</option> 
                                <option value="Mozambique">Mozambique</option> 
                                <option value="Myanmar">Myanmar</option> 
                                <option value="Namibia">Namibia</option> 
                                <option value="Nauru">Nauru</option> 
                                <option value="Nepal">Nepal</option> 
                                <option value="Netherlands">Netherlands</option> 
                                <option value="Netherlands Antilles">Netherlands Antilles</option> 
                                <option value="New Caledonia">New Caledonia</option> 
                                <option value="New Zealand">New Zealand</option> 
                                <option value="Nicaragua">Nicaragua</option> 
                                <option value="Niger">Niger</option> 
                                <option value="Nigeria">Nigeria</option> 
                                <option value="Niue">Niue</option> 
                                <option value="Norfolk Island">Norfolk Island</option> 
                                <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
                                <option value="Norway">Norway</option> 
                                <option value="Oman">Oman</option> 
                                <option value="Pakistan">Pakistan</option> 
                                <option value="Palau">Palau</option> 
                                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
                                <option value="Panama">Panama</option> 
                                <option value="Papua New Guinea">Papua New Guinea</option> 
                                <option value="Paraguay">Paraguay</option> 
                                <option value="Peru">Peru</option> 
                                <option value="Philippines">Philippines</option> 
                                <option value="Pitcairn">Pitcairn</option> 
                                <option value="Poland">Poland</option> 
                                <option value="Portugal">Portugal</option> 
                                <option value="Puerto Rico">Puerto Rico</option> 
                                <option value="Qatar">Qatar</option> 
                                <option value="Reunion">Reunion</option> 
                                <option value="Romania">Romania</option> 
                                <option value="Russian Federation">Russian Federation</option> 
                                <option value="Rwanda">Rwanda</option> 
                                <option value="Saint Helena">Saint Helena</option> 
                                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                                <option value="Saint Lucia">Saint Lucia</option> 
                                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
                                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
                                <option value="Samoa">Samoa</option> 
                                <option value="San Marino">San Marino</option> 
                                <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                                <option value="Saudi Arabia">Saudi Arabia</option> 
                                <option value="Senegal">Senegal</option> 
                                <option value="Serbia and Montenegro">Serbia and Montenegro</option> 
                                <option value="Seychelles">Seychelles</option> 
                                <option value="Sierra Leone">Sierra Leone</option> 
                                <option value="Singapore">Singapore</option> 
                                <option value="Slovakia">Slovakia</option> 
                                <option value="Slovenia">Slovenia</option> 
                                <option value="Solomon Islands">Solomon Islands</option> 
                                <option value="Somalia">Somalia</option> 
                                <option value="South Africa">South Africa</option> 
                                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
                                <option value="Spain">Spain</option> 
                                <option value="Sri Lanka">Sri Lanka</option> 
                                <option value="Sudan">Sudan</option> 
                                <option value="Suriname">Suriname</option> 
                                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
                                <option value="Swaziland">Swaziland</option> 
                                <option value="Sweden">Sweden</option> 
                                <option value="Switzerland">Switzerland</option> 
                                <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
                                <option value="Taiwan, Province of China">Taiwan, Province of China</option> 
                                <option value="Tajikistan">Tajikistan</option> 
                                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
                                <option value="Thailand">Thailand</option> 
                                <option value="Timor-leste">Timor-leste</option> 
                                <option value="Togo">Togo</option> 
                                <option value="Tokelau">Tokelau</option> 
                                <option value="Tonga">Tonga</option> 
                                <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
                                <option value="Tunisia">Tunisia</option> 
                                <option value="Turkey">Turkey</option> 
                                <option value="Turkmenistan">Turkmenistan</option> 
                                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
                                <option value="Tuvalu">Tuvalu</option> 
                                <option value="Uganda">Uganda</option> 
                                <option value="Ukraine">Ukraine</option> 
                                <option value="United Arab Emirates">United Arab Emirates</option> 
                                <option value="United Kingdom">United Kingdom</option> 
                                <option value="United States">United States</option> 
                                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
                                <option value="Uruguay">Uruguay</option> 
                                <option value="Uzbekistan">Uzbekistan</option> 
                                <option value="Vanuatu">Vanuatu</option> 
                                <option value="Venezuela">Venezuela</option> 
                                <option value="Viet Nam">Viet Nam</option> 
                                <option value="Virgin Islands, British">Virgin Islands, British</option> 
                                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
                                <option value="Wallis and Futuna">Wallis and Futuna</option> 
                                <option value="Western Sahara">Western Sahara</option> 
                                <option value="Yemen">Yemen</option> 
                                <option value="Zambia">Zambia</option> 
                                <option value="Zimbabwe">Zimbabwe</option>
                            </select>
                        </td>
                    </tr>
                    <?php $active_languages = apply_filters( 'wpml_active_languages', NULL );
                    foreach ($active_languages as $active_language): ?>
                        <tr>
                            <td>Descrição <img src="<?= $active_language['country_flag_url'] ?>" /></td>
                            <td><textarea id="edit-company-description-<?= $active_language['id'] ?>"></textarea></td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td>Tipo de Pessoa</td>
                            <td>
                                <select id="edit-staff-personType">
                                    <!-- <option value=""></option>  -->
<!--                                     <option value="Natural Person">Natural Person</option> 
                                    <option value="Legal Person">Legal Person</option> -->
                                </select>
                            </td>
                        <!-- <td><input type="text" name="" id="edit-legal-person"></td> -->
                    </tr>
                    <tr>
                        <td>Seção</td>
                            <td>
                                <select id="edit-staff-section">
                                    <option value=""></option>
                                </select>
                            </td>
                    </tr>
                    <tr>
                        <td>Instagram Link</td>
                        <td><input type="text" name="" id="edit-staff-instagram"></td>
                    </tr>
                    <tr>
                        <td>Facebook Link</td>
                        <td><input type="text" name="" id="edit-staff-facebook"></td>
                    </tr>
                    <tr>
                        <td>LinkedIn Link</td>
                        <td><input type="text" name="" id="edit-staff-linkedin"></td>
                    </tr>
                    <tr>
                        <td>Site</td>
                        <td><input type="text" name="" id="edit-staff-site"></td>
                    </tr>
                    <tr id="tr-staff-image">
                        <td>
                            <a id="btn-edit-remove-image" title="<?php _e('Remove this image'); ?>">x</a>
                            <?php
                                // default image
                                $image = '<img id="edit-image-preview" src="' . plugin_dir_url( __FILE__ ) . 'assets/img/placeholder.png' . '">';
                                echo $image;
                            ?>
                        </td>
                        <td>
                            <input type="hidden" name="edit-staff-image" id="edit-staff-image"/>
                            <input type='button' class="button-primary" value="<?php esc_attr_e( 'Select a image', 'staff-listing' ); ?>" id="edit-stafflist_media_manager"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn btn-primary" id="edit-change-staff">Save changes</button>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            Curriculum Vitae
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table id="edit-vitae-table">
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>Idioma do PDF</td>
                        <td>
                            <select id="edit-vitae-language">
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
                        </td>
                    </tr>
                    <tr>
                         <td>Arquivo PDF</td>
                        <td><input id="edit-vitae-file" name="edit-vitae-file" type="file"></td>
                    </tr>
                </body>
            </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

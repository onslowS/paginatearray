<?php
        //Enter your code here, enjoy!

$item_list = array( "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Anguilla", "Antigua & Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belau (Palau)", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia Herzegovina", "Botswana", "Brazil", "British Indian Ocean", "British Virgin Islands", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Rep.", "Chad", "Chile", "China (PR)", "Christmas Island", "Cocos Island", "Colombia", "Comoros", "Congo", "Congo Dem. Rep.", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Antarctic", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guam", "Guatemala", "Guinea", "Guinea Bissau", "Guyana", "Haiti", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran", "Iraq", "Irish Republic", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kirghizstan/Kyrgyzstan", "Kiribati", "Korea (DPR)", "Korea (Republic of)", "Kuwait", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macao", "Macedonia (FYR)", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar (Burma)", "Namibia", "Nauru Island", "Nepal", "Netherland Antilles", "Netherlands", "New Caledonia", "New Zealand", "Nicaragua", "Niger Republic", "Nigeria", "Norfolk Island", "Northern Mariana Isl", "Norway", "Oman", "Pakistan", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn Island", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russia", "Rwanda", "Samoa (American)", "San Marino", "Sao Tome & Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovak Republic", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia", "Spain", "Sri Lanka", "St Kitts & Nevis", "St Helena", "St Lucia", "St Pierre & Miquelon", "St Vincent & Grenadines", "Sudan", "Suriname", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tonga", "Trinidad & Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks & Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "Uruguay", "USA", "Uzbekistan", "Vanuatu", "Vatican City State", "Venezuela", "Vietnam", "Virgin Islands (USA)", "Wallis & Futuna Islands", "Western Samoa", "Yemen", "Zambia", "Zimbabwe");

$minimum_items_per_page = 30;

$page_list = paginate_items($item_list, $minimum_items_per_page);

print_r($page_list);

//------------------------------------------------------------

function paginate_items($item_list, $minimum_items_per_page){

	$itemcount = count($item_list);
	
	$pageminimum = $minimum_items_per_page;
	
	$pageamount = floor($itemcount/$pageminimum);
	
	$pageamounts = array();
	
	if($pageamount == 0){
		$pageamounts[] = array("offset"=>0, "limit"=>$itemcount);
	} else {
	
		$pagebase = $itemcount % $pageminimum;
		
		
		$pageamounts = array();
		
		for($i = 0; $i < $pageamount; $i++){
			$pageamounts[] = array("offset"=>$i*$pageminimum, "limit"=>$pageminimum);
		}
		
		if($pagebase > 0){
			$counter = 0;
			for($i = 0; $i < $pagebase; $i++){
				$pageamounts[$counter % count($pageamounts)]["limit"] += 1;
				$counter = $counter + 1;
			}
			for($i = 0; $i < $pagebase; $i++){
				if($i < $pageamount - 1){
					$pageamounts[$i + 1]["offset"] = $pageamounts[$i]["offset"] + $pageamounts[$i]["limit"];
				}
			}
		}
	
	}
	return $pageamounts;
}
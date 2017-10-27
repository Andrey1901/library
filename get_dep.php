<? function get_departures_responsive( $SpecificTourNumber = '', $SpecificDepartureID = '', $YEARS_TO_DISPLAY = 'ALL', $SHOW_COMPACT_VIEW = 'N' ){
    


   global $link, $_SERVER, $db_host, $db_user, $db_pass, $DATABASE, $web_url, $TOUR_DEPARTURES, $_GET, $DEFAULT_CURRENCY, $CurrencyCountry, $TOUR_INFO, $SEARCH_RESULT, $OPTION_PRICING, $SEARCH_RESULT, $to_currency;
   
   
   $link = mysqli_connect( "$db_host", "$db_user", "$db_pass", $DATABASE );
   
    if( $_POST['countries'] != '' ){

        $CurrencyCountry['CountryCode'] = strtoupper( $_POST['countries'] );
        $to_currency = get_currency( $CurrencyCountry['CountryCode'] );
        $converted_amount = get_currency_factor( $to_currency );
        $currency_marker = $converted_amount['marker'];
        
    } else {
        
       $to_currency = $DEFAULT_CURRENCY;
       $to_currency = get_currency();
       $converted_amount = get_currency_factor( $to_currency );
       $currency_marker = $converted_amount['marker'];        
    }    
    
    if( $SEARCH_RESULT == '' || $SEARCH_RESULT == 0 ){
?>


<script type="text/javascript">
function switchDate(LandOrAir, id){
                


      var AirDate = document.getElementById("AirDate_0").style.display;
      var LandDate = document.getElementById("LandDate_0").style.display;

      
      if(LandOrAir == 'AIR'){
          
         document.getElementById("AirDate_" + id).style.display = '';
         document.getElementById("LandDate_" + id).style.display = 'none';     
            
         document.getElementById("AirText_" + id).disabled = false;
         document.getElementById("AirCity_" + id).disabled = false;
         document.getElementById("LandText_" + id).disabled = true;


         
      }else{
         
         document.getElementById("AirDate_" + id).style.display = 'none';
         document.getElementById("LandDate_" + id).style.display = '';          
         
         document.getElementById("AirText_" + id).disabled = true;
         document.getElementById("AirCity_" + id).disabled = true;
         document.getElementById("LandText_" + id).disabled = false;
         
      }           
}
</script>            

<style>
 div.disabler {
     -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";

    opacity:0.2;
    filter:Alpha(opacity=20);
    

 }
</style>

<script src="/register/copysource/js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="/register/copysource/js/dropdown.css" />
<script src="/register/copysource/js/dropdown.js"></script>
<link rel="stylesheet" type="text/css" href="/register/copysource/js/flags.css" />

<script>
$(document).ready(function() {

    $('[id^="LandDate_"]').hide();
    
    $('select[id^=Passengers_PassengerDepartureCity]').change(function() {

        var theText = $('select[id^=Passengers_PassengerDepartureCity] option:selected').text();
        var theID = $(this).attr("id");


        var theText = $('select[id^="' + theID +'"] option:selected').text();
        var commPos = theText.indexOf(",");
        var airport = theText.substring( 0, commPos + 4 )
        
        $('select[id^=Passengers_PassengerDepartureCity]').each(function() {

            $('select[id^=Passengers_PassengerDepartureCity] option:contains("' + airport + '")').prop('selected', true );
        });
     });
        $("select#country-select").change(function() {            

            $('#CountryForm').submit();
        });     
})

$(function() {
    
    
        $("select#country-select").change(function() {            

            $('#CountryForm').submit();
        });
    }); 
</script>



            <div class="country-select">
              <label for="country-select">Select your Currency</label>

<a name=tours></a>
<form method=POST action=<? echo $_SERVER['PHP_SELF']; ?>#tours name=CountryForm id=CountryForm>
<input type=hidden name=action value=search>
<input type=hidden name=keywords value="<? echo $_POST['keywords'] ?>">
<input type=hidden name=depPicker value="<? echo $_POST['depPicker'] ?>">
<input type=hidden name=range-slider value="<? echo $_POST['range-slider'] ?>">
<input type=hidden name=flexible-dates value="<? echo $_POST['flexible-dates'] ?>">


<!--<select name="countries" id="countries" style="width:180px;">-->
<select name="countries" id="country-select" class="country-select">

<option value='au' data-image="/register/images/flag/blank.gif" data-imagecss="flag au" data-title="Australia"
<? if( $CurrencyCountry['CountryCode'] == "AU"){
  echo " selected=\"selected\"";  
}
?>>Australia</option>

<option value='at' data-image="/register/images/flag/blank.gif" data-imagecss="flag at" data-title="Austria"
<? if( $CurrencyCountry['CountryCode'] == "AT"){
  echo " selected=\"selected\"";  
}
?>>Austria</option>
<option value='be' data-image="/register/images/flag/blank.gif" data-imagecss="flag be" data-title="Belgium"
<? if( $CurrencyCountry['CountryCode'] == "BE"){
  echo " selected=\"selected\"";  
}
?>>Belgium</option>
<option value='ca' data-image="/register/images/flag/blank.gif" data-imagecss="flag ca" data-title="Canada"
<? if( $CurrencyCountry['CountryCode'] == "CA"){
  echo " selected=\"selected\"";  
}
?>>Canada</option>

<option value='cn' data-image="/register/images/flag/blank.gif" data-imagecss="flag cn" data-title="China"
<? if( $CurrencyCountry['CountryCode'] == "CN"){
  echo " selected=\"selected\"";  
}
?>>China</option>
<option value='cy' data-image="/register/images/flag/blank.gif" data-imagecss="flag cy" data-title="Cyprus"
<? if( $CurrencyCountry['CountryCode'] == "CY"){
  echo " selected=\"selected\"";  
}
?>>Cyprus</option>
<option value='dk' data-image="/register/images/flag/blank.gif" data-imagecss="flag dk" data-title="Denmark"
<? if( $CurrencyCountry['CountryCode'] == "DK"){
  echo " selected=\"selected\"";  
}
?>>Denmark</option>
<option value='ee' data-image="/register/images/flag/blank.gif" data-imagecss="flag ee" data-title="Estonia"
<? if( $CurrencyCountry['CountryCode'] == "EE"){
  echo " selected=\"selected\"";  
}
?>>Estonia</option>
<option value='fi' data-image="/register/images/flag/blank.gif" data-imagecss="flag fi" data-title="Finland"
<? if( $CurrencyCountry['CountryCode'] == "FI"){
  echo " selected=\"selected\"";  
}
?>>Finland</option>
<option value='fr' data-image="/register/images/flag/blank.gif" data-imagecss="flag fr" data-title="France"
<? if( $CurrencyCountry['CountryCode'] == "FR"){
  echo " selected=\"selected\"";  
}
?>>France</option>
<option value='de' data-image="/register/images/flag/blank.gif" data-imagecss="flag de" data-title="Germany"
<? if( $CurrencyCountry['CountryCode'] == "DE"){
  echo " selected=\"selected\"";  
}
?>>Germany</option>
<option value='hk' data-image="/register/images/flag/blank.gif" data-imagecss="flag hk" data-title="Hong Kong"
<? if( $CurrencyCountry['CountryCode'] == "HK"){
  echo " selected=\"selected\"";  
}
?>>Hong Kong</option>
<option value='hu' data-image="/register/images/flag/blank.gif" data-imagecss="flag hu" data-title="Hungary"
<? if( $CurrencyCountry['CountryCode'] == "HU"){
  echo " selected=\"selected\"";  
}
?>>Hungary</option>
<option value='ie' data-image="/register/images/flag/blank.gif" data-imagecss="flag ie" data-title="Ireland"
<? if( $CurrencyCountry['CountryCode'] == "IE"){
  echo " selected=\"selected\"";  
}
?>>Ireland</option>
<option value='in' data-image="/register/images/flag/blank.gif" data-imagecss="flag in" data-title="India"
<? if( $CurrencyCountry['CountryCode'] == "IN"){
  echo " selected=\"selected\"";  
}
?>>India</option>
<option value='it' data-image="/register/images/flag/blank.gif" data-imagecss="flag it" data-title="Italy"
<? if( $CurrencyCountry['CountryCode'] == "IT"){
  echo " selected=\"selected\"";  
}
?>>Italy</option>
<option value='jp' data-image="/register/images/flag/blank.gif" data-imagecss="flag jp" data-title="Japan"
<? if( $CurrencyCountry['CountryCode'] == "JP"){
  echo " selected=\"selected\"";  
}
?>>Japan</option>
<option value='lt' data-image="/register/images/flag/blank.gif" data-imagecss="flag lt" data-title="Lithuania">
<? if( $CurrencyCountry['CountryCode'] == "LT"){
  echo " selected=\"selected\"";  
}
?>Lithuania</option>
<option value='lu' data-image="/register/images/flag/blank.gif" data-imagecss="flag lu" data-title="Luxembourg"
<? if( $CurrencyCountry['CountryCode'] == "LU"){
  echo " selected=\"selected\"";  
}
?>>Luxembourg</option>
<option value='lv' data-image="/register/images/flag/blank.gif" data-imagecss="flag lv" data-title="Latvia"
<? if( $CurrencyCountry['CountryCode'] == "LV"){
  echo " selected=\"selected\"";  
}
?>>Latvia</option>
<option value='mc' data-image="/register/images/flag/blank.gif" data-imagecss="flag mc" data-title="Monaco"
<? if( $CurrencyCountry['CountryCode'] == "MC"){
  echo " selected=\"selected\"";  
}
?>>Monaco</option>
<option value='my' data-image="/register/images/flag/blank.gif" data-imagecss="flag my" data-title="Malaysia"
<? if( $CurrencyCountry['CountryCode'] == "MY"){
  echo " selected=\"selected\"";  
}
?>>Malaysia</option>
<option value='nl' data-image="/register/images/flag/blank.gif" data-imagecss="flag nl" data-title="Netherlands"
<? if( $CurrencyCountry['CountryCode'] == "NL"){
  echo " selected=\"selected\"";  
}
?>>Netherlands</option>
<option value='nz' data-image="/register/images/flag/blank.gif" data-imagecss="flag nz" data-title="New Zealand (Aotearoa)"
<? if( $CurrencyCountry['CountryCode'] == "NZ"){
  echo " selected=\"selected\"";  
}
?>>New Zealand (Aotearoa)</option>
<option value='no' data-image="/register/images/flag/blank.gif" data-imagecss="flag no" data-title="Norway"
<? if( $CurrencyCountry['CountryCode'] == "NO"){
  echo " selected=\"selected\"";  
}
?>>Norway</option>  
<option value='ph' data-image="/register/images/flag/blank.gif" data-imagecss="flag ph" data-title="Philippines"
<? if( $CurrencyCountry['CountryCode'] == "PH"){
  echo " selected=\"selected\"";  
}
?>>Philippines</option>
<option value='pt' data-image="/register/images/flag/blank.gif" data-imagecss="flag pt" data-title="Portugal"
<? if( $CurrencyCountry['CountryCode'] == "PT"){
  echo " selected=\"selected\"";  
}
?>>Portugal</option>
<option value='ru' data-image="/register/images/flag/blank.gif" data-imagecss="flag ru" data-title="Russian Federation"
<? if( $CurrencyCountry['CountryCode'] == "RU"){
  echo " selected=\"selected\"";  
}
?>>Russian Federation</option>
<option value='sm' data-image="/register/images/flag/blank.gif" data-imagecss="flag sm" data-title="San Marino"
<? if( $CurrencyCountry['CountryCode'] == "SM"){
  echo " selected=\"selected\"";  
}
?>>San Marino</option>
<option value='sg' data-image="/register/images/flag/blank.gif" data-imagecss="flag sg" data-title="Singapore"
<? if( $CurrencyCountry['CountryCode'] == "SG"){
  echo " selected=\"selected\"";  
}
?>>Singapore</option>
<option value='sk' data-image="/register/images/flag/blank.gif" data-imagecss="flag sk" data-title="Slovakia"
<? if( $CurrencyCountry['CountryCode'] == "SK"){
  echo " selected=\"selected\"";  
}
?>>Slovakia</option>
<option value='si' data-image="/register/images/flag/blank.gif" data-imagecss="flag si" data-title="Slovenia"
<? if( $CurrencyCountry['CountryCode'] == "SI"){
  echo " selected=\"selected\"";  
}
?>>Slovenia</option>  
<option value='za' data-image="/register/images/flag/blank.gif" data-imagecss="flag za" data-title="South Africa"
<? if( $CurrencyCountry['CountryCode'] == "ZA"){
  echo " selected=\"selected\"";  
}
?>>South Africa</option>
<option value='es' data-image="/register/images/flag/blank.gif" data-imagecss="flag es" data-title="Spain"
<? if( $CurrencyCountry['CountryCode'] == "ES"){
  echo " selected=\"selected\"";  
}
?>>Spain</option>  
<option value='se' data-image="/register/images/flag/blank.gif" data-imagecss="flag se" data-title="Sweden"
<? if( $CurrencyCountry['CountryCode'] == "SE"){
  echo " selected=\"selected\"";  
}
?>>Sweden</option>
<option value='th' data-image="/register/images/flag/blank.gif" data-imagecss="flag th" data-title="Thailand"
<? if( $CurrencyCountry['CountryCode'] == "TH"){
  echo " selected=\"selected\"";  
}
?>>Thailand</option>
<option value='tr' data-image="/register/images/flag/blank.gif" data-imagecss="flag tr" data-title="Turkey"
<? if( $CurrencyCountry['CountryCode'] == "TR"){
  echo " selected=\"selected\"";  
}
?>>Turkey</option>
<option value='uk' data-image="/register/images/flag/blank.gif" data-imagecss="flag uk" data-title="United Kingdom"
<? if( $CurrencyCountry['CountryCode'] == "UK"){
  echo " selected=\"selected\"";  
}
?>>United Kingdom</option>
<option value='us' data-image="/register/images/flag/blank.gif" data-imagecss="flag us" data-title="United States"
<? if( $CurrencyCountry['CountryCode'] == "US" || $CurrencyCountry['CountryCode'] == '' ){
  echo " selected=\"selected\"";  
}
?>>United States</option>
<option value='va' data-image="/register/images/flag/blank.gif" data-imagecss="flag va" data-title="Vatican City State (Holy See)"
<? if( $CurrencyCountry['CountryCode'] == "VA"){
  echo " selected=\"selected\"";  
}
?>>Vatican City State (Holy See)</option>


</select>

</form>
            </div>
<script type="text/javascript">
 
            if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            
                $('select[name^="Passengers_PassengerDepartureCity"] option:selected').text('From');
                
                $('select[name^="Passengers_PassengerDepartureCity"]').attr('style', 'font-family : monospace; font-size : 9pt; width: 120px;');
            }
            </script>
<?
        
   
    } // $SEARCH_RESULT == 0    

   $NewTourNumber = '';
   
   if( $SpecificTourNumber == '' ){

      $TourNumber = explode( '/', $_SERVER['REQUEST_URI'] );

      $TourNumber = str_replace( '/', '', $TourNumber[1] );
      $TourNumber = str_replace( 'tour', '', $TourNumber );

      if( !is_numeric( $TourNumber ) ){

         for( $i = 0; $i < strlen( $TourNumber ); $i++ ){

            if( !is_numeric( $TourNumber[$i] ) ){

               $letterPos = $i;

               if( $i == 0 ){

                  $NewTourNumber .= $TourNumber[$i] . "-";
               } else {

                  $NewTourNumber .= "-" . $TourNumber[$i];
               }
            } else {

               $NewTourNumber .= $TourNumber[$i];
            }
         }
      $TourNumber = strtoupper($NewTourNumber);
      }
   } else {
   
      $TourNumber = $SpecificTourNumber;
   }

    $query = "SELECT * FROM Tours WHERE TourNumber = '$TourNumber' AND (Active = 'Y' OR Active IS NULL)";
    
    $result = mysqli_query($link, $query);

   if( mysqli_error( $link ) ){

      log_error($query);
      error_log(mysqli_error( $link ));
   }


   $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
   $TOUR_INFO = $row;
   
   

   if( $TOUR_INFO['TourID']== '' ){

     //log_error('TOUR NOT FOUND: ' . $query);
   } else {

       if( $SpecificDepartureID != '' ){
           
           $DepartureQuery = " AND TourDepartureID = $SpecificDepartureID";
       }       
       if( $YEARS_TO_DISPLAY == 'CURRENT_YEAR' ){
           
           $YearQuery = " AND YEAR(TourDepartureDate) = " . date("Y", time() );
       } elseif( $YEARS_TO_DISPLAY == 'NEXT_YEAR' ){
           
           $year = date("Y", time() );
           $year++;
           $YearQuery = " AND YEAR(TourDepartureDate) = " . $year;
       }
       
      $query = "SELECT * FROM TourDepartures LEFT JOIN Tours ON (TourDepartures.TourID = Tours.TourID ) WHERE ( TourDepartures.Active = 'Y' OR TourDepartures.Active Is Null OR TourDepartures.Active = '' ) AND TourDepartures.TourID = " . $row['TourID'] . " AND TourDepartureDate > '" . date( "Y-m-d", strtotime("-1 day") ) . "' $DepartureQuery $YearQuery ORDER BY TourDepartureDate, TourDepartureReturnDate";

      if( $_SERVER['PHP_AUTH_USER'] == 'brad' || $_GET['test'] == 'Y' || $_SERVER['REMOTE_ADDR'] == '216.223.71.126' || $_SESSION['TravelerEmail'] == 'brad@youreshop.com' ){
      
          echo $query . "<HR>";
      }
      $result = mysqli_query($link, $query);

      if( mysqli_error( $link ) ){

         log_error($query);
         error_log(mysqli_error( $link ));
      }
     
      if( is_array( $TOUR_DEPARTURES ) ) {
          
         $DEPARTURES = $TOUR_DEPARTURES;   
      } else {
      
       $DEPARTURES = array();
       if( !is_bool( $result ) ){ // if it's not a boolean, that means it's a result

          $count = mysqli_num_rows($result);
          while ($d_row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

             $DEPARTURES[] = $d_row;
          }
       }
      }
   }

      $DEPARTURE_YEARS_query = "SELECT YEAR(TourDepartureDate) AS YearLabel FROM TourDepartures WHERE ( TourDepartures.Active = 'Y' OR TourDepartures.Active Is Null OR TourDepartures.Active = '' ) AND TourDepartures.TourID = " . $row['TourID'] . " AND TourDepartureDate > '" . date( "Y-m-d", strtotime("-1 day") ) . "' $DepartureQuery $YearQuery GROUP BY YEAR(TourDepartureDate)";

      $DEPARTURE_YEARS_result = mysqli_query($link, $DEPARTURE_YEARS_query);

      if( mysqli_error( $link ) ){

         log_error($DEPARTURE_YEARS_query);
         error_log(mysqli_error( $link ));
      }
      
      while ($DEPARTURE_YEARS_row = mysqli_fetch_array($DEPARTURE_YEARS_result, MYSQLI_ASSOC)) {

         $DEPARTURE_YEARS[] = $DEPARTURE_YEARS_row;
      }
         
   
   if( $DEPARTURES[0]['TourSingle'] > 0 ){
   
        $TOUR_INFO['TourSinglePrice'] = $converted_amount['marker'] . number_format( $converted_amount['amount'] * $TOUR_INFO['TourSingle'], 2 ) . " (" . $to_currency . ")";
   } else {
       
       $TOUR_INFO['TourSinglePrice'] = "<a href=mailto:sales@206tours.com>Upon Request</a>";
   }

   if( $DEPARTURES[0]['TourDepartureBusinessClassOne'] > 0 ){
   
       $TOUR_INFO['TourBusinessClassOneWayPrice'] = $converted_amount['marker'] . number_format( $converted_amount['amount'] * $DEPARTURES[0]['TourDepartureBusinessClassOne'], 2 ) . " (" . $to_currency . ")";
   } else {
       
       $TOUR_INFO['TourBusinessClassOneWayPrice'] = "<a href=mailto:sales@206tours.com>Upon Request</a>";
   }

   if( $DEPARTURES[0]['TourDepartureBusinessClass'] > 0 ){
   
        $TOUR_INFO['TourBusinessClassRoundTripPrice'] = $converted_amount['marker'] . number_format( $converted_amount['amount'] * $DEPARTURES[0]['TourDepartureBusinessClass'], 2 ) . " (" . $to_currency . ")";
   } else {
       
       $TOUR_INFO['TourBusinessClassRoundTripPrice'] = "<a href=mailto:sales@206tours.com>Upon Request</a>";
   }

   if( $DEPARTURES[0]['TourDepartureFirstClass'] > 0 ){
   
        $TOUR_INFO['TourFirstClassPrice'] = $converted_amount['marker'] . number_format( $converted_amount['amount'] * $DEPARTURES[0]['TourDepartureFirstClass'], 2 ) . " (" . $to_currency . ")";
   } else {
       
        $TOUR_INFO['TourFirstClassPrice'] = "<a href=mailto:sales@206tours.com>Upon Request</a>";
   }
   

   
    $earliest_departure_year = explode("-", $DEPARTURES[0]['TourDepartureDate']);
    $earliest_departure_year = $earliest_departure_year[0];

    if( $earliest_departure_year == date("Y", time() ) ){
        $current_year = date("Y", time() );

        $next_year = $current_year + 1;

        $exploded_return_date = explode( "-", $DEPARTURES[0]['TourDepartureReturnDate'] );

        if( trim( $exploded_return_date[0] ) == $next_year ){
          
          //$current_year = $exploded_return_date[0];
        }
    } else {

        if( $year == '' ){

            $year = date("Y", time() );
        }

        $current_year = $earliest_departure_year;

    }
    
    if( $SEARCH_RESULT != '' ){

        echo "<div class=\"row\" style=\"display:inline;\">";
    } else {
        
        echo "<div class=\"row\">";
    }
        
    
    
    
    
    
    $TourDestinationQuery = "";
    if( $TOUR_INFO['TourDestination'] == '' ){
        
        $TourDestinationQuery = " AND DepartureCities.DepartureCityDestination IS NULL";
    } else {
        
        $TourDestinationQuery = " AND DepartureCities.DepartureCityDestination = " . $TOUR_INFO['TourDestination'];
    }
   
   // show regular depaeture cities, unless TourHideStdCities == 'Y' then show Tour Specific Departure cities
   if( $TOUR_INFO['TourHideStdCities'] == '' || $TOUR_INFO['TourHideStdCities'] == 'N' ){

       $cities_query = "SELECT * FROM DepartureCities LEFT JOIN STATES ON (DepartureCities.DepartureCityState = STATES.StateID) WHERE  (DepartureCities.Active = 'Y' OR DepartureCities.Active IS NULL) $TourDestinationQuery ORDER BY DepartureCity";

       $departure_cities_query = "SELECT * FROM TourDepartureCities WHERE (TourDepartureCities.Active = 'Y' OR TourDepartureCities.Active IS NULL) AND TourID = ". $TOUR_INFO['TourID'];

   } else {
       
       $cities_query = "SELECT * FROM TourDepartureCities LEFT JOIN DepartureCities ON (TourDepartureCities.DepartureCityID = DepartureCities.DepartureCitiesID ) LEFT JOIN STATES ON (DepartureCities.DepartureCityState = STATES.StateID) WHERE TourID = " . $row['TourID'] . " AND (TourDepartureCities.Active = 'Y' OR TourDepartureCities.Active IS NULL) ORDER BY DepartureCity";    
       
       $departure_cities_query = "SELECT * FROM TourDepartureCities WHERE (TourDepartureCities.Active = 'Y' OR TourDepartureCities.Active IS NULL) AND TourID = ". $TOUR_INFO['TourID'];
       
   }
   
   if( $_GET['test'] == 'Y' ){
       
       echo $cities_query . "<hr>";
       echo $departure_cities_query . "<hr>";
   }

   if( $TOUR_INFO['TourID'] != '' ){
       
        $cities_result = mysqli_query($link, $cities_query);

       if( mysqli_error( $link ) ){

          log_error($cities_query);
          error_log(mysqli_error( $link ));
       }
       
       if( $TourDestinationQuery != '' && mysqli_num_rows( $cities_result ) == 0 ){
           
           $cities_query = "SELECT * FROM DepartureCities LEFT JOIN STATES ON (DepartureCities.DepartureCityState = STATES.StateID) WHERE  (DepartureCities.Active = 'Y' OR DepartureCities.Active IS NULL)  AND DepartureCities.DepartureCityDestination IS NULL ORDER BY DepartureCity";
                  
           $cities_result = mysqli_query($link, $cities_query);

           if( mysqli_error( $link ) ){

              log_error($cities_query);
              error_log(mysqli_error( $link ));
           }           
       }

        $departure_cities_result = mysqli_query($link, $departure_cities_query);

       if( mysqli_error( $link ) ){

          log_error($departure_cities_query);
          error_log(mysqli_error( $link ));
       }
   }       
   
   while( $DEPARTURE_CITIES = mysqli_fetch_array($cities_result, MYSQLI_ASSOC) ){  
          
       $DEPARTURE_CITIES_ARRAY[] = $DEPARTURE_CITIES;
   }
   
   while( $TOUR_DEPARTURE_CITIES = mysqli_fetch_array($departure_cities_result, MYSQLI_ASSOC) ){  
          
       $TOUR_DEPARTURE_CITIES_ARRAY[] = $TOUR_DEPARTURE_CITIES;
   }   
   
    ?>

            
              <div class="small-12 xlarge-8 columns full-view">
                <div class="booking-table silver">
                  <div class="aside"><span><? echo substr( $DEPARTURES[0]['TourDepartureDate'], 0, 4 ); ?></span></div>
                  <div class="main">
                  <div class="button-row table-tabs">
                  <?
                  
                  foreach( $DEPARTURE_YEARS as $DEPARTURE_YEAR ){
                      
                      if( $DEPARTURE_YEAR['YearLabel'] == date( "Y", time() ) || $DEPARTURE_YEAR['YearLabel'] == substr( $DEPARTURES[0]['TourDepartureDate'], 0, 4 )) {
                          
                          $class = "theme-btn silver active";
                      } else {
                          
                          $class = "theme-btn silver";
                      }
                  
                      echo "<a href=\"form" . $DEPARTURE_YEAR['YearLabel'] . "\" class=\"$class\">" . $DEPARTURE_YEAR['YearLabel'] . "</a>";
                  }
                  ?>
                  </div>
                    <div class="table-head table-row">
                      <div class="col-1">
                        <p>Dates</p>
                      </div>
                      <div class="col-2">
                        <p>Select airport</p>
                      </div>
                      <div class="col-3">
                        <p>Booking</p>
                      </div>
                    </div>
                    
    <?   
   
   $i = 0;
   
    while( $TOUR_DEPARTURE = $DEPARTURES[$i] ){
        
       
        $DisplayedCities = "";

        $query = "SELECT count(*) as NumPassengers FROM OrderLines LEFT JOIN Orders on (Orders.OrderID = OrderLines.OrderID) LEFT JOIN TourDepartures on (Orders.TourDepartureID= TourDepartures.TourDepartureID) WHERE TourDepartures.TourDepartureID = " . $TOUR_DEPARTURE['TourDepartureID'] . "  AND (OrderStatus <> 8 AND OrderStatus <> 9 AND OrderStatus <> 11 AND OrderStatus <> 10 AND OrderStatus <> 12) AND OrderLineCancelled <> 'Y'";

        $dept_result = mysqli_query($link, $query);
        if( mysqli_error( $link ) ){

            log_error($query);
            error_log(mysqli_error( $link ));
        }
        $dept = mysqli_fetch_array($dept_result, MYSQLI_ASSOC);    

        $YEAR_DISPLAYED[substr( $TOUR_DEPARTURE['TourDepartureReturnDate'], 0, 4 )]++;
       
        $dep_date = format_date( $TOUR_DEPARTURE['TourDepartureDate'], FALSE, FALSE, TRUE );
        $dep_date_text = date_create( $dep_date );

        $dep_date_weekday = explode("-", $TOUR_DEPARTURE['TourDepartureDate'] );
        $dep_date_weekday =  date( "l", mktime( 0,0,0, $dep_date_weekday[1], $dep_date_weekday[2], $dep_date_weekday[0] ) );
       
        if( $TOUR_DEPARTURE['TourNumber'] == '206' || $TOUR_DEPARTURE['TourNumber'] == '207' || strpos( strtolower( $TOUR_DEPARTURE['TourName'] ), "mexico" ) !== FALSE || strpos( strtolower( $TOUR_DEPARTURE['TourDescription'] ), "mexico" ) !== FALSE ){


            $dep_date_land = format_date( $TOUR_DEPARTURE['TourDepartureDate'], FALSE, FALSE, TRUE );
            $dep_date_weekday_land = explode("-", $TOUR_DEPARTURE['TourDepartureDate'] );
            $dep_date_weekday_land =  date( "l", mktime( 0,0,0, $dep_date_weekday_land[1], $dep_date_weekday_land[2], $dep_date_weekday_land[0] ) );          
        } else {

            $dep_date_land = date_create( $TOUR_DEPARTURE['TourDepartureDate'] );

            $dep_date_land = date_add($dep_date_land, date_interval_create_from_date_string('1 day'));
            $dep_date_land = date_format($dep_date_land, 'Y-m-d');
            $dep_date_weekday_land = explode("-", $dep_date_land );

            $dep_date_land = format_date( $dep_date_land, FALSE, FALSE, TRUE );

            $dep_date_weekday_land =  date( "l", mktime( 0,0,0, $dep_date_weekday_land[1], $dep_date_weekday_land[2], $dep_date_weekday_land[0] ) );                    
        }

        $return_date = format_date( $TOUR_DEPARTURE['TourDepartureReturnDate'], FALSE, FALSE, TRUE );
        $return_date_weekday = explode("-", $TOUR_DEPARTURE['TourDepartureReturnDate'] );
        $return_date_weekday =  date( "l", mktime( 0,0,0, $return_date_weekday[1], $return_date_weekday[2], $return_date_weekday[0] ) );
       
        $bgcolor = "bgcolor=#ececec";
        if( $i % 2 ){

            $bgcolor = "bgcolor=#FFFFFF";
        }   
        
        $departure_year = explode( "-", $TOUR_DEPARTURE['TourDepartureDate'] );
        $departure_year = $departure_year[0];
        
        $return_year = explode( "-", $TOUR_DEPARTURE['TourDepartureReturnDate'] );
        $return_year = $return_year[0];


        if( $departure_year == $current_year ){

            //echo "<form method=post action=$web_url" . "login.php name=myForm id=myForm class=\"table-row\">\n";
            //echo "<!--<form method=post action=$web_url" . "login.php data-form=\"form" . substr( $TOUR_DEPARTURE['TourDepartureDate'], 0, 4 ) . "\" name=myForm id=myForm class=\"table-row tab-form\">-->\n";
            echo "<form method=post action=$web_url" . "login.php data-form=\"form" . substr( $TOUR_DEPARTURE['TourDepartureDate'], 0, 4 ) . "\" name=myForm id=myForm class=\"table-row tab-form\">\n";
            ?>
              <div data-title="Dates" class="col-1">
                <div class="date" id="<? echo "AirDate_$i"; ?>">
                  <div class="from"><span><? echo $dep_date; ?></span><small><? echo $dep_date_weekday; ?></small></div>
                  <div class="to"><span><? echo $return_date; ?>, <? echo $return_year; ?></span><small><? echo $return_date_weekday; ?></small></div>
                </div>
                <div class="date" id="<? echo "LandDate_$i"; ?>">
                  <div class="from"><span><? echo $dep_date_land; ?></span><small><? echo $dep_date_weekday_land; ?></small></div>
                  <div class="to"><span><? echo $return_date; ?>, <? echo $return_year; ?></span><small><? echo $return_date_weekday; ?></small></div>
                </div>                
              </div>
            <?
            
            /*
            echo "<div id=AirDate_$i style=\"display:block\"><table border=0><tr><td align=center>&nbsp;<span class=tourinclusiontext-db2>";
            //          echo $departure_year . "<br>";
            echo $dep_date . " - " . $return_date . ", <b>" . substr( $departure_year, 2) . "</b>";
            echo "</span><br><font style=\"font-size:10px\">$dep_date_weekday&nbsp;&nbsp;-&nbsp;&nbsp;$return_date_weekday</font>";
            //echo "<br>" . date("l", $dep_date_text );
            //echo $row['TourDepartureReturnDate'] . "<hr>";
            // " - " . date("l", $row['TourDepartureReturnDate'] );
            echo "</td></tr></table></div>";
            echo "<div id=LandDate_$i style=\"display:none\"><table border=0><tr><td align=center>&nbsp;<span class=tourinclusiontext-db2>";
            //echo $departure_year . "<br>";
            echo $dep_date_land . " - " . $return_date . ", " . substr( $departure_year, 2);
            echo "<br><font style=\"font-size:10px\">$dep_date_weekday_land&nbsp;&nbsp;-&nbsp;&nbsp;$return_date_weekday</font>";
            echo "</span></td></tr></table></div>";*/
        } else {
            
          if( $NEXT_YEAR_HEADER_DISPLAYED == '' && $YEAR_DISPLAYED[$current_year] > 0 ){
              
              if( $next_year == '' ){
                  
                  $next_year = $current_year + 1;
              }
                ?>    
                <!--    </div>     
                </div>                  
                <div class="booking-table blue">-->
                  <!--<div class="aside"><span><? echo $departure_year; ?></span></div>
                  <div class="main">
                  <div class="button-row table-tabs"><a href="form2017" class="theme-btn silver active">2017</a><a href="form2018" class="theme-btn silver">2018</a></div>
                    <div class="table-head table-row">
                      <div class="col-1">
                        <p>Dates</p>
                      </div>
                      <div class="col-2">
                        <p>Select airport</p>
                      </div>
                      <div class="col-3">
                        <p>Booking</p>
                      </div>
                    </div>-->
                    
                    <?               
              
          $NEXT_YEAR_HEADER_DISPLAYED = "Y";
          }
          
          $exploded_return_date = explode( "-", $TOUR_DEPARTURE['TourDepartureReturnDate'] );
          $next_year =  $exploded_return_date[0] + 1;
          
          $dep_date = str_replace( $next_year, "<b>" . $next_year . "</b>", $dep_date );
          $return_date = str_replace( $next_year, "<b>" . $next_year . "</b>", $return_date );
          $dep_date_land = str_replace( $next_year, "<b>" . $next_year . "</b>", $dep_date_land );    
                
          $next_year++;
          
          $dep_date = str_replace( $next_year, "<b>" . $next_year . "</b>", $dep_date );
          $return_date = str_replace( $next_year, "<b>" . $next_year . "</b>", $return_date );
          $dep_date_land = str_replace( $next_year, "<b>" . $next_year . "</b>", $dep_date_land );                
          
          if( $departure_year != $return_year ){
              
              $departure_year = $return_year;
          }  

            //echo "<form method=post action=$web_url" . "login.php name=myForm id=myForm class=\"table-row\">\n";
            //echo "<!--<form method=post action=$web_url" . "login.php data-form=\"form" . substr( $TOUR_DEPARTURE['TourDepartureDate'], 0, 4 ) . "\" name=myForm id=myForm class=\"table-row tab-form\">-->\n";
            echo "<form method=post action=$web_url" . "login.php data-form=\"form" . substr( $TOUR_DEPARTURE['TourDepartureDate'], 0, 4 ) . "\" name=myForm id=myForm class=\"table-row tab-form\">\n";
          ?>          
              <div data-title="dates" class="col-1">
                <div class="date" id="<? echo "AirDate_$i"; ?>">
                  <div class="from"><span><? echo $dep_date; ?></span><small><? echo $dep_date_weekday; ?></small></div>
                  <div class="to"><span><? echo $return_date; ?>, <? echo $departure_year; ?></span><small><? echo $return_date_weekday; ?></small></div>
                </div>
                <div class="date" id="<? echo "LandDate_$i"; ?>">
                  <div class="from"><span><? echo $dep_date_land; ?></span><small><? echo $dep_date_weekday_land; ?></small></div>
                  <div class="to"><span><? echo $return_date; ?>, <? echo $departure_year; ?></span><small><? echo $return_date_weekday; ?></small></div>
                </div>


              </div>
          <?          
        }

      $DEPARTURE_CITIES_DROPDOWN = "<select name=Passengers_PassengerDepartureCity id=\"Passengers_PassengerDepartureCity_$i\" STYLE=\"font-family : monospace; font-size : 9pt;\"><option value=\"\" SELECTED>Choose a Departure City</option>";
      
      for( $c = 0; $c < count( $DEPARTURE_CITIES_ARRAY ); $c++ ){
        
        
        $CityID = $DEPARTURE_CITIES_ARRAY[$c]['DepartureCitiesID'];
        
        // we have a custom departure city cost for this city
        if( $CityID == '' ){

            $CityID = $DEPARTURE_CITIES_ARRAY[$c]['DepartureCityID'];
        }

        $AirPrice = "";
        $AirPrice = $TOUR_DEPARTURE['TourDepartureAirPrice'];
        if( $TOUR_DEPARTURE['TourDepartureCity'] != $CityID ){ // don't add the departure city cost if the base price already includes it
                     
                        
            $CITY_FOUND = '';
            for( $t = 0; $t < count( $TOUR_DEPARTURE_CITIES_ARRAY ); $t++ ){
                
                if( $CityID == $TOUR_DEPARTURE_CITIES_ARRAY[$t]['DepartureCityID'] ){
                    
                    $AirPrice += $TOUR_DEPARTURE_CITIES_ARRAY[$t]['TourDepartureCityCost']; 
                    $cost = $TOUR_DEPARTURE_CITIES_ARRAY[$t]['TourDepartureCityCost'];
                    $t = count( $TOUR_DEPARTURE_CITIES_ARRAY );
                    
                    $CITY_FOUND = 'Y';
                }
            }
            
            if( $CITY_FOUND != 'Y' ){
                if( $DEPARTURE_CITIES_ARRAY[$c]['DepartureCityCost'] > 0 && $DEPARTURE_CITIES_ARRAY[$c]['TourID'] == ''){
                    
                    $AirPrice += $DEPARTURE_CITIES_ARRAY[$c]['DepartureCityCost']; 
                    $cost = $DEPARTURE_CITIES_ARRAY[$c]['DepartureCityCost'];
                } elseif( $DEPARTURE_CITIES_ARRAY[$c]['DepartureCityCost'] > 0 && $DEPARTURE_CITIES_ARRAY[$c]['TourID'] != $TOUR_DEPARTURE['TourID'] ){
                    
                    $AirPrice += $DEPARTURE_CITIES_ARRAY[$c]['DepartureCityCost']; 
                    $cost = $DEPARTURE_CITIES_ARRAY[$c]['DepartureCityCost'];                
                } 
            }
        } else { // if this is the departure city, we'll add the cost, only if it's a TourDepartureCityCost

            for( $t = 0; $t < count( $TOUR_DEPARTURE_CITIES_ARRAY ); $t++ ){
                
                if( $CityID == $TOUR_DEPARTURE_CITIES_ARRAY[$t]['DepartureCityID'] ){
                    
                    $AirPrice += $TOUR_DEPARTURE_CITIES_ARRAY[$t]['TourDepartureCityCost']; 
                    $cost = $TOUR_DEPARTURE_CITIES_ARRAY[$t]['TourDepartureCityCost'];
                    $t = count( $TOUR_DEPARTURE_CITIES_ARRAY );
                }
            }
        }
        
        if( $row['TourID'] == $DEPARTURE_CITIES_ARRAY[$c]['TourID'] || ( !@in_array( $CityID, $DisplayedCities ) && $TOUR_DEPARTURE['TourID'] != $DEPARTURE_CITIES_ARRAY[$c+1]['TourID'] ) ){
            
            $DEPARTURE_CITIES_DROPDOWN .= "<option value=$CityID";
            if( $TOUR_DEPARTURE['TourDepartureCity'] == $CityID || count( $DEPARTURE_CITIES_ARRAY ) == 1 ){ 
             
        //        $DEPARTURE_CITIES_DROPDOWN .= " SELECTED";
            }
            $DEPARTURE_CITIES_DROPDOWN .= ">" . $DEPARTURE_CITIES_ARRAY[$c]['DepartureCity'];
            $num_blanks = 21;
            
            if( $DEPARTURE_CITIES_ARRAY[$c]['StateCode'] != '' ){

                $DEPARTURE_CITIES_DROPDOWN .= ", " . $DEPARTURE_CITIES_ARRAY[$c]['StateCode'];
                if( strlen( $DEPARTURE_CITIES_ARRAY[$c]['StateCode'] ) == 3 ){
                    
                    $num_blanks--;
                }
            } else {
                
                $num_blanks += 4;
            }
            
            for( $l = 0; $l < $num_blanks - strlen( $DEPARTURE_CITIES_ARRAY[$c]['DepartureCity'] ); $l++ ){
                
                $DEPARTURE_CITIES_DROPDOWN .= "&nbsp;";
            }
           
            $AirPrice = $AirPrice * $converted_amount['amount'];
            $DEPARTURE_CITIES_DROPDOWN .= "$currency_marker" . number_format($AirPrice, 0) . " ($to_currency)</option>\n";          
          }
          
          $DisplayedCities[] = $CityID;
      }          
      $DEPARTURE_CITIES_DROPDOWN .= "</select>";
        
?>
<!--            <script type="text/javascript">
 
            if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            
                $('select[name^="Passengers_PassengerDepartureCity"] option:selected').text('From');
                
                $('select[name^="Passengers_PassengerDepartureCity"]').attr('style', 'font-family : monospace; font-size : 9pt; width: 120px;');
            }
            </script>      -->
          <div data-title="Select airport" class="col-2">
            <div class="input-row">
            <div style="display: inline;">
              <div class="b-input">
              
                <? 
                if( $TOUR_DEPARTURE['TourDepartureAirPrice'] > 0 ){
                echo "<input type=\"radio\" id=\"withAirfare_$i\" value=\"AIRLAND\" name=\"Passengers_PassengerLandorAir\" onClick=\"switchDate('AIR', $i);\"";
                  if( $TOUR_DEPARTURE['TourDepartureBasePrice'] == 0 ){
                      
                      echo " CHECKED";
                  }
                  echo ">";
                ?>                
                <label for="withAirfare_<? echo $i; ?>">With Airfare</label>

              </div>
<?                  echo $DEPARTURE_CITIES_DROPDOWN; 
                } else {
                    
                    echo "</div>";
                }
?>                
              </div>
            </div>
            <?
            if( $TOUR_DEPARTURE['TourDepartureBasePrice'] > 0 ){
                
                $BasePrice = "";
                $BasePrice = $TOUR_DEPARTURE['TourDepartureBasePrice'] * $converted_amount['amount'];
                ?>
                <div class="input-row">
                  <div class="b-input">
                  
                    <? echo "<input type=\"radio\" id=\"noAirfare_$i\" value=\"LAND\" name=\"Passengers_PassengerLandorAir\" onClick=\"switchDate('LAND', $i);\">"; ?>
                    <label for="noAirfare_<? echo $i; ?>">Without Airfare  - <? echo $currency_marker . number_format($BasePrice, 0)  . " ($to_currency)"; ?></label><!--<span data-info="info here" class="tooltip">?</span>-->
                  </div>
                </div>
                <?
            }  
            ?>
          </div>
          <?

          if( $TOUR_DEPARTURE['TourDepartureStatus'] == 'SOLDOUT'  ){
                         
             echo "<input type=hidden name=WaitListed value=Y>\n";
             echo "<input type=hidden name=TourID value=" . $TOUR_DEPARTURE['TourID'] . ">\n";
             echo "<input type=hidden name=TourDepartureID value=" . $TOUR_DEPARTURE['TourDepartureID'] . ">\n";         
             ?><div data-title="booking" class="col-3"><input type=submit value="WAITING LIST" class="theme-btn waitlist"></div><?
             
          } elseif( $TOUR_DEPARTURE['TourDepartureStatus'] == 'PROPOSAL' ){
             
             ?><div data-title="booking" class="col-3"></div><? 

          } elseif( $TOUR_DEPARTURE['TourDepartureStatus'] == 'NOWAIT' ){
              
              ?><div data-title="booking" class="col-3"><a href="#" class="theme-btn nowait">SOLD OUT</a></div><?
          } elseif( $row['TourDepartureStatus'] == 'CANCELLED' ){
              
              ?><div data-title="booking" class="col-3"><a href="#" class="theme-btn nowait">SOLD OUT</a></div><?
          } elseif( $row['TourDepartureCap'] != NULL && $dept['NumPassengers'] >= $row['TourDepartureCap'] ) {
          
            ?><div data-title="booking" class="col-3"><a href="#" class="theme-btn nowait">SOLD OUT</a></div><?
          } else {

             unset( $cap );
             if ( isset($TOUR_DEPARTURE['TourDepartureCap']) && isset($dept['NumPassengers']) && (($TOUR_DEPARTURE['TourDepartureCap'] - $dept['NumPassengers']) < 10) ) {    
            
                $cap = ($TOUR_DEPARTURE['TourDepartureCap'] - $dept['NumPassengers']); 
             }
             if ( !isset($cap) ) $cap = 31;    // to prevent accidental infinite for loop    ~S 011012
              
             echo "<input type=hidden name=TourID value=" . $TOUR_DEPARTURE['TourID'] . ">\n";
             echo "<input type=hidden name=TourDepartureID value=" . $TOUR_DEPARTURE['TourDepartureID'] . ">\n";      
             echo "<input type=hidden name=SelectedCountry value=" . $CurrencyCountry['CountryCode'] . ">\n";      
                 
             ?><div data-title="booking" class="col-3"><input type=submit value="BOOK NOW" class="theme-btn booknow"><?
             
             if ( isset($TOUR_DEPARTURE['TourDepartureCap']) && isset($dept['NumPassengers']) && (($TOUR_DEPARTURE['TourDepartureCap'] - $dept['NumPassengers']) < 10) ) { 
                 
                 echo "Limited Availability"; 
             }
             echo "</div>";
          }              
          ?>
          
        </form>
<?    
    $OPTION_PRICING['TourID'] = $TOUR_DEPARTURE['TourID'];      
    $i++;
   }
?>
    </div>
  </div>
</div>
<?    

    if( $SHOW_COMPACT_VIEW == 'Y' ){

        ?>
                  <div class="small-12 xlarge-8 columns hide-for-medium compact-view hide">
                    <div class="booking-table mob">
                      <? echo "<form method=post action=$web_url" . "login.php name=myForm id=myForm class=\"table-row\">\n";?>
                        <div data-title="When" class="col-1">
                          <div class="input-row datepicker">
                            <select id="TourDepartureID" name="TourDepartureID">
                            <?
                                
                                $i=0;
                                while( $TOUR_DEPARTURE = $DEPARTURES[$i] ){


                                    $dep_date = explode("-", $TOUR_DEPARTURE['TourDepartureDate'] );
                                    $dep_date_month=  date( "M", mktime( 0,0,0, $dep_date[1], $dep_date[2], $dep_date[0] ) );

                                    $return_date = explode("-", $TOUR_DEPARTURE['TourDepartureReturnDate'] );
                                    $return_date_month=  date( "M", mktime( 0,0,0, $return_date[1], $return_date[2], $return_date[0] ) );
                                    

                                    echo "<option value=" . $TOUR_DEPARTURE['TourDepartureID'] . ">". $dep_date_month . " " . $dep_date[2] .  " - " . $return_date_month .  " " . $return_date[2] . ", " . $return_date[0] . "</option>\n";
                                $i++;
                                }
                            ?>
                            </select>
                          </div>
                        </div>
                        <?
                         echo "<input type=hidden name=TourID value=" . $row['TourID'] . ">\n";
                         echo "<input type=hidden name=SelectedCountry value=" . $CurrencyCountry['CountryCode'] . ">\n";      
                        ?>

                        <div data-title="Select airport" class="col-2">
                          <div class="input-row">
                            <div class="b-input">
                                <div style="display: inline;">
                                <? 
                                echo "<input type=\"radio\" id=\"CompactwithAirfare_0\" value=\"AIRLAND\" name=\"Passengers_PassengerLandorAir\" onClick=\"switchDate('AIR', $i);\"";
                                  if( $TOUR_DEPARTURE['TourDepartureBasePrice'] == 0 ){
                                      
                                      echo " CHECKED";
                                  }
                                  echo ">";
                                ?>                
                                <label for="CompactwithAirfare_0">With Airfare</label>
                                <div class="b-input" id="DepartureCities"><? echo $DEPARTURE_CITIES_DROPDOWN; ?></div>
                                </div>
                            </div>
                            
                          </div>
                          
                          
                          
                          <?
//                        if( $TOUR_DEPARTURE['TourDepartureBasePrice'] > 0 ){
                            
                            $BasePrice = "";
                            $BasePrice = $DEPARTURES[0]['TourDepartureBasePrice'] * $converted_amount['amount'];
                            ?>
                            <div class="input-row">
                              <div class="b-input">
                              
                                <? echo "<input type=\"radio\" id=\"CompactnoAirfare_0\" value=\"LAND\" name=\"Passengers_PassengerLandorAir\" onClick=\"switchDate('LAND', 0);\">"; ?>
                                <label for="CompactnoAirfare_0" id="LandOnly">Without Airfare  - <? echo $currency_marker . number_format($BasePrice, 2)  . " ($to_currency)"; ?></label>
                                
                              </div>
                            </div>
                            <?
//                        }  
                        ?>
                        </div>
                      
                    </div>
                    <div class="b-btn noprint"><input type=submit value="BOOK NOW" class="theme-btn silver hide-for-large"></div>
                    </form>
                  </div>
        
        <?
    }    

}
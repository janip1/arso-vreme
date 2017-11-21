<style>
.wrap {
  margin-top: 30px;
}

img.vreme {
  width: 40px;
}

table, table tr, table td {
  border: none !important;
  background: none !important;
  text-align: center;
}

h5 {
  font-size: 16px;
  margin: 0 !important;
}

table {
  width: 100% !important;
}
</style>
<div class="wrap">
<?php
$url = "http://meteo.arso.gov.si/uploads/probase/www/observ/surface/text/sl/observationAms_ILIRS-BIS_latest.xml";
$xml = simplexml_load_file($url);

echo "<pre>";
print_r($xml);

$today = date("d.m.Y") . "<br>";
$date_issued = strstr($xml->metData->tsValid_issued, '1:00 CET', true);

if($today = $date_issued){
  ?>
  <table>
    <thead>
      <tr>
        <td colspan="9">
          <h5><strong><?= $xml->metData->domain_longTitle ?></strong></h5>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <?= strstr($xml->metData[0]->valid_day, 'CET', true) ?>
        </td>
        <td colspan="2">
          <?= strstr($xml->metData[4]->valid_day, 'CET', true) ?>
        </td>
        <td colspan="2">
          <?= strstr($xml->metData[8]->valid_day, 'CET', true) ?>
        </td>
      </tr>
    </thead>

    <tbody>
      <tr>

        <!-- PRVI DAN ZJUTRAJ -->
        <td>
        <?php

          $weather_data = (object) array_merge((array) $xml->metData[0]->wwsyn_icon_domain_top, (array) $xml->metData[0]->nn_icon_domain_top);

          foreach($weather_data as $weather => $data){
            switch ($data) {
              case 'FG':
                echo '<img class="vreme" class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                break;
              case 'DZ':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                break;
              case 'FZDZ':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                break;
              case 'RA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'FZRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'RASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'SN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow.png" />';
                break;
              case 'SHRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'SHRASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'SHSN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow-2.png" />';
                break;
              case 'SHGR':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/hail.png" />';
                break;
              case 'TS':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder-2.png" />';
                break;
              case 'TSRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunderstorm.png" />';
                break;
              case 'TSRASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder.png" />';
                break;
              case 'TSSN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'TSGR':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              default:
                break;
            }
          }
          if($xml->metData[0]->nn_icon_domain_top){
            switch ($xml->metData[0]->nn_icon_domain_top) {
              case 'clear':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/sunny.png" />';
                break;
              case 'mostClear':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-sunny.png" />';
                break;
              case 'slightCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'partCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'modCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'prevCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'overcast':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'FG':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                break;
              default:
                //echo "no weather";
                break;
            }
          }
      ?>
    </td>
      <!-- PRVI DAN POPOLDNE -->
          <td>
          <?php

            if($xml->metData[3]->wwsyn_icon_domain_top){
              switch ($xml->metData[3]->wwsyn_icon_domain_top) {
                case 'FG':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                  break;
                case 'DZ':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                  break;
                case 'FZDZ':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                  break;
                case 'RA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'FZRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'RASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'SN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow.png" />';
                  break;
                case 'SHRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'SHRASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'SHSN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow-2.png" />';
                  break;
                case 'SHGR':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/hail.png" />';
                  break;
                case 'TS':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder-2.png" />';
                  break;
                case 'TSRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunderstorm.png" />';
                  break;
                case 'TSRASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder.png" />';
                  break;
                case 'TSSN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'TSGR':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                default:
                  break;
              }
            }
            if($xml->metData[3]->nn_icon_domain_top){
              switch ($xml->metData[3]->nn_icon_domain_top) {
                case 'clear':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/sunny.png" />';
                  break;
                case 'mostClear':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-sunny.png" />';
                  break;
                case 'slightCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'partCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'modCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'prevCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'overcast':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'FG':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                  break;
                default:
                  //echo "no weather";
                  break;
              }
            }
        ?>
        </td>

        <!-- PRVI DAN ZJUTRAJ -->
        <td>
        <?php

          if($xml->metData[4]->wwsyn_icon_domain_top){
            switch ($xml->metData[4]->wwsyn_icon_domain_top) {
              case 'FG':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                break;
              case 'DZ':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                break;
              case 'FZDZ':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                break;
              case 'RA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'FZRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'RASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'SN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow.png" />';
                break;
              case 'SHRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'SHRASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'SHSN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow-2.png" />';
                break;
              case 'SHGR':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/hail.png" />';
                break;
              case 'TS':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder-2.png" />';
                break;
              case 'TSRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunderstorm.png" />';
                break;
              case 'TSRASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder.png" />';
                break;
              case 'TSSN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'TSGR':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              default:
                break;
            }
          }
          if($xml->metData[4]->nn_icon_domain_top){
            switch ($xml->metData[4]->nn_icon_domain_top) {
              case 'clear':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/sunny.png" />';
                break;
              case 'mostClear':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-sunny.png" />';
                break;
              case 'slightCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'partCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'modCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'prevCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'overcast':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'FG':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                break;
              default:
                break;
            }
          }
      ?>
    </td>
      <!-- DRUGI DAN POPOLDNE -->
          <td>
          <?php

            if($xml->metData[7]->wwsyn_icon_domain_top){
              switch ($xml->metData[7]->wwsyn_icon_domain_top) {
                case 'FG':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                  break;
                case 'DZ':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                  break;
                case 'FZDZ':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                  break;
                case 'RA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'FZRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'RASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'SN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow.png" />';
                  break;
                case 'SHRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'SHRASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'SHSN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow-2.png" />';
                  break;
                case 'SHGR':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/hail.png" />';
                  break;
                case 'TS':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder-2.png" />';
                  break;
                case 'TSRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunderstorm.png" />';
                  break;
                case 'TSRASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder.png" />';
                  break;
                case 'TSSN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'TSGR':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                default:
                  break;
              }
            }
            if($xml->metData[7]->nn_icon_domain_top){
              switch ($xml->metData[7]->nn_icon_domain_top) {
                case 'clear':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/sunny.png" />';
                  break;
                case 'mostClear':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-sunny.png" />';
                  break;
                case 'slightCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'partCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'modCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'prevCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'overcast':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'FG':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                  break;
                default:
                  break;
              }
            }
        ?>
        </td>

        <!-- TRETJI DAN ZJUTRAJ -->
        <td>
        <?php

          if($xml->metData[8]->wwsyn_icon_domain_top){
            switch ($xml->metData[8]->wwsyn_icon_domain_top) {
              case 'FG':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                break;
              case 'DZ':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                break;
              case 'FZDZ':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                break;
              case 'RA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'FZRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'RASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'SN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow.png" />';
                break;
              case 'SHRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                break;
              case 'SHRASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'SHSN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow-2.png" />';
                break;
              case 'SHGR':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/hail.png" />';
                break;
              case 'TS':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder-2.png" />';
                break;
              case 'TSRA':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunderstorm.png" />';
                break;
              case 'TSRASN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder.png" />';
                break;
              case 'TSSN':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'TSGR':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              default:
                break;
            }
          }
          if($xml->metData[8]->nn_icon_domain_top){
            switch ($xml->metData[8]->nn_icon_domain_top) {
              case 'clear':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/sunny.png" />';
                break;
              case 'mostClear':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-sunny.png" />';
                break;
              case 'slightCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'partCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'modCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'prevCloudy':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                break;
              case 'overcast':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                break;
              case 'FG':
                echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                break;
              default:
                break;
            }
          }
      ?>
    </td>
      <!-- TRETJI DAN POPOLDNE -->
          <td>
          <?php
            if($xml->metData[11]->wwsyn_icon_domain_top){
              switch ($xml->metData[11]->wwsyn_icon_domain_top) {
                case 'FG':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                  break;
                case 'DZ':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                  break;
                case 'FZDZ':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain.png" />';
                  break;
                case 'RA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'FZRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'RASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'SN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow.png" />';
                  break;
                case 'SHRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-2.png" />';
                  break;
                case 'SHRASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'SHSN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/snow-2.png" />';
                  break;
                case 'SHGR':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/hail.png" />';
                  break;
                case 'TS':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder-2.png" />';
                  break;
                case 'TSRA':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunderstorm.png" />';
                  break;
                case 'TSRASN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/thunder.png" />';
                  break;
                case 'TSSN':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'TSGR':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                default:
                  break;
              }
            }
            if($xml->metData[11]->nn_icon_domain_top){
              switch ($xml->metData[11]->nn_icon_domain_top) {
                case 'clear':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/sunny.png" />';
                  break;
                case 'mostClear':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-sunny.png" />';
                  break;
                case 'slightCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'partCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'modCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'prevCloudy':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/rain-snow.png" />';
                  break;
                case 'overcast':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/mostly-cloudy.png" />';
                  break;
                case 'FG':
                  echo '<img class="vreme" src="/wp-content/plugins/arso-vreme/views/images/fog.png" />';
                  break;
                default:
                  break;
              }
            }
        ?>
        </td>
      </tr>

      <tr>
        <td>
          <?= $xml->metData[0]->t_level_domain_top_degreesC . " " . $xml->metData[0]->t_var_unit ?>
        </td>

        <td>
          <?= $xml->metData[3]->t_level_domain_top_degreesC . " " . $xml->metData[3]->t_var_unit ?>
        </td>

        <td>
          <?= $xml->metData[4]->t_level_domain_top_degreesC . " " . $xml->metData[4]->t_var_unit ?>
        </td>

        <td>
          <?= $xml->metData[7]->t_level_domain_top_degreesC . " " . $xml->metData[7]->t_var_unit ?>
        </td>

        <td>
          <?= $xml->metData[8]->t_level_domain_top_degreesC . " " . $xml->metData[8]->t_var_unit ?>
        </td>

        <td>
          <?= $xml->metData[11]->t_level_domain_top_degreesC . " " . $xml->metData[11]->t_var_unit ?>
        </td>
      </tr>
    </tbody>
  </table>
<?php } ?>
</div>

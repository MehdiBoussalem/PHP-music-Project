<?php
$title="Accueil"; 
$description="Accueil";
$date="22/02/2022";
$style="";

                if(isset($_GET['style'])){
                    if ( $_GET['style']=='alternative'){
                        $mode="alternative.css";
                    }
                    else{
                        
                        $mode="style.css";
                    }
                }
                else{
                    
                    $mode="style.css";
                }
               
require"./include/header.inc.php";
?>
<main class="main">
       
<?php
$csvFile = file('stats.csv');
$dataCsv=[];
foreach ($csvFile as $line) {
    $dataCsv[] = str_getcsv($line,";");
}
$keys=array_column( $dataCsv, 2);
$dateCsv =array_multisort($keys, SORT_DESC, $dataCsv);



$data = [
    $dataCsv[0][0] => $dataCsv[0][2],
    $dataCsv[1][0] => $dataCsv[1][2],
    $dataCsv[2][0] => $dataCsv[2][2],
    $dataCsv[3][0] => $dataCsv[3][2],
    $dataCsv[4][0] => $dataCsv[4][2],
    $dataCsv[5][0] => $dataCsv[5][2],
    $dataCsv[6][0] => $dataCsv[6][2],
    $dataCsv[7][0] => $dataCsv[7][2],
    $dataCsv[8][0] => $dataCsv[8][2],
    $dataCsv[9][0] => $dataCsv[9][2],
    $dataCsv[10][0] => $dataCsv[10][2],
    $dataCsv[11][0] => $dataCsv[11][2],
];


// Image dimensions
$imageWidth = 1400;
$imageHeight = 400;

// Grid dimensions and placement within image
$gridTop = 20;
$gridLeft = 50;
$gridBottom = 340;
$gridRight = 1400;
$gridHeight = $gridBottom - $gridTop;
$gridWidth = $gridRight - $gridLeft;

// Bar and line width
$lineWidth = 1;
$barWidth = 20;

// Font settings
$font = 'OpenSans-Regular.ttf';
$fontSize = 10;

// Margin between label and axis
$labelMargin = 8;

// Max value on y-axis
$yMaxValue = $dataCsv[0][2];

// Distance between grid lines on y-axis
$yLabelSpan = 1;

// Init image
$chart = imagecreate($imageWidth, $imageHeight);

// Setup colors
$backgroundColor = imagecolorallocate($chart, 255, 255, 255);
$axisColor = imagecolorallocate($chart, 85, 85, 85);
$labelColor = $axisColor;
$gridColor = imagecolorallocate($chart, 212, 212, 212);
$barColor = imagecolorallocate($chart, 47, 133, 217);

imagefill($chart, 0, 0, $backgroundColor);

imagesetthickness($chart, $lineWidth);
for($i = 0; $i <= $yMaxValue; $i += $yLabelSpan) {
    $y = $gridBottom - $i * $gridHeight / $yMaxValue;

    // draw the line
    imageline($chart, $gridLeft, $y, $gridRight, $y, $gridColor);

    // draw right aligned label
    $labelBox = imagettfbbox($fontSize, 0, $font, strval($i));
    $labelWidth = $labelBox[4] - $labelBox[0];

    $labelX = $gridLeft - $labelWidth - $labelMargin;
    $labelY = $y + $fontSize / 2;

    imagettftext($chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, strval($i));
}

imageline($chart, $gridLeft, $gridTop, $gridLeft, $gridBottom, $axisColor);
imageline($chart, $gridLeft, $gridBottom, $gridRight, $gridBottom, $axisColor);

$barSpacing = $gridWidth / count($data);
$itemX = $gridLeft + $barSpacing / 2;

foreach($data as $key => $value) {
    // Draw the bar
    $x1 = $itemX - $barWidth / 2;
    $y1 = $gridBottom - $value / $yMaxValue * $gridHeight;
    $x2 = $itemX + $barWidth / 2;
    $y2 = $gridBottom - 1;

    imagefilledrectangle($chart, $x1, $y1, $x2, $y2, $barColor);

    // Draw the label
    $labelBox = imagettfbbox($fontSize, 0, $font, $key);
    $labelWidth = $labelBox[4] - $labelBox[0];
    
    $labelX = $itemX - $labelWidth / 2;
    $labelY = $gridBottom + $labelMargin + $fontSize;

    imagettftext($chart, $fontSize, 0, $labelX, $labelY, $labelColor, $font, $key);

    $itemX += $barSpacing;
}
imagepng($chart, 'chart.png');


?>
<img src="chart.png" alt="chart" />
         
       

</main>
<?php
$date="22/02/2022";
require"./include/footer.inc.php";
?>
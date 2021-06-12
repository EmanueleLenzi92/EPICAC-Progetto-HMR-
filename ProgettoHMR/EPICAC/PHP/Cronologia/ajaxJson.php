<?php

include ('../../APIdb/HMR_EpicacDB.php');


// get 'posts' in 'data' in call ajax
$numeroPosts= $_POST['posts'] + 5 ; 

// get 'year' in 'data' in call ajax
$anno= $_POST['year']; 

// count all posts for year selected and set visibility of "otherPosts" button
$queryCountPosts= "SELECT COUNT(cronos.IdCr) FROM cronos JOIN happenings ON happenings.IdHa = cronos.IdCr WHERE cronos.Visible= 'si' AND YEAR(happenings.Date) = '" .$anno. "'";
$resultCount = mysqli_query($db, $queryCountPosts);
$Posts= mysqli_fetch_array($resultCount);
$totalNumberPosts= $Posts[0];
if($numeroPosts > $totalNumberPosts){
	$buttonVisible= false;
} else $buttonVisible= true;




// select others posts in html string
$html="";
$query= "SELECT cronos.Date as CrDate, cronos.Title as CrTitle, cronos.Subtitle as CrSubtitle, cronos.Text as CrText, cronos.Visible, GROUP_CONCAT(distinct(people.Brief)SEPARATOR ', ') as autori, happenings.Date as HaDate, happenings.Anchor FROM cronos LEFT JOIN cronopeople ON cronos.IdCr = cronopeople.IdCr LEFT JOIN people ON people.IdPp = cronopeople.IdPp LEFT JOIN happenings ON happenings.IdHa = cronos.IdCr WHERE cronos.Visible= 'si' AND YEAR(happenings.Date) = '".$anno."' AND happenings.Date <= CURRENT_DATE() GROUP BY cronos.IdCr ORDER BY happenings.Date desc LIMIT 0, ".$numeroPosts." ";
$result = mysqli_query($db, $query);
while($row = mysqli_fetch_array($result)){
				$html= $html . '<div class="crono">';
				$html= $html . '<p>';
				if( $row['CrDate'] != "0000-00-00"){
					$html= $html . '<b class="HMR_h3">'.$row['CrDate'].' - </b>';
				}
				$html= $html . '<b class="HMR_h3" id="'.$row['Anchor'].'">'.$row['CrTitle'].'</b>';
				$html= $html . '<br/>';
				if($row['CrSubtitle'] != ""){
					$html= $html . '<i>' . $row['CrSubtitle'].';</i> ';
				}
				if ($row['autori'] != ""){
					$html= $html . '<i>' . $row['autori'].'</i> ';
				}
				if (!empty($row['autori']) or !empty($row['CrSubtitle'])){ 
					$html= $html . '<br/>';
				}
				$html= $html . $row['CrText'];
				$html= $html . '</p>';
				$html= $html . '</div>';
		}



// create a arrey json
$arrayJson= array( "html" => $html, "buttonVisible" => $buttonVisible );		
$data= json_encode($arrayJson);
echo $data;
		


        
		
	

?>
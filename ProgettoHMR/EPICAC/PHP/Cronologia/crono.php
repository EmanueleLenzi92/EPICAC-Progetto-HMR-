<?PHP
			include ('../EPICAC/APIdb/HMR_EpicacDB.php');
			
			// select all years
			$years= [];
			$query= "SELECT YEAR(Date) as years FROM happenings GROUP BY years ORDER BY years desc";	
			$result = mysqli_query($db, $query);
			while($row = mysqli_fetch_array($result)){
				// insert years in array
				array_push($years, $row['years']);
			}
			
			// print year's bar
			echo "<div class='yearsBar'><p>";
			echo "<a href='#h2" .$years[0]. "' id='yearMax'>".$years[0]."</a> <span> | </span>"; // current year
			echo '<button id="yearUp"style="display: none;" class="buttonYear">...</button>';
			
			$countDisplayYear= 10; // count for 10 numbers visible in bar
			$displayItemYearBar= "style='display: inline-block;'";
			$divisionYearBar= "<span> | </span>";
			for($i=1; $i < sizeof($years) - 3 ; $i++ ){
				if (($countDisplayYear == 0) || ($countDisplayYear < 0)){
					$displayItemYearBar = "style='display: none;'";
					$divisionYearBar= "";
				}
				echo "<a href='#h2".$years[$i]."' id='a".$years[$i]."' ".$displayItemYearBar.">".$years[$i]."</a>" . $divisionYearBar;
				$countDisplayYear--;
			}
			echo "<button id='yearDown' class='buttonYear'>...</button> <span> | </span>";
			echo '<a href="#h2'.$years[sizeof($years) - 3].'" id="yearMin">'.$years[sizeof($years) - 3].'</a>'; //first year
			echo "</p></div>";
			
			// print futures events
			$query= "SELECT cronos.Date as CrDate, cronos.Title as CrTitle, cronos.Subtitle as CrSubtitle, cronos.Text as CrText, cronos.Visible, GROUP_CONCAT(distinct(people.Brief)SEPARATOR ', ') as autori, happenings.Date as HaDate, happenings.Anchor FROM cronos LEFT JOIN cronopeople ON cronos.IdCr = cronopeople.IdCr LEFT JOIN people ON people.IdPp = cronopeople.IdPp LEFT JOIN happenings ON happenings.IdHa = cronos.IdCr WHERE cronos.Visible= 'si' AND happenings.Date > CURRENT_DATE() GROUP BY cronos.IdCr ORDER BY happenings.Date";
			$result = mysqli_query($db, $query);
			
			if( $result->num_rows != 0){
				
				echo "<h2 id='h2InProgress'>Prossimamente</h2>";
				echo "<div id='postsInProgress'>";
				
				while($row = mysqli_fetch_array($result)) {
					echo '<div class="crono">';
					echo '<p>';
					if( $row['CrDate'] != "0000-00-00"){
						echo '<b class="HMR_h3">'.$row['CrDate'].' - </b>';
					}
					echo '<b class="HMR_h3" id="'.$row['Anchor'].'">'.$row['CrTitle'].'</b>';
					echo '<br/>';
					if($row['CrSubtitle'] != ""){
						echo '<i>' . $row['CrSubtitle'].';</i> ';
					}
					if ($row['autori'] != ""){
						echo '<i>' . $row['autori'].'</i> ';
					}
					if (!empty($row['autori']) or !empty($row['CrSubtitle'])){ 
						echo '<br/>';
					}
					echo $row['CrText'];
					echo '</p>';
					echo '</div>';
				}
			} 
			
			
		
			// if GET LINK
			
			if(isset($_GET['id'])){
				
				for($i=0 ; $i < sizeof($years) - 2; $i++ ){
					
					// select all posts
					$query=  "SELECT happenings.Anchor FROM happenings JOIN cronos ON happenings.IdHa = cronos.IdCr WHERE cronos.Visible= 'si' AND YEAR(happenings.Date) = '" .$years[$i]. "' ORDER BY happenings.Date desc";
					$result = mysqli_query($db, $query);
					
					// controll in witch year is the clicked link and count his position
					$targetId= false;
					$countPost= 1;
					while($row = mysqli_fetch_array($result)) {
						if( ($row['Anchor']) == ($_GET['id']) ) {
							$targetId= true;
							$positionPostSelected= $countPost ;
						}	
						 $countPost++;
					}
					
					// set variable for clicked and not clicked link
					if($targetId == true){
						$displayPosts= "style='display: block;'";
						$arrowForPost= "class='ArrowUp'";
						$limitPosts= "LIMIT 0, ". $positionPostSelected;
					} else { 
						$displayPosts= "style='display: none;'"; 
						$arrowForPost= "class='ArrowDown'"; 
						$limitPosts= "LIMIT 0, 3";
					}
					
					// print all posts for year considering limit posts
					$query= "SELECT cronos.Date as CrDate, cronos.Title as CrTitle, cronos.Subtitle as CrSubtitle, cronos.Text as CrText, cronos.Visible, GROUP_CONCAT(distinct(people.Brief)SEPARATOR ', ') as autori, happenings.Date as HaDate, happenings.Anchor FROM cronos LEFT JOIN cronopeople ON cronos.IdCr = cronopeople.IdCr LEFT JOIN people ON people.IdPp = cronopeople.IdPp LEFT JOIN happenings ON happenings.IdHa = cronos.IdCr WHERE cronos.Visible= 'si' AND happenings.Date <= CURRENT_DATE() AND YEAR(happenings.Date) = '" .$years[$i]. "' GROUP BY cronos.IdCr ORDER BY happenings.Date desc ". $limitPosts;
					$result = mysqli_query($db, $query);
					
					echo "<h2 class='titleYear' id='h2" . $years[$i] . "'>" . $years[$i] . " <i ".$arrowForPost."></i></h2>";
					echo "<div class='posts' id='posts".$years[$i]."' ".$displayPosts.">";
					
					while($row = mysqli_fetch_array($result)) {
						
						/*
						// set class for highlighted Clicked Link
						if( ($row['Anchor']) == ($_GET['id']) ) {
							$highlightedLink= "highlightedClickedLink";
						} else $highlightedLink= "";
						*/
					
						
						echo '<div class="crono">';
						echo '<p>';
						if( $row['CrDate'] != "0000-00-00"){
							echo '<b class="HMR_h3">'.$row['CrDate'].' - </b>';
						}
						echo '<b class="HMR_h3" id="'.$row['Anchor'].'">'.$row['CrTitle'].'</b>';
						echo '<br/>';
						if($row['CrSubtitle'] != ""){
							echo '<i>' . $row['CrSubtitle'].';</i> ';
						}
						if ($row['autori'] != ""){
							echo '<i>' . $row['autori'].'</i> ';
						}
						if (!empty($row['autori']) or !empty($row['CrSubtitle'])){ 
							echo '<br/>';
						}
						echo $row['CrText'];
						echo '</p>';
						echo '</div>';
					}
					
					echo "</div>";
					echo "<button id='".$years[$i]."' class='altro ".$years[$i]."' ".$displayPosts.">Altro...</button>";
					
					// prinf img loading others posts
					echo "<img class='loadingGif' id='loadingGif".$years[$i]."' src='../Assets/Images/Loading.gif' style='display: none;'>";
				}
			
			// function for scrolling page at clicked link
			echo "<script>
			$(document).ready(function(){ 
				
				//add class highlightedClickedLink to clicked link
						
				$('#".$_GET['id']."').addClass('highlightedClickedLink')
				
				//scroll to post
				
				$('html, body').animate({
					scrollTop: $('#".$_GET['id']."').offset().top
				}, );
				
				// hide class for clicked link
				
				$( '#".$_GET['id']."' ).switchClass( 'highlightedClickedLink', '', 2500 );
				
			});
			
			
			
			</script>";
			
			} else   
				
			
			// If NOTHING is passed
			
				{
			
			
			$arrowForPost= "class='ArrowUp'";
			$displayPosts= "style='display: block;'";
			// query for all cronos
			for($i=0 ; $i < sizeof($years) - 2; $i++ ){ // -2 for excluding 2005 and 1953
				
				// count number of total posts for year
				$queryCountPosts= "SELECT COUNT(cronos.IdCr) FROM cronos JOIN happenings ON happenings.IdHa = cronos.IdCr WHERE cronos.Visible= 'si' AND YEAR(happenings.Date) = '" .$years[$i]. "'";
				$resultCount = mysqli_query($db, $queryCountPosts);
				$numberOfPosts= mysqli_fetch_array($resultCount);
				
				
				// query for limit 3 post for year
				$query= "SELECT cronos.Date as CrDate, cronos.Title as CrTitle, cronos.Subtitle as CrSubtitle, cronos.Text as CrText, cronos.Visible, GROUP_CONCAT(distinct(people.Brief)SEPARATOR ', ') as autori, happenings.Date as HaDate, happenings.Anchor FROM cronos LEFT JOIN cronopeople ON cronos.IdCr = cronopeople.IdCr LEFT JOIN people ON people.IdPp = cronopeople.IdPp LEFT JOIN happenings ON happenings.IdHa = cronos.IdCr WHERE cronos.Visible= 'si' AND happenings.Date <= CURRENT_DATE() AND YEAR(happenings.Date) = '" .$years[$i]. "' GROUP BY cronos.IdCr ORDER BY happenings.Date desc LIMIT 0, 3";
				$result = mysqli_query($db, $query);
				
				
				echo "<h2 class='titleYear' id='h2" . $years[$i] . "'>" . $years[$i] . " <i ".$arrowForPost."></i></h2>";
				echo "<div class='posts' id='posts".$years[$i]."' ".$displayPosts.">";
				
				while($row = mysqli_fetch_array($result)){
					echo '<div class="crono">';
					echo '<p>';
					if( $row['CrDate'] != "0000-00-00"){
						echo '<b class="HMR_h3">'.$row['CrDate'].' - </b>';
					}
					echo '<b class="HMR_h3" id="'.$row['Anchor'].'">'.$row['CrTitle'].'</b>';
					echo '<br/>';
					if($row['CrSubtitle'] != ""){
						echo '<i>' . $row['CrSubtitle'].';</i> ';
					}
					if ($row['autori'] != ""){
						echo '<i>' . $row['autori'].'</i> ';
					}
					if (!empty($row['autori']) or !empty($row['CrSubtitle'])){ 
						echo '<br/>';
					}
					echo $row['CrText'];
					echo '</p>';
					echo '</div>';
					
					
				}
				echo "</div>";
				
				// print "altro" only if there are many posts
				if($numberOfPosts[0] > 3){
					echo "<button id='".$years[$i]."' class='altro ".$years[$i]."' ".$displayPosts.">Altro...</button>";
				}
				
				// prinf img loading others posts
				echo "<img class='loadingGif' id='loadingGif".$years[$i]."' src='../Assets/Images/Loading.gif' style='display: none;'>";
				
				// change value for posts by the second post
				$displayPosts= "style='display: none;'";
				$arrowForPost= "class= 'ArrowDown'";
			}
			
			
				}
			
			?>
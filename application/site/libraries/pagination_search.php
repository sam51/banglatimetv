<!--<link href="<?php echo base_url()?>assets/admin_assets/css/style.css" rel="stylesheet" type="text/css" />-->
<?php
function create_pagination($table_name,$page_url,$item_per_page,$page,$total_pages)
	{
			$tbl_name=$table_name;		//your table name
			// How many adjacent pages should be shown on each side?
			$adjacents = 3;
			
			/* 
			   First get total number of rows in data table. 
			   If you have a WHERE clause in your query, make sure you mirror it here.
			*/
			
			$total_pages = $total_pages;
			
			/* Setup vars for query. */
			$targetpage = $page_url; 	//your file name  (the name of this file)
			$limit = $item_per_page; 								//how many items to show per page
			$page = $page;
			/*if($page) 
				$start = ($page - 1) * $limit; 			//first item to display on this page
			else
				$start = 0;								//if no page var is given, set start to 0*/
			
			/* Get data. */
			//$sql = "SELECT * FROM $tbl_name LIMIT $start, $limit";
			//$result = $this->admin_model->get_table('td_product','*',' LIMIT $start, $limit');
			
			/* Setup page vars for display. */
			if ($page == 0) $page = 1;					//if no page var is given, default to 1.
			$prev = $page - 1;							//previous page is page - 1
			$next = $page + 1;							//next page is page + 1
			$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
			$lpm1 = $lastpage - 1;						//last page minus 1
			
			/* 
				Now we apply our rules and draw the pagination object. 
				We're actually saving the code to a variable in case we want to draw it more than once.
			*/
			$pagination = "";
			if($lastpage > 1)
			{	
				$pagination .= "<div class=\"pagination\">";
				//previous button
				if ($page > 1) 
					$pagination.= "<a href=\"$targetpage&page=$prev\"><< পূর্ববর্তী সংবাদ</a>";
				else
					$pagination.= "<a href=\"javascript:void(0)\"><< পূর্ববর্তী সংবাদ</a>";	
				
				//pages	
				if ($lastpage < 7 + ($adjacents * 2))	//not enough pages to bother breaking it up
				{	
					for ($counter = 1; $counter <= $lastpage; $counter++)
					{
						if ($counter == $page)
							$pagination.= "<a href=\"javascript:void(0)\">$counter</a>";
						else
							$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
					}
				}
				elseif($lastpage > 5 + ($adjacents * 2))	//enough pages to hide some
				{
					//close to beginning; only hide later pages
					if($page < 1 + ($adjacents * 2))		
					{
						for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
						{
							if ($counter == $page)
								$pagination.= "<a href=\"javascript:void(0)\">$counter</a>";
							else
								$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
					}
					//in middle; hide some front and some back
					elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
					{
						$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<a href=\"javascript:void(0)\">$counter</a>";
							else
								$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";					
						}
						$pagination.= "...";
						$pagination.= "<a href=\"$targetpage&page=$lpm1\">$lpm1</a>";
						$pagination.= "<a href=\"$targetpage&page=$lastpage\">$lastpage</a>";		
					}
					//close to end; only hide early pages
					else
					{
						$pagination.= "<a href=\"$targetpage&page=1\">1</a>";
						$pagination.= "<a href=\"$targetpage&page=2\">2</a>";
						$pagination.= "...";
						for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
						{
							if ($counter == $page)
								$pagination.= "<a href=\"javascript:void(0)\">$counter</a>";
							else
								$pagination.= "<a href=\"$targetpage&page=$counter\">$counter</a>";				
						}
					}
				}
				
				//next button
				if ($page < $counter - 1) 
					$pagination.= "<a href=\"$targetpage&page=$next\">পরবর্তী সংবাদ >></a>";
				else
					$pagination.= "<a href=\"javascript:void(0)\">পরবর্তী সংবাদ >></a>";
				$pagination.= "</div>\n";		
		
			}
			return $pagination;
		}
?>
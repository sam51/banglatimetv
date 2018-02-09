<?php require('header.php'); 
?>
<style>
#lazy_load {
    display: none;
    position: fixed;
    top: 0%;
    left: 0%;
    width: 100%;
    height: 100%;
    background-color: black;
    z-index: 1001;
    -moz-opacity: 0.8;
    opacity: .80;
    filter: alpha(opacity=80);
}
.cvvhelp {
    border: medium none;
    display: none;
    height: auto;
    left: 50%;
    margin: 0 0 0 -155px;
    padding: 0;
    position: fixed;
    text-align: left;
    top: 50%;
    width: auto;
    z-index: 1002;
}
</style>
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="<?php echo base_url();?>admin.php/dashboard/category">Breaking / Current News</a>
        </li>
    </ul>
</div>

 <div class="row" id="about_contant" style="display:block;">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
         <h2><i class="glyphicon glyphicon-edit"></i> Showing News information</h2>

        <div class="box-icon">
            <a href="#" class="btn btn-setting btn-round btn-default"><i class="glyphicon glyphicon-cog"></i></a>
            <a href="#" class="btn btn-minimize btn-round btn-default"><i
                    class="glyphicon glyphicon-chevron-up"></i></a>
            <a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
        </div>
    </div>
    <div class="box-content">
    
    <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
    <tr>
     <th>Multiple Delete<br/> <a href="#" onclick="getCheckedCheckboxesFor()">CLICK</a></th>
    <th>News Category</th>
        <th>News Name</th>
        <th>News Image</th>
        <th>News Description</th>
        <th>News Short<br/> Description</th>
        <th>Current News</th>
        <th>Slider<br/> Activated</th>
        <th>Slider<br/> Image</th>
        <th>Tags</th>
        <th>Date</th>
        
        <th>Reporter</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach ($data as $value) { 
        $nc = $this->db->query('SELECT * FROM td_category WHERE id='.$value['category'])->result_array();
        ?>
    <tr>
     <td class="center">
        <input type="checkbox" name="students" value="<?php echo $value['news_id'] ;?>" />
                
        </td>
        <td class="center">
        
                   <?php echo $nc[0]['service'] ;?>
                
        </td>
        <td class="center">
		
                   <?php echo $value['name'] ;?>
                
		</td>
        <td class="center">
        
                   <img src="<?php echo base_url();?>news/<?php echo $value['news_image'] ;?>" height="130" width="130"/>
                
        </td>
        <td class="center">
        
                   <?php echo $value['desc'];?>
                
        </td>
        <td class="center">
        
                   <?php echo $value['sdesc'];?>
                
        </td>
        <td class="center">
        
                   <?php if($value['recent_news'] == 1) echo 'Activated'; else echo 'Not Activated';?>
                
        </td>
        <td class="center">
        
                  <?php echo $value['slider'] ;?>
                
        </td>
        <td class="center">
        <?php if($value['slider'] == 1) { ?>
                   <img src="<?php echo base_url();?>slider/<?php echo $value['slider_image'] ;?>" height="130" width="130"/>
                <?php } else echo 'N/A';?>
        </td>
        <td class="center">
        
                 <?php echo $value['tags'] ;?>
                
        </td>
        <td class="center">
        
                   <?php echo $value['date'] ;?>
                
        </td>
        <td class="center">
        
                   <?php echo $value['reporter_name'] ;?>
                
        </td>
        <td class="center">
            
            <a class="btn btn-info" href="<?php echo base_url();?>admin.php/Edit/news/<?php echo $value['news_id'] ;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="<?php echo base_url();?>admin.php/Delete/news/<?php echo $value['news_id'] ;?>" onclick="return Confirm('Are you sure you want to delete this Category')">
                <i class="glyphicon glyphicon-trash icon-white"></i>
                Delete
            </a>
        </td>
    </tr>
    <?php } ?>
	
    
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>
<div id="lazy_load"><img src="<?php echo base_url();?>/assets/admin/img/ajax-loaders/ajax-loader-7.gif" title="img/ajax-loaders/ajax-loader-7.gif" class="cvvhelp" style="display:none;" /></div>

<?php require('footer.php'); ?>

<script>
function getCheckedCheckboxesFor() {
   var checkboxes = document.getElementsByName('students');
var selected = [];
for (var i=0; i<checkboxes.length; i++) {
    if (checkboxes[i].checked) {
        selected.push(checkboxes[i].value);
    }
}
 if(selected == '') {
    alert('You didn"t Select Any News');
 } else {
    //alert(selected);
    //window.location.href = 'billing_multiple.php?bill_id='+selected;
    window.open('<?php echo base_url();?>admin.php/Delete/multinews/'+btoa(encodeURIComponent(selected)));
 }
} 
</script>
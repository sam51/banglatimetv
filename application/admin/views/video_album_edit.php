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
            <a href="#">Create Album</a>
        </li>
    </ul>
</div>

<form name="album" id="album" action="<?php echo base_url();?>admin.php/Edit/video_album_submit" method="post" enctype="multipart/form-data" onsubmit="return validate_album()">
  <input type="hidden" name="category" value="<?php echo $category[0]['v_album_id'];?>">
  <div class="row" id="about_contant" style="display:block;">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
         <h2><i class="glyphicon glyphicon-edit"></i> Add Album</h2>

       
    </div>
    <div class="box-content">
   
    <table class="table table-striped table-bordered bootstrap-datatable responsive">
    <thead>
    <tr>
        <th>Content type</th>
        <th>Write here</th>
        <th></th>
        
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>Uploaded cover Iamge</td>
         <td class="center">
        
                   <img src="<?php echo base_url();?>video_album/<?php echo $category[0]['cover_image'];?>" width="130" height="130">
                
        </td>
       
        <td class="center">
           
        </td>
    </tr>
	<tr>
        <td>Album cover Iamge</td>
         <td class="center">
		
                   <input type="file" name="image_file1" id="exampleInputFile" class="image_name">
                
		</td>
       
        <td class="center">
           
        </td>
    </tr>
    
    <tr>
        <td>Add Title</td>
        <td class="center">
        <input type="text" name="txt_alb_title" class="form-control alb_title" id="inputSuccess1" value="<?php echo $category[0]['cover_title'];?>">
                </td>
       
        <td class="center">
           
        </td>
    </tr>
	 <tr>
        <td>Add Brief Description</td>
        <td class="center">
        <input type="text" name="txt_alb_desc" class="form-control alb_desc" id="inputSuccess1" value="<?php echo $category[0]['cover_desc'];?>">
                </td>
       
        <td class="center">
           
        </td>
    </tr>
	 
	 <tr>
        <td>Submit here >></td>
        <td class="center">
		<button type="submit" class="btn btn-success">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Submit
            </button>
       
        <td class="center">
           
        </td>
    </tr>
    <tr>
        <td></td>
        <td class="center"><a href="<?php echo base_url();?>admin.php/Dashboard/vew_video_album" class="btn btn-warning">View Video Album</a></td>
       
       
    </tr>
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->

    </div>
	
	  
</form>
<div id="lazy_load"><img src="<?php echo base_url();?>/assets/admin/img/ajax-loaders/ajax-loader-7.gif" title="img/ajax-loaders/ajax-loader-7.gif" class="cvvhelp" style="display:none;" /></div>

<?php require('footer.php'); ?>


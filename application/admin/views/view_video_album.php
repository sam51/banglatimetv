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
            <a href="<?php echo base_url();?>admin.php/dashboard/view_album">Album</a>
        </li>
    </ul>
</div>

 <div class="row" id="about_contant" style="display:block;">
    <div class="box col-md-12">
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
         <h2><i class="glyphicon glyphicon-edit"></i> Showing Video Albums</h2>

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
    <tr><th>Album Image</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date</th>
        
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
	<?php foreach ($album as $value) { ?>
    <tr>
       
        <td class="center">
        
                   <img src="<?php echo base_url();?>video_album/<?php echo $value['cover_image'] ;?>" height="130" width="130"/>
                
        </td>
        <td class="center">
        
                   <?php echo $value['cover_title'] ;?>
                
        </td>
        <td class="center">
        
                   <?php echo $value['cover_desc'] ;?>
                
        </td>
        <td class="center">
        
                   <?php echo $value['date'] ;?>
                
        </td>
       
        <td class="center">
            
            <a class="btn btn-info" href="<?php echo base_url();?>admin.php/Edit/video_album/<?php echo $value['v_album_id'] ;?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
            </a>
            <a class="btn btn-danger" href="<?php echo base_url();?>admin.php/Delete/video_album/<?php echo $value['v_album_id'] ;?>" onclick="return Confirm('Are you sure you want to delete this Category')">
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


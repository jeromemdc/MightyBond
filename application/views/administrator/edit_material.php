<!-- begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Form Stuff</a></li>
        <li class="active"><?=$title?></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header"><?=$title?> </h1>
    <!-- end page-header -->
    
    <!-- begin row -->
    <div class="row">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <!-- begin panel -->
            <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Form Elements</h4>
                </div>

                <div class="panel-body" style="padding:15px 0 0 0">
                    <form action="<?=base_url()?>administrator/material_upload1" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="imageform1">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="photoimg1" id="photoimg1" />
                                
                            </div>
                           <div class="col-md-3"><div class="upload-photo1"><img src="<?=base_url()?>uploads/materials/<?=$result->mat_image?>" class="img-responsive"></div></div>
                        </div>
                    </form>
                </div>

                <div class="panel-body" style="padding:0">
                    <form action="<?=base_url()?>administrator/material_upload2" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="imageform2">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Fixit Image</label>
                            <div class="col-md-6">
                                <input type="file" name="photoimg2" id="photoimg2" />
                                
                            </div>
                           <div class="col-md-3"><div class="upload-photo2"><img src="<?=base_url()?>uploads/materials/<?=$result->mat_image2?>" class="img-responsive"></div></div>
                        </div>
                    </form>
                </div>

                <div class="panel-body">
                    
                    <?=form_open_multipart('administrator/edit_material/'.$result->mat_id, array('class' => 'form-horizontal', 'id' => 'myform'));?>

                        <div class="upload-photo1"><input type="hidden" name="mat_image" value="<?=@$result->mat_image?>"></div>
                        <div class="upload-photo2"><input type="hidden" name="mat_image2" value="<?=@$result->mat_image2?>"></div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="mat_name" value="<?=$result->mat_name?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('mat_name');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-9">
                                <button type="submit" class="btn btn-sm btn-success" >Submit Button</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-6 -->
    </div>
</div>
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
                    <form action="<?=base_url()?>administrator/slider_upload1" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="imageform1">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="photoimg1" id="photoimg1" />
                                
                            </div>
                           <div class="col-md-3"><div class="upload-photo1"><img src="<?=base_url()?>uploads/slider/<?=$result->image?>" class="img-responsive"></div></div>
                        </div>
                    </form>
                </div>

                <div class="panel-body" style="padding:0">
                    <form action="<?=base_url()?>administrator/slider_upload2" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="imageform2">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Background Image</label>
                            <div class="col-md-6">
                                <input type="file" name="photoimg2" id="photoimg2" />
                                
                            </div>
                           <div class="col-md-3"><div class="upload-photo2"><img src="<?=base_url()?>uploads/slider/<?=$result->bg_image?>" class="img-responsive"></div></div>
                        </div>
                    </form>
                </div>

                <div class="panel-body">
                    
                    <?=form_open_multipart('administrator/edit_slider/'.$result->id, array('class' => 'form-horizontal', 'id' => 'myform'));?>
                        <?php
                            $title = explode('<br/>', $result->title);
                        ?>

                        <div class="upload-photo1"><input type="hidden" name="image" value="<?=@$result->image?>"></div>
                        <div class="upload-photo2"><input type="hidden" name="bg_image" value="<?=@$result->bg_image?>"></div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">1st line title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="title1" value="<?=$title[0]?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('title');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">2nd line title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="title2" value="<?=$title[1]?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('title');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Link</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="link" value="<?=$result->link?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('link');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Button Text</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="btn_text" value="<?=$result->btn_text?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('btn_text');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Content</label>
                            <div class="col-md-6">
                                <textarea name="content" id="" class="form-control"><?=$result->content?></textarea>
                            </div>
                           <div class="col-md-3"><?=form_error('content');?></div>
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
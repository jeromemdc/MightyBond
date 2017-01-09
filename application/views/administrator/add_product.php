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
                    <form action="<?=base_url()?>administrator/ajax_upload1" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="imageform1">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" name="photoimg1" id="photoimg1" />
                            </div>
                           <div class="col-md-3"><div class="upload-photo1"></div></div>
                        </div>
                    </form>
                </div>

                <div class="panel-body" style="padding:0">
                    <form action="<?=base_url()?>administrator/ajax_upload2" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="imageform2">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Material Safety Data Sheet</label>
                            <div class="col-md-6">
                                <input type="file" name="photoimg2" id="photoimg2" />
                            </div>
                           <div class="col-md-3"><div class="upload-photo2"></div></div>
                        </div>
                    </form>
                </div>

                <div class="panel-body" style="padding:0">
                    <form action="<?=base_url()?>administrator/ajax_upload3" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" id="imageform3">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Technical Data Sheet</label>
                            <div class="col-md-6">
                                <input type="file" name="photoimg3" id="photoimg3" />
                            </div>
                           <div class="col-md-3"><div class="upload-photo3"></div></div>
                        </div>
                    </form>
                </div>

                <div class="panel-body" style="padding:0">
                    
                    <?=form_open_multipart('administrator/add_product',array('class' => 'form-horizontal', 'id' => 'myform'));?>
                        
                        <div class="upload-photo1"></div>
                        <div class="upload-photo2"></div>
                        <div class="upload-photo3"></div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Name</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control title" placeholder="" name="prod_name" value="<?=set_value('prod_name')?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('prod_name');?></div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-3 control-label">Category</label>
                            <div class="col-md-6">
                                <?=form_dropdown('cat_id', $categories, set_value('cat_id'), ' id="category" class="form-control"');?>
                            </div>
                           <div class="col-md-3"><?=form_error('cat_id');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Sub Category</label>
                            <div class="col-md-6">
                               <select name="sub_id" id="subcategory" class="form-control">
                                   <option value="">Please Select Category First</option>
                               </select>
                            </div>
                           <div class="col-md-3"><?=form_error('subcategory');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Description</label>
                            <div class="col-md-6">
                                <textarea name="description" id="" class="form-control ckeditor"><?=set_value('description');?></textarea>
                            </div>
                           <div class="col-md-3"><?=form_error('description');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Uses</label>
                            <div class="col-md-6">
                                <textarea name="uses" id="" class="form-control ckeditor"><?=set_value('uses');?></textarea>
                            </div>
                           <div class="col-md-3"><?=form_error('uses');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Availability</label>
                            <div class="col-md-6">
                                <textarea name="availability" id="" class="form-control ckeditor"><?=set_value('availability');?></textarea>
                            </div>
                           <div class="col-md-3"><?=form_error('availability');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Tips</label>
                            <div class="col-md-6">
                                <textarea name="tips" id="" class="form-control ckeditor"><?=set_value('tips');?></textarea>
                            </div>
                           <div class="col-md-3"><?=form_error('tips');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Features</label>
                            <div class="col-md-6">
                                <textarea name="features" id="" class="form-control ckeditor"><?=set_value('features');?></textarea>
                            </div>
                           <div class="col-md-3"><?=form_error('features');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Countries</label>
                            <div class="col-md-6">
                                
                                <label class="checkbox-inline"><input type="checkbox" name="countries[]" value="ph" <?php echo (in_array('ph', $countries) ? 'checked': '' );?> >Philippines</label>
                                <label class="checkbox-inline"><input type="checkbox" name="countries[]" value="in" <?php echo (in_array('in', $countries) ? 'checked': '' );?> >India</label>
                                <label class="checkbox-inline"><input type="checkbox" name="countries[]" value="id" <?php echo (in_array('id', $countries) ? 'checked': '' );?> >Indonesia</label>
                                <label class="checkbox-inline"><input type="checkbox" name="countries[]" value="sg" <?php echo (in_array('sg', $countries) ? 'checked': '' );?> >Singapore</label>
                                <label class="checkbox-inline"><input type="checkbox" name="countries[]" value="my" <?php echo (in_array('my', $countries) ? 'checked': '' );?> >Malaysia</label>
                                <label class="checkbox-inline"><input type="checkbox" name="countries[]" value="vn" <?php echo (in_array('vn', $countries) ? 'checked': '' );?> >Vietnam</label>
                                          
                            </div>
                           <div class="col-md-3"><?=form_error('countries');?></div>
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
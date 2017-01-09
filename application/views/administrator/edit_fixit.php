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
                <div class="panel-body">
                    
                    <?=form_open('administrator/edit_fixit/'.$result->id,'class=form-horizontal');?>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Product</label>
                            <div class="col-md-6">
                                <?=form_dropdown('product_id', $products, $result->product_id, ' class="form-control"');?>
                            </div>
                           <div class="col-md-3"><?=form_error('product_id');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Material</label>
                            <div class="col-md-6">
                                <?=form_dropdown('material', $materials, $result->material, ' id="category" class="form-control"');?>
                            </div>
                           <div class="col-md-3"><?=form_error('material');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">External Factor</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="external_factor" value="<?=$result->external_factor?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('external_factor');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Fix Type</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="fix_type" value="<?=$result->fix_type?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('fix_type');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Remarks</label>
                            <div class="col-md-6">
                                <textarea name="remarks" class="form-control ckeditor"><?=$result->remarks?></textarea>
                            </div>
                           <div class="col-md-3"><?=form_error('remarks');?></div>
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
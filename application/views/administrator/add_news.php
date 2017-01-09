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
                    
                    <?=form_open_multipart('administrator/add_news','class=form-horizontal');?>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Title</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control title" placeholder="" name="news_title" value="<?=set_value('news_title')?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('news_title');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Slug</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control slug" placeholder="" name="news_slug" value="<?=set_value('news_slug')?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('news_slug');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Category</label>
                            <div class="col-md-6">
                                <select name="news_category" id="" class="form-control">
                                    <option value="">Please Select Category</option>
                                    <option value="1" <?=(set_value('news_category') == 1 ? 'selected' : ''); ?>>News and Update</option>
                                    <option value="2" <?=(set_value('news_category') == 2 ? 'selected' : ''); ?>>Tips and Tricks</option>
                                    <option value="3" <?=(set_value('news_category') == 3 ? 'selected' : ''); ?>>CSR</option>
                                    <option value="4" <?=(set_value('news_category') == 4 ? 'selected' : ''); ?>>Career Philosophy</option>
                                </select>
                            </div>
                           <div class="col-md-3"><?=form_error('news_category');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Image</label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="prod_image">
                            </div>
                           <div class="col-md-3"><?=@$error;?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Youtube Link</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="news_link" value="<?=set_value('news_link')?>"/>
                            </div>
                           <div class="col-md-3"><?=form_error('news_link');?></div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Content</label>
                            <div class="col-md-6">
                                <textarea name="news_content" id="" class="form-control ckeditor"><?=set_value('news_content')?></textarea>
                            </div>
                           <div class="col-md-3"><?=form_error('news_content');?></div>
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
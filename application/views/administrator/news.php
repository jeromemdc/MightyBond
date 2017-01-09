begin #content -->
<div id="content" class="content">
    <!-- begin breadcrumb -->
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Home</a></li>
        <li><a href="javascript:;">Tables</a></li>
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
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Data Table - Default</h4>
                </div>
                <div class="panel-body">

                    <?php if($this->session->flashdata('saved')): ?>
                            <div class="alert alert-success">
                                <button class="close" data-dismiss="alert"></button>
                                <span><?=$this->session->flashdata('saved')?></span>
                            </div>
                        <?php endif; ?>

                    <div class="table-responsive">
                        <table id="data-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID #</th>
                                    <th>Title</th>
                                    <th>Slug</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Content</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    if($results): $i = 1;
                                        foreach($results as $row):
                                            if($row->news_category == 1){
                                                $category = "News and Updates";
                                            }elseif($row->news_category == 2){
                                                $category = "Tips and Tricks";
                                            }elseif($row->news_category == 3){
                                                $category = "CSR";    
                                            }else{
                                                $category = "Career Philosophy";
                                            }

                                            if($row->news_link != ''){
                                                $image = $row->news_image;
                                            }else{
                                                $image = base_url().'uploads/news/'.$row->news_image;
                                            }
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?=$i;?></td>
                                            <td><?=$row->news_title;?></td>
                                            <td><?=$row->news_slug;?></td>
                                            <td><?php if($row->news_image != ''): ?>
                                                <a href="<?=$image?>" data-lightbox="gallery-group-1">
                                                <img src="<?=$image?>" alt="" class="img-responsive"></a>
                                                <?php endif; ?>
                                            </td>
                                            <td><?=$category?></td>
                                            <td><?=$row->news_content;?></td>
                                            <td><a href="<?=base_url()?>administrator/edit_news/<?=$row->news_id?>"> Edit</a>  /
                                            <a href="<?=base_url()?>administrator/delete_news/<?=$row->news_id?>" class="delete"> Delete</a> </td>
                                            
                                        </tr>
                                        <?php $i++; endforeach; ?>

                                    <?php else: ?>
                                        <tr class="odd gradeX">
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                            <td>No Record</td>
                                        </tr>
                                    <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- end panel -->
        </div>
        <!-- end col-12 -->
    </div>
    <!-- end row -->
</div>
<!-- end #content
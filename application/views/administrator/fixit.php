<!-- begin #content -->
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
                                        <th>#</th>
                                        <th>Product</th>
                                        <th>Material</th>
                                        <th>External Factor</th>
                                        <th>Fix Type</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($results): $i = 1;
                                            foreach($results as $row): 
                                               
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?=$i;?></td>
                                                <td><?=$row->prod_name;?></td>
                                                <td><?=$row->material;?></td>
                                                <td><?=$row->external_factor;?></td>
                                                <td><?=$row->fix_type;?></td>
                                                <td><?=$row->remarks;?></td>
                                                <td><a href="<?=base_url()?>administrator/edit_fixit/<?=$row->id?>"> Edit</a>  /
                                                <a href="<?=base_url()?>administrator/delete_fixit/<?=$row->id?>" class="delete"> Delete</a> </td>
                                                
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
    <!-- end #content -->
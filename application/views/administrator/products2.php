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
                                        <th>Name</th>
                                        <th>Uses</th>
                                        <th>Works Best On</th>
                                        <th>Features</th>
                                        <th>Technical Info</th>
                                        <th>How to use</th>
                                        <th>Job Type</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        if($results):  $i = 1;
                                            foreach($results as $row): 

                                                $works = $this->home_model->get_works($row->prod_id);
                                                $best = '';
                                                foreach ($works as $work):
                                                    $best .= $work->material.', ';                                              
                                                endforeach;
                                                $jerome =  substr($best,0,-2);
                                               
                                            ?>
                                            <tr class="odd gradeX">
                                                <td><?=$i;?></td>    
                                                <td><?=$row->prod_name;?></td>    
                                                <td><?=$row->uses;?></td>    
                                                <td><?=$jerome;?></td>    
                                                <td><?=$row->features;?></td>    
                                                <td><?=$row->description;?></td>    
                                                <td><?=$row->tips;?></td>    
                                                <td><?=$row->job_type;?></td>    
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
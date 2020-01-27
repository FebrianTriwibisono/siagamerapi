<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style type="text/css">
    th{
        text-align:center;
        font-size:114%;
    }
    td{
        text-align:center;
        font-size:120%;
        color:black;
    }
</style>
<div class="container" id="app">
    <div class="row">
        <div class="col-md-12">
            <?php if(Session::has('info_message')): ?>
            <div class="alert alert-info"><p><?php echo e(Session::get('info_message')); ?></p></div>
            <?php endif; ?>
            <?php if(Session::has('warning_message')): ?>
            <div class="alert alert-warning"><p><?php echo e(Session::get('warning_message')); ?></p></div>
            <?php endif; ?>
            <?php if(Session::has('success_message')): ?>
            <div class="alert alert-success"><p><?php echo e(Session::get('success_message')); ?></p></div>
            <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <font size="4" color="black"> Data record</font></div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-3" style="border">
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="<?php echo e(route('record.create')); ?>" class="btn btn-success"><i class="fa fa-plus fa-fw"></i></a>
                                </div>
                            </div>
                            <div class="col-xs-3" align="center">
                                <form method="get" class="input-group input-group-sm">
                                    <input name="page" type="hidden" value="<?php echo e($records->currentPage()); ?>" />
                                    <input name="q" type="text" class="form-control" placeholder="Cari" value="<?php echo e($request->input('q')); ?>" />
                                    <div class="input-group-btn">
                                        <input type="submit" class="btn btn-success" value="Cari">
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-4">
                                <form method="get" class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        <a class="btn btn-default" href="<?php echo e(str_replace('/?', '?', $records->url(1))); ?>"
                                           <?php if($records->currentPage() == 1): ?> disabled <?php endif; ?>>&laquo;</a>
                                        <a class="btn btn-default"
                                           href="<?php echo e(str_replace('/?', '?', $records->previousPageUrl())); ?>"
                                           <?php if($records->currentPage() == 1): ?> disabled <?php endif; ?>><</a>
                                    </span>
                                    <span class="input-group-addon" id="basic-addon2">page</span>
                                    <input name="page" type="number" style="border-left: 0; border-right: 0;" value="<?php echo e($records->currentPage()); ?>" min="1" max="<?php echo e($records->lastPage()); ?>" class="form-control crud-page-number">
                                    <span class="input-group-addon">of <?php echo e($records->lastPage()); ?></span>
                                    <span class="input-group-btn">
                                        <a class="btn btn-default" href="<?php echo e(str_replace('/?', '?', $records->nextPageUrl())); ?><?php echo e((count($request->input('q')) > 0) ? ('&q='.$request->input('q')) : ('')); ?>"
                                           <?php if($records->currentPage() == $records->lastPage()): ?> disabled <?php endif; ?>>></a>
                                        <a class="btn btn-default" href="<?php echo e(str_replace('/?', '?', $records->url($records->lastPage()))); ?><?php echo e((count($request->input('q')) > 0) ? ('&q='.$request->input('q')) : ('')); ?>"
                                           <?php if($records->currentPage() == $records->lastPage()): ?> disabled <?php endif; ?>>&raquo;</a>
                                    </span>
                                </form>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group input-group-sm">
                                     <font size="3" color="black"> Total: <?php echo e($records->total()); ?> data </font>
                                </div>
                            </div>
                        </div><!-- /.row -->
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if( !$records->count() ): ?>
                                <div class="alert alert-warning">
                                    <p>Tidak ada data</p>
                                </div>
                                <?php else: ?>
                                <table class="table table-striped table-condensed table-hover table-bordered">
                                    <tr>
                                        <th>Id</th>
                                        <th>Intensitas Gempa</th>
                                        <th>Deformasi(ha(meter))</th>
                                        <th>Intensitas Gas(Tons)</th>
                                        <th>Suhu( &#8451;)</th>
                                        <th>Status</th>
                                        <th>Faktor Kepastian<br>(0-1)</th>
                                        <th>Tanggal/Waktu</th>
                                        <th>Admin</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                        if ($records->currentPage() == 1) {
                                            $no = 1;
                                        } else {
                                            $no = $records->perPage() * ($records->currentPage() - 1) + 1;
                                        }
                                    ?>
                                    <?php $__currentLoopData = $records; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($record->id); ?></td>
                                            <td><?php echo e($record->seismik); ?></td>
                                            <td><?php echo e($record->deformasi); ?></td>
                                            <td><?php echo e($record->intensitas_gas); ?></td>
                                            <td><?php echo e($record->suhu); ?></td>
                                            <td><?php echo e($record->status); ?></td>
                                            <td><?php echo e($record->kemungkinan); ?></td>
                                            <td><?php echo e($record->tgl); ?></td>
                                            <td><?php echo e($record->user->name); ?></td>
                
                                            <td align="center">
                                                <div class="btn-group btn-group-xs">
                                                    <a class="btn btn-default" href="<?php echo e(route('record.edit', $record->id)); ?>"><i class="fa fa-pencil fa-fw"></i></a>
                                                        <confirm id="<?php echo e($record->id); ?>"></confirm>
                                                </div>
                                                <form method="POST" action="<?php echo e(route('record.destroy', $record->id)); ?>" id="form<?php echo e($record->id); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <input name="_method" type="hidden" value="DELETE">
                                                </form>
                                            </td>
                                            
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
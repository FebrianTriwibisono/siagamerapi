<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/sweetalert.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                <div class="panel-heading"><font size="4" color="black">Admin</font></div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-3" style="border">
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="<?php echo e(route('user.create')); ?>" class="btn btn-success"><i class="fa fa-plus fa-fw"></i></a>
                                </div>
                            </div>
                            <div class="col-xs-3" align="center">
                                <form method="get" class="input-group input-group-sm">
                                    <input name="page" type="hidden" value="<?php echo e($users->currentPage()); ?>" />
                                    <input name="q" type="text" class="form-control" placeholder="Cari" value="<?php echo e($request->input('q')); ?>" />
                                    <div class="input-group-btn">
                                        <input type="submit" class="btn btn-success" value="Cari">
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-4">
                                <form method="get" class="input-group input-group-sm">
                                    <span class="input-group-btn">
                                        <a class="btn btn-default" href="<?php echo e(str_replace('/?', '?', $users->url(1))); ?>"
                                           <?php if($users->currentPage() == 1): ?> disabled <?php endif; ?>>&laquo;</a>
                                        <a class="btn btn-default"
                                           href="<?php echo e(str_replace('/?', '?', $users->previousPageUrl())); ?>"
                                           <?php if($users->currentPage() == 1): ?> disabled <?php endif; ?>><</a>
                                    </span>
                                    <span class="input-group-addon" id="basic-addon2">page</span>
                                    <input name="page" type="number" style="border-left: 0; border-right: 0;" value="<?php echo e($users->currentPage()); ?>" min="1" max="<?php echo e($users->lastPage()); ?>" class="form-control crud-page-number">
                                    <span class="input-group-addon">of <?php echo e($users->lastPage()); ?></span>
                                    <span class="input-group-btn">
                                        <a class="btn btn-default" href="<?php echo e(str_replace('/?', '?', $users->nextPageUrl())); ?><?php echo e((count($request->input('q')) > 0) ? ('&q='.$request->input('q')) : ('')); ?>"
                                           <?php if($users->currentPage() == $users->lastPage()): ?> disabled <?php endif; ?>>></a>
                                        <a class="btn btn-default" href="<?php echo e(str_replace('/?', '?', $users->url($users->lastPage()))); ?><?php echo e((count($request->input('q')) > 0) ? ('&q='.$request->input('q')) : ('')); ?>"
                                           <?php if($users->currentPage() == $users->lastPage()): ?> disabled <?php endif; ?>>&raquo;</a>
                                    </span>
                                </form>
                            </div>
                            <div class="col-xs-2">
                                <div class="input-group input-group-sm">
                                    <font size="3" color="black">
                                        Total: <?php echo e($users->total()); ?> data
                                    </font>
                                </div>
                            </div>
                        </div><!-- /.row -->
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if( !$users->count() ): ?>
                                <div class="alert alert-warning">
                                    <p>Tidak ada data</p>
                                </div>
                                <?php else: ?>
                                <table class="table table-striped table-condensed table-hover table-bordered">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                        if ($users->currentPage() == 1) {
                                            $no = 1;
                                        } else {
                                            $no = $users->perPage() * ($users->currentPage() - 1) + 1;
                                        }
                                    ?>
                                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>     
                                        <tr>
                                            <td><font size="3" color="black"><?php echo e($user->id); ?></font></td>
                                            <td><font size="3" color="black"><?php echo e($user->name); ?></font></td>
                                            <td><font size="3" color="black"><?php echo e($user->email); ?></font></td>
                                            
                                            
                                            <td align="center">
                                                <div class="btn-group btn-group-xs">
                                                    <a class="btn btn-default" href="<?php echo e(route('user.edit', $user->id)); ?>"><i class="fa fa-pencil fa-fw"></i></a>

                                                    <?php if(auth()->user()->id == $user->id): ?>
                                                    <?php else: ?>
                                                        <confirm id="<?php echo e($user->id); ?>"></confirm>
                                                       
                                                    <?php endif; ?>
                                                </div>
                                                <form method="POST" action="<?php echo e(route('user.destroy', $user->id)); ?>" id="form<?php echo e($user->id); ?>">
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
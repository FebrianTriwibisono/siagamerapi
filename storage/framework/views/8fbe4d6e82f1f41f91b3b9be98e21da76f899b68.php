<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Tambah Admin</div>
                <div class="panel-body">
                    <form action="<?php echo e(route('user.store')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row <?php echo e($errors->has('nama') ? 'has-error' : ''); ?>">
                                    <label for="nama" class="col-sm-4 form-control-label">Nama <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" name="name" class="form-control" placeholder="Nama User" value="<?php echo e(old('name')); ?>" required="required">
                                        <?php if($errors->has('name')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row <?php echo e($errors->has('email') ? 'has-error' : ''); ?>">
                                    <label for="nama" class="col-sm-4 form-control-label">Email <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="email" name="email" class="form-control" placeholder="Email User" value="<?php echo e(old('email')); ?>" required="required">
                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row <?php echo e($errors->has('password') ? 'has-error' : ''); ?>">
                                    <label for="nama" class="col-sm-4 form-control-label">Password <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo e(old('password')); ?>" required="required">
                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row <?php echo e($errors->has('password-repeat') ? 'has-error' : ''); ?>">
                                    <label for="nama" class="col-sm-4 form-control-label">Ulangi Password <span style="color:red;font-weight:bold;">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="password" name="password-repeat" class="form-control" placeholder="Ulangi Password" value="<?php echo e(old('password-repeat')); ?>" required="required">
                                        <?php if($errors->has('password-repeat')): ?>
                                            <span class="help-block">
                                                <strong><?php echo e($errors->first('password-repeat')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <div class="alert alert-info" role="alert">
                                <font size="3" color="black">
                                    <b>Catatan</b><br>
                                    Tanda bintang merah (<span style="color:red;font-weight:bold">*</span>) menandakan kolom tersebut wajib diisi.
                                </font>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                <a class="btn btn-primary" href="<?php echo e(route('user.index')); ?>">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>

    <script src="<?php echo e(asset('js/main.js')); ?>"></script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->startSection('title'); ?>
    Détail d'un cycle
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="card rounded-0 ">
        <div class="card-header">
            <h2 class="card-title">
                <?php echo e($cycle->nom); ?>

            </h2>
        </div>
        <div class="card-body">
                <div class="py-2 row d-flex justify-content-center">


                    <div class="mb-3 col-md-12">
                        <label for="basiInput" class="form-label">Nom du cycle</label>
                        <input type="text" class="form-control <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="nom"
                            value="<?php echo e($cycle->nom); ?>" id="basiInput" readonly>
                        <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('nom')); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="mb-3 col-md-12">
                        <label for="basiInput" class="form-label">Montant</label>
                        <input type="number" class="form-control <?php $__errorArgs = ['montant'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="montant"
                            value="<?php echo e($cycle->montant); ?>" id="basiInput" readonly>
                        <?php $__errorArgs = ['montant'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('montant')); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                </div>
                <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
                    <a href="<?php echo e(route('cycles.index')); ?>" type="button"
                        class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                            class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>

                     <a href="<?php echo e(route('cycles.edit', ['cycle' => $cycle->slug])); ?>">
                        <button class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                            class="align-middle ri-check-line label-icon fs-16 me-2"></i> Editer</button>
                        </a>

                </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="<?php echo e(URL::asset('assets/js/pages/select2.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tamuzo77/IdeaProjects/Laravel/econtrat/resources/views/users/show.blade.php ENDPATH**/ ?>
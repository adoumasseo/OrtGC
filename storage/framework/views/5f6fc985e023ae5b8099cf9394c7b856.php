
<?php $__env->startSection('title'); ?>
   Liste des cycles
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
    <link href="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">

            <div class="card-body">

                <div class="mb-3">
                    <a href="<?php echo e(route('cycles.create')); ?>">
                        <button type="button" class="btn btn-success add-btn">
                            <i class="align-bottom ri-add-line me-1"></i> Ajouter
                        </button>
                    </a>
                    <button class="btn btn-soft-danger" id="delete-record"><i class="ri-delete-bin-2-line"></i></button>
                </div>
                <div class="table-responsive">
                    <table id="cyclesTable" class="table align-middle table-bordered table-striped"
                        style="width:100%">
                        <thead>
                            <tr>
                                <?php if(Auth::user()->hasRole('Concepteur') or Auth::user()->hasRole('Administrateur')): ?>
                                        <th scope="col" style="width: 10px;"></th>
                                    <?php endif; ?>
                                <th>Nom</th>
                                <th>Montant</th>
                                <?php if(Auth::user()->hasRole('Concepteur') or Auth::user()->hasRole('Administrateur')): ?>
                                    <th class="" data-sort="action" style="width: 40px;">Actions</th>
                                <?php else: ?>
                                    <th class="" data-sort="action" style="width: 20px;">Actions</th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $cycles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <?php if(Auth::user()->hasRole('Concepteur') or Auth::user()->hasRole('Administrateur')): ?>
                                            <th scope="row">
                                                <div class="form-check">
                                                    <input class="form-check-input fs-15" type="checkbox" name="check"
                                                        value="<?php echo e($item->id); ?>">
                                                </div>
                                            </th>
                                        <?php endif; ?>
                                    <td><?php echo e($item->nom); ?></td>
                                    <td><?php echo e($item->montant); ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="<?php echo e(route('cycles.show', ['cycle' => $item->slug])); ?>"
                                                type="button" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Voir"
                                                class="mb-1 ms-1 btn btn-sm btn-info btn-icon waves-effect waves-light"><i
                                                    class="ri-eye-line"></i></a>
                                            <?php if(Auth::user()->hasRole('Concepteur') or Auth::user()->hasRole('Administrateur')): ?>
                                                <a href="<?php echo e(route('cycles.edit', ['cycle' => $item->slug])); ?>"
                                                    type="button" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Editer"
                                                    class="mb-1 ms-1 btn btn-sm btn-warning btn-icon waves-effect waves-light"><i
                                                        class="ri-edit-line"></i>
                                                </a>

                                                <button type="button" data-cycle="<?php echo e($item->slug); ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Supprimer" id="<?php echo e($item->id); ?>"
                                                    class="mb-1 ms-1 btn-delete btn btn-sm btn-danger btn-icon waves-effect waves-light"><i
                                                        class="ri-close-line"></i></button>
                                            <?php endif; ?>


                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>




            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>

<script src="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('assets/js/pages/customs/cycle.js')); ?>"></script>
<script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LARAVEL\econtrat\resources\views/cycles/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title'); ?>
    Transmission des TS - <?php echo e($departement->nom); ?>

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

<?php if(isTransmis($departement->id)): ?>
    <div class="alert alert-danger alert-dismissible alert-additional fade show mb-xl-0" role="alert">
        <div class="alert-body">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                    <i class="ri-alert-line fs-16 align-middle"></i>
                </div>
                <div class="flex-grow-1">
                    <h5 class="alert-heading">Something is very wrong!</h5>
                    <p class="mb-0">Change a few things up and try submitting again.</p>
                </div>
            </div>
        </div>
        <div class="alert-content">
            <p class="mb-0">Whenever you need to, be sure to use margin
                utilities to keep things nice and tidy.</p>
        </div>
    </div>
<?php endif; ?>

    <div class="row mb-3">
        <div class="col-lg-12">
            <a href="<?php echo e(route('cours.post_transmettre')); ?>">
                <button type="button" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                class="align-middle ri-check-line label-icon fs-16 me-2"></i> Transmettre les TS au service de programmation</button>
            </a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="banquesTable" class="table align-middle table-bordered table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Filière</th>
                                    <th>Classe</th>
                                    <th>Semestre impaire</th>
                                    <th>Semestre paire</th>
                                    <th class="" data-sort="action" style="width: 15px;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $classe): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($classe->filiere->nom); ?></td>
                                        <td><?php echo e($classe->nom); ?></td>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="<?php echo e(route('cours.show', ['classe' => $classe->slug])); ?>"
                                                    type="button" data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                    title="Voir le TS"
                                                    class="mb-1 ms-1 btn btn-sm btn-info btn-icon waves-effect waves-light"><i
                                                        class="ri-eye-line"></i></a>
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
    <script src="<?php echo e(URL::asset('assets/js/pages/customs/banque.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/econtrat/resources/views/cours/transmettre.blade.php ENDPATH**/ ?>
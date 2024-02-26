<?php $__env->startSection('title'); ?>
    Programmation des cours
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-xxl-12">
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h4 class="card-title mb-0 flex-grow-1"><?php echo e($classe->nom); ?></h4>
            </div><!-- end card header -->
            <div class="card-body">

                <div class="live-preview">
                    <div class="accordion lefticon-accordion custom-accordionwithicon accordion-border-box" id="accordionlefticon">
                        <?php $__currentLoopData = getSemestre($classe->niveau); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $semestre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="accordionlefticonExample<?php echo e($semestre); ?>">
                                    <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#accor_lefticonExamplecollapse<?php echo e($semestre); ?>" aria-expanded="true" aria-controls="accor_lefticonExamplecollapse<?php echo e($semestre); ?>">
                                        Semestre <?php echo e($semestre); ?>

                                    </button>
                                </h2>
                                <div id="accor_lefticonExamplecollapse<?php echo e($semestre); ?>" class="accordion-collapse collapse show" aria-labelledby="accordionlefticonExample<?php echo e($semestre); ?>" data-bs-parent="#accordionlefticon" style="">
                                    <div class="accordion-body">
                                        <div class="" id="accordionFlushExample">
                
                                            <div class="accordion custom-accordionwithicon accordion-border-box" id="accordionnesting">
                                                <?php $__currentLoopData = getProgrammationByClasseBySemestre($classe->id,$semestre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header" id="accordionnestingExample<?php echo e($cours->id); ?>">
                                                            <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_nestingExamplecollapse<?php echo e($cours->id); ?>" aria-expanded="false" aria-controls="accor_nestingExamplecollapse<?php echo e($cours->id); ?>">
                                                                <?php echo e($cours->ue->nom); ?> (Crédit : <?php echo e($cours->credit); ?>)
                                                            </button>
                                                        </h2>
                                                        <div id="accor_nestingExamplecollapse<?php echo e($cours->id); ?>" class="accordion-collapse collapse" aria-labelledby="accordionnestingExample<?php echo e($cours->id); ?>" data-bs-parent="#accordionnesting" style="">
                                                            <div class="accordion-body">
                                                                <div class="table-responsive mb-3">
                                                                    <table class="table table-striped table-nowrap align-middle mb-0">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">ECUE</th>
                                                                                <th scope="col">Enseignant</th>
                                                                                <th scope="col">Masse horaire</th>
                                                                                <th scope="col">Exécuté</th>
                                                                                <th scope="col">Date début</th>
                                                                                <th scope="col">Date fin</th>
                                                                                <th scope="col">Status</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php if($cours->ecue1): ?>
                                                                                <tr>
                                                                                    <td class="fw-medium">01</td>
                                                                                    <td>Bobby Davis</td>
                                                                                    <td>50</td>
                                                                                    <td>25</td>
                                                                                    <td>25/01/2024</td>
                                                                                    <td>20/02/2024</td>
                                                                                    <td><span class="badge bg-success">Confirmed</span></td>
                                                                                </tr>
                                                                            <?php endif; ?>
                                                                            <?php if($cours->ecue2): ?>
                                                                                <tr>
                                                                                    <td class="fw-medium">01</td>
                                                                                    <td>Bobby Davis</td>
                                                                                    <td>50</td>
                                                                                    <td>25</td>
                                                                                    <td>25/01/2024</td>
                                                                                    <td>20/02/2024</td>
                                                                                    <td><span class="badge bg-success">Confirmed</span></td>
                                                                                </tr>
                                                                            <?php endif; ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <a href="<?php echo e(route('programmation.create', ['classe' => $classe->slug, 'ue' => $cours->ue->slug ])); ?>">
                                                                    <button type="button" class="btn btn-primary add-btn">
                                                                        <i class="ri-edit-line"></i> Programmer l'UE
                                                                    </button>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </div>
                
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
               
                </div>
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
    <!--end col-->
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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/econtrat/resources/views/programmation/edit.blade.php ENDPATH**/ ?>
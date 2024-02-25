<?php $__env->startSection('title'); ?>
    Table de spécification - <?php echo e($classe->nom); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <input type="hidden" name="classe" value="<?php echo e($classe->id); ?>"/>
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
                                <?php $__currentLoopData = getCoursByClasseBySemestre($classe->id,$semestre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="accordionnestingExample<?php echo e($cours->id); ?>">
                                            <button class="accordion-button fw-semibold collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#accor_nestingExamplecollapse<?php echo e($cours->id); ?>" aria-expanded="false" aria-controls="accor_nestingExamplecollapse<?php echo e($cours->id); ?>">
                                                <?php echo e($cours->ue->nom); ?> (Crédit : <?php echo e($cours->credit); ?>)
                                            </button>
                                        </h2>
                                        <div id="accor_nestingExamplecollapse<?php echo e($cours->id); ?>" class="accordion-collapse collapse" aria-labelledby="accordionnestingExample<?php echo e($cours->id); ?>" data-bs-parent="#accordionnesting" style="">
                                            <div class="accordion-body">
                                                <div class="list-group">
                                                    <?php if($cours->ecue1): ?>
                                                        <div class="list-group-item">
                                                            <div class="float-end">
                                                                Masse horaire :  <?php echo e($cours->heure_theorique1); ?>

                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="list-title fs-15"><?php echo e(rechercherEcue($cours->ecue1)->nom); ?></h5>
                                                                    <p class="list-text mb-0 fs-12">Enseignant : <?php echo e($cours->enseignant1 ? rechercherEnseignant($cours->enseignant1)->nom : ''); ?> <?php echo e($cours->enseignant1 ? rechercherEnseignant($cours->enseignant1) ->prenoms : ''); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if($cours->ecue2): ?>
                                                        <div class="list-group-item">
                                                            <div class="float-end">
                                                                Masse horaire :  <?php echo e($cours->heure_theorique2); ?>

                                                            </div>
                                                            <div class="d-flex align-items-center">
                                                                <div class="flex-grow-1">
                                                                    <h5 class="list-title fs-15"><?php echo e(rechercherEcue($cours->ecue2)->nom); ?></h5>
                                                                    <p class="list-text mb-0 fs-12">Enseignant : <?php echo e($cours->enseignant2 ? rechercherEnseignant($cours->enseignant2)->nom : ''); ?> <?php echo e($cours->enseignant2 ? rechercherEnseignant($cours->enseignant2)->prenoms : ''); ?></p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
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

    <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
        <a href="<?php echo e(route('cours.index')); ?>" type="button"
            class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>
        <a href="<?php echo e(route('cours.edit', ['classe' => $classe->slug])); ?>">
            <button type="submit" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                class="align-middle ri-check-line label-icon fs-16 me-2"></i> Modifier</button>
        </a>

    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/econtrat/resources/views/cours/show.blade.php ENDPATH**/ ?>
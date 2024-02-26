
<?php $__env->startSection('title'); ?>
    Table de spécification - <?php echo e($classe->nom); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(URL::asset('build/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<form action="<?php echo e(route('cours.copier')); ?>" method="post">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="classe" value="<?php echo e($classe->id); ?>"/>
    <div class="border card rounded-0">
        <div class="card-body">
            <div class="row">
                <label for="" class="form-label">Copier les TS à partir d'une autre classe</label>
                <div class="col-12">
                    <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                        <div class="flex-grow-1">
                            <select class="select2-classe" name="source_classe" required>
                                <option value="">Selectionner une classe</option>
                                    <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($c->id != $classe->id): ?>
                                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->nom); ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="mt-3 mt-lg-0" style="margin-left: 10px;">
                            <button type="submit" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                                class="align-middle ri-check-line label-icon fs-16 me-2"></i> Copier</button>
                        </div>
                    </div><!-- end card header -->
                </div>
                <!--end col-->
            </div>
        </div>
    </div>
</form>

<form action="<?php echo e(route('cours.store')); ?>" method="post">
    <?php echo csrf_field(); ?>
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
                                <div class="accordion-flush" id="accordionFlushExample">
                                    <div class='repeater'>
                                        <div data-repeater-list="programmation<?php echo e($semestre); ?>">
                                            <?php if(count(getCoursByClasseBySemestre($classe->id,$semestre))>0): ?>
                                                <?php $__currentLoopData = getCoursByClasseBySemestre($classe->id,$semestre); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cours): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div data-repeater-item>
                                                        <div class="border card rounded-0">
                                                            <div class="card-body">
                                                                <div class="py-2 row">
                                                                    <div class="mb-3 col-md-8">
                                                                        <h2 class="card-title">Unité d'Enseignement</h2>
                                                                        <select class="select2-ue" name="ue">
                                                                            <option value="">Sélectionner une UE</option>
                                                                            <?php $__currentLoopData = $ues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($ue->id); ?>" <?php echo e($cours->ue_id == $ue->id ? 'selected' : ''); ?>><?php echo e($ue->nom); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Crédit</label>
                                                                        <input type="text" class="form-control" name="credit" value="<?php echo e($cours->credit); ?>" >
                                                                    </div>
            
                                                                    <hr/>
            
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Elément constitutif 1</label>
                                                                        <select class="select2-ecue" name="ecue1">
                                                                            <option value="">Selectionner un EC</option>
                                                                            <?php $__currentLoopData = $ecues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ecue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($ecue->id); ?>" <?php echo e($cours->ecue1==$ecue->id ? 'selected' : ''); ?>><?php echo e($ecue->nom); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Enseignant</label>
                                                                        <select class="select2-enseignant" name="enseignant1">
                                                                            <option value="">Selectionner un enseignant</option>
                                                                            <?php $__currentLoopData = getEnseignantsByUfr(getUfr()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($enseignant->id); ?>" <?php echo e($cours->enseignant1==$enseignant->id ? 'selected' : ''); ?>><?php echo e($enseignant->nom); ?> <?php echo e($enseignant->prenoms); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Masse horaire</label>
                                                                        <input type="text" class="form-control" name="masse1" value="<?php echo e($cours->heure_theorique1); ?>">
                                                                    </div>
                                                                    <hr/>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Elément constitutif 2</label>
                                                                        <select class="select2-ecue" name="ecue2">
                                                                            <option value="">Selectionner un EC</option>
                                                                            <?php $__currentLoopData = $ecues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ecue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($ecue->id); ?>" <?php echo e($cours->ecue2==$ecue->id ? 'selected' : ''); ?>><?php echo e($ecue->nom); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Enseignant</label>
                                                                        <select class="select2-enseignant" name="enseignant2">
                                                                            <option value="">Selectionner un enseignant</option>
                                                                            <?php $__currentLoopData = getEnseignantsByUfr(getUfr()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <option value="<?php echo e($enseignant->id); ?>" <?php echo e($cours->enseignant2==$enseignant->id ? 'selected' : ''); ?>><?php echo e($enseignant->nom); ?> <?php echo e($enseignant->prenoms); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3 col-md-4">
                                                                        <label for="" class="form-label">Masse horaire</label>
                                                                        <input type="text" class="form-control" name="masse2" value="<?php echo e($cours->heure_theorique2); ?>">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer">
                                                                <input data-repeater-delete type="button"  class="btn btn-danger" value="Supprimer l'UE"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <div data-repeater-item>
                                                    <div class="border card rounded-0">
                                                        <div class="card-body">
                                                            <div class="py-2 row">
                                                                <div class="mb-3 col-md-8">
                                                                    <h2 class="card-title">Unité d'Enseignement</h2>
                                                                    <select class="select2-ue" name="ue">
                                                                        <option value="">Sélectionner une UE</option>
                                                                        <?php $__currentLoopData = $ues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($ue->id); ?>"><?php echo e($ue->nom); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="" class="form-label">Crédit</label>
                                                                    <input type="text" class="form-control" name="credit" >
                                                                </div>
        
                                                                <hr/>
        
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="" class="form-label">Elément constitutif 1</label>
                                                                    <select class="select2-ecue" name="ecue1">
                                                                        <option value="">Selectionner un EC</option>
                                                                        <?php $__currentLoopData = $ecues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ecue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($ecue->id); ?>"><?php echo e($ecue->nom); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="" class="form-label">Enseignant</label>
                                                                    <select class="select2-enseignant" name="enseignant1">
                                                                        <option value="">Selectionner un enseignant</option>
                                                                        <?php $__currentLoopData = getEnseignantsByUfr(getUfr()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($enseignant->id); ?>"><?php echo e($enseignant->nom); ?> <?php echo e($enseignant->prenoms); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="" class="form-label">Masse horaire</label>
                                                                    <input type="text" class="form-control" name="masse1">
                                                                </div>
                                                                <hr/>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="" class="form-label">Elément constitutif 2</label>
                                                                    <select class="select2-ecue" name="ecue2">
                                                                        <option value="">Selectionner un EC</option>
                                                                        <?php $__currentLoopData = $ecues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ecue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($ecue->id); ?>"><?php echo e($ecue->nom); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="" class="form-label">Enseignant</label>
                                                                    <select class="select2-enseignant" name="enseignant2">
                                                                        <option value="">Selectionner un enseignant</option>
                                                                        <?php $__currentLoopData = getEnseignantsByUfr(getUfr()->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enseignant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($enseignant->id); ?>"><?php echo e($enseignant->nom); ?> <?php echo e($enseignant->prenoms); ?></option>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3 col-md-4">
                                                                    <label for="" class="form-label">Masse horaire</label>
                                                                    <input type="text" class="form-control" name="masse2">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card-footer">
                                                            <input data-repeater-delete type="button"  class="btn btn-danger" value="Supprimer l'UE"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <input data-repeater-create type="button" class="btn btn-primary" value="Ajouter une UE" id="repeater-button"/> 
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
        <button type="submit" class="btn btn-success rounded-0 btn-label waves-effect waves-light"><i
                class="align-middle ri-check-line label-icon fs-16 me-2"></i> Enregistrer</button>

    </div>
</form>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="<?php echo e(URL::asset('build/js/pages/select2.min.js')); ?>"></script>

    <script>
    $('.select2-ue').select2({
        tags: true,
        placeholder: "Sélectionner une UE",
    });
    $('.select2-ecue').select2({
        tags: true,
        placeholder: "Sélectionner un EC",
    });
    $('.select2-enseignant').select2({
        tags: false,
        placeholder: "Sélectionner un ensignant",
    });

    $('.select2-classe').select2({
        tags: false,
        placeholder: "Sélectionner une classe",
    });
    </script>
    <script src="<?php echo e(URL::asset('build/js/pages/jquery.repeater.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/form-repeater.int.js')); ?>"></script>
    <script>
    $(document).ready(function () {
    $('.repeater').repeater({
        initEmpty: false,
        defaultValues: {
            'text-input': 'foo'
        },
        show: function () {
            $(this).slideDown();
        },
        hide: function (deleteElement) {
            if(confirm("Voulez-vous vraiment supprimer l'UE")) {
                $(this).slideUp(deleteElement);
            }
        },
        
        ready: function (setIndexes) {
            $dragAndDrop.on('drop', setIndexes);
        },
        isFirstItemUndeletable: false
    })
    });
    </script>

    <script type="text/javascript">
    $("#repeater-button").click(function(){
    setTimeout(function(){

        $('.select2-container').remove();
        $('.select2-ue').select2({
            placeholder: "Sélectionner une UE",
            tags: true,
            allowClear: true
        });
        $('.select2-ecue').select2({
            placeholder: "Sélectionner un EC",
            tags: true,
            allowClear: true
        });
        $('.select2-enseignant').select2({
            placeholder: "Sélectionner un enseignant",
            allowClear: true
        });
        $('.select2-classe').select2({
            placeholder: "Sélectionner une classe",
            allowClear: true
        });
        $('.select2-container').css('width','100%');

    }, 100);
    });
    </script>

    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\LARAVEL\econtrat\resources\views/cours/edit.blade.php ENDPATH**/ ?>
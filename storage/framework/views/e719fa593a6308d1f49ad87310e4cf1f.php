<?php $__env->startSection('title'); ?>
    <?php echo e(" Detail de l'utilisateur $user->nom $user->prenom"); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <link href="<?php echo e(URL::asset('build/libs/dropzone/dropzone.css')); ?>" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div class="card rounded-0 ">
        <div class="card-header">
            <h2 class="card-title">
                <?php echo e("$user->nom $user->prenom"); ?>

            </h2>
        </div>
        <div class="card-body">
                <div class="py-2 row d-flex justify-content-center">

                    <div class="py-2 row d-flex justify-content-center">

                        <div class="mb-3 col-md-6">
                            <label for="basiInput" class="form-label">UFR</label>
                            <select class="form-control js-example-templating" name="ufr_id" disabled>
                                <?php $__currentLoopData = $universites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $universite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <optgroup label="<?php echo e($universite->nom); ?>">
                                        <?php $__currentLoopData = $universite->ufrs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ufr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e($ufr->id == $user->ufr_id ? 'selected' : ''); ?> value="<?php echo e($ufr->id); ?>">
                                            <span>
                                                <img src="<?php echo e($ufr->logo); ?>" alt="logo" height="30" width="30">
                                            </span>
                                                <span><?php echo e($ufr->nom); ?></span>
                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['ufr_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('ufr_id')); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="mb-3 col-md-6">
                            <label for="basiInput" class="form-label">Rôle</label>
                            <select disabled class="form-control js-example-templating" name="role_id">
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php echo e($user->hasRole($role->name) ? 'selected' : ''); ?> value="<?php echo e($role->id); ?>">
                                        <span><?php echo e($role->name); ?></span>
                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <?php $__errorArgs = ['role_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('role_id')); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class=" mb-3 col-md-6">
                            <label for="basiInput" class="form-label">Nom <span class="text-danger">*</span></label>
                            <input disabled type="text" placeholder="" class="form-control <?php $__errorArgs = ['nom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="nom"
                                   value="<?php echo e(old('nom', $user->nom)); ?>" id="basiInput">
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
                        <div class=" mb-3  col-md-6">
                            <label for="basiInput" class="form-label">Prénoms <span class="text-danger">*</span></label>
                            <input disabled type="text" placeholder="" class="form-control <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="prenom"
                                   value="<?php echo e(old('prenom',$user->prenom)); ?>" id="basiInput">
                            <?php $__errorArgs = ['prenom'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('prenom')); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        <div class="col-md-12 mb-3 ">
                            <label for="basiInput" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" placeholder="" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                   name="email" disabled
                                   value="<?php echo e(old('email', $user->email)); ?>" id="basiInput">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('email')); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>












                        <div class="col-md-6 mb-3 ">
                            <label for="basiInput" class="form-label">Téléphone <span class="text-danger">*</span></label>
                            <input required type="text" placeholder="60606060" disabled
                                   class="form-control <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="telephone"
                                   value="<?php echo e(old('telephone',$user->telephone)); ?>" id="basiInput">
                            <?php $__errorArgs = ['telephone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('telephone')); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>

                        <div class="col-md-6 mb-3 ">
                            <label for="basiInput" class="form-label">Sexe <span class="text-danger">*</span></label>
                            <select disabled required name="sexe" class="form-control" value="<?php echo e(old('sexe')); ?>" id="basiInput"
                                    <?php $__errorArgs = ['sexe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                            <option <?php echo e(old('sexe', $user->sexe)== 'Masculin' ? 'selected' : ''); ?> value="Masculin">Masculin</option>
                            <option <?php echo e(old('sexe',$user->sexe)== 'Féminin' ? 'selected' : ''); ?> value="Féminin">Féminin</option>
                            <option <?php echo e(old('sexe',$user->sexe)== 'Autre' ? 'selected' : ''); ?> value="Autre">Autre</option>
                            </select>
                            <?php $__errorArgs = ['sexe'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('sexe')); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>


                        
                        <div>
                            <label for="basiInput" class="form-label">Avatar <span
                                    class="text-danger">*</span></label>
                            <?php $__errorArgs = ['avatar'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-danger"> <?php echo e($errors->first('avatar')); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="dropzone">
                                <div class="dz-message needsclick">
                                    <div class="mb-3 ">
                                        <img data-dz-thumbnail class="img-fluid rounded d-block" src="<?php echo e(old('avatar', "storage/{$user->avatar}")); ?>"
                                             alt=""/>
                                    </div>

                                </div>
                            </div>


























                            <!-- end dropzon-preview -->
                        </div>


                    </div>




                </div>
                <div class="px-2 py-3 mt-3 bg-light d-flex justify-content-between">
                    <a href="<?php echo e(route('users.index')); ?>" type="button"
                        class="btn btn-info rounded-0 btn-label waves-effect waves-light"><i
                            class="align-middle ri-arrow-drop-left-line label-icon fs-16 me-2"></i> Annuler </a>

                     <a href="<?php echo e(route('users.edit', ['user' => $user->slug])); ?>">
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


    <script src="<?php echo e(URL::asset('build/libs/dropzone/dropzone-min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('build/js/pages/ecommerce-product-create.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/tamuzo77/IdeaProjects/Laravel/econtrat/resources/views/users/show.blade.php ENDPATH**/ ?>
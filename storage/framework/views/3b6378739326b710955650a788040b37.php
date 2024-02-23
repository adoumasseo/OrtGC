<!doctype html >
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-layout="vertical" data-layout-style="default"
    data-topbar="dark" data-preloader="enable" data-sidebar="light" data-sidebar-size="lg" data-sidebar-image="none"
    data-preloader="disable">
<head>
    <meta charset="utf-8" />
    <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?> </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(URL::asset('build/images/favicon.ico')); ?>">
    <?php echo $__env->make('layouts.head-css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo app('Tighten\Ziggy\BladeRouteGenerator')->generate(); ?>
</head>

<?php $__env->startSection('body'); ?>
    <?php echo $__env->make('layouts.body', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldSection(); ?>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php echo $__env->make('layouts.topbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h3 class="mb-1"> <?php echo $__env->yieldContent('title'); ?> </h3>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <form action="javascript:void(0);">
                                        <div class="row g-3 mb-0 align-items-center">
                                            <div class="col-sm-auto">
                                                <div class="input-group">
                                                    <input type="text" value = "Année 2023-2024"class="form-control border-0 dash-filter-picker shadow flatpickr-input" readonly="readonly">
                                                    <div class="input-group-text bg-danger border-danger text-white">
                                                        <i class="ri-calendar-2-line"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                            </div><!-- end card header -->
                        </div>
                        <!--end col-->
                    </div>
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <?php echo $__env->make('layouts.customizer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- JAVASCRIPT -->
    <?php echo $__env->make('layouts.vendor-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</body>

</html>
<?php /**PATH C:\Users\hp\Documents\workflow\challenges\econtrat\resources\views/layouts/master.blade.php ENDPATH**/ ?>
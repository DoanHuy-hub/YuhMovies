<?php $__env->startSection('content'); ?>
<?php $__env->startSection('title','Trang Chủ Quản Trị Viên - YuhMovies'); ?>
<div class="container-fluid bg-gray-200 p-4 border border-bottom-primary border rounded">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-dark"><b>TỔNG QUAN</b></h1>
    </div>

    <div class="row">

        <div class="col-md-4 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2  text-center">
                            <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">DOANH THU BÁN PHIM
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $total_payment=0;
                                ?>
                                <?php $__currentLoopData = $payment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $__currentLoopData = $movie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->movie_id==$item2->id): ?>
                                <?php
                                $total_payment+=$item2->price;
                                ?>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(number_format($total_payment).' VNĐ'); ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-badge-dollar fa-2x" style="--fa-secondary-opacity: 1.0; --fa-primary-color: linen; --fa-secondary-color: crimson;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2  text-center">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">DOANH THU NẠP VÍ
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php
                                $total_charge=0;
                                ?>
                                <?php $__currentLoopData = $wallet_charge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                $total_charge+=$item->money;
                                ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(number_format($total_charge).' VNĐ'); ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-money-check-alt fa-2x" style="--fa-secondary-opacity: 1.0; --fa-primary-color: black; --fa-secondary-color: limegreen;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2  text-center">
                            <div class="text-lg font-weight-bold text-info text-uppercase mb-1">TIỀN DƯ TRONG VÍ
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php echo e(number_format($total_charge-$total_payment).' VNĐ'); ?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-wallet fa-2x" style="--fa-secondary-opacity: 1.0; --fa-primary-color: dodgerblue; --fa-secondary-color: darkblue;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2  text-center">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">PHIM
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e(count($movie)); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-camera-movie fa-2x" style="--fa-secondary-opacity: 1.0; --fa-primary-color: darkblue; --fa-secondary-color: dodgerblue;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">Người dùng
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e(count($user)); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-users-crown fa-2x" style="--fa-primary-color: seagreen; --fa-secondary-color: limegreen; --fa-secondary-opacity: 1.0;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="text-lg font-weight-bold text-info text-uppercase mb-1">Tủ phim</div>
                            <div class="h5 font-weight-bold text-gray-800"><?php echo e(count($cabinet)); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-film fa-2x" style="--fa-primary-color: lightseagreen; --fa-secondary-color: linen; --fa-secondary-opacity: 1.0;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="text-lg font-weight-bold text-warning text-uppercase mb-1">Bình luận
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo e(count($comment)); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-comments-alt fa-2x " style="--fa-primary-color: goldenrod; --fa-secondary-color: gold; --fa-secondary-opacity: 1.0;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="text-lg font-weight-bold text-danger text-uppercase mb-1">Thể loại</div>
                            <div class="h5 font-weight-bold text-gray-800"><?php echo e(count($cate)); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-list-alt fa-2x" style="--fa-primary-color: linen; --fa-secondary-color: crimson; --fa-secondary-opacity: 1.0;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="text-lg font-weight-bold text-dark text-uppercase mb-1">Quốc gia</div>
                            <div class="h5 font-weight-bold text-gray-800"><?php echo e(count($nation)); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-flag-alt fa-2x" style="--fa-primary-color: black; --fa-secondary-color: darkgray; --fa-secondary-opacity: 1.0;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">Năm sản xuất</div>
                            <div class="h5 font-weight-bold text-gray-800"><?php echo e(count($year)); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-calendar-alt fa-2x " style="--fa-primary-color: navy; --fa-secondary-color: cornflowerblue; --fa-secondary-opacity: 1.0;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="text-lg font-weight-bold text-secondary text-uppercase mb-1">Ngôn ngữ</div>
                            <div class="h5 font-weight-bold text-gray-800"><?php echo e(count($language)); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fad fa-language fa-2x " style="--fa-primary-color: lightcoral; --fa-secondary-color: black; --fa-secondary-opacity: 1.0;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Content Row -->

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webxemphim\resources\views/admin/index.blade.php ENDPATH**/ ?>
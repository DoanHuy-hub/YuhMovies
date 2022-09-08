<?php $__env->startSection('title','YuhMovies'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('user.user_layout.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- general -->
<div class="general">
    <h4 class="latest-text w3_latest_text">danh mục phim</h4>
    <div class="container">
        <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
            <ul id="myTab" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Phim Hot Mới</a></li>
                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Phim Ngẫu Nhiên</a></li>
                <li role="presentation"><a href="#free" role="tab" id="free-tab" data-toggle="tab" aria-controls="free" aria-expanded="false">Phim Miễn Phí</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    <div class="w3_agile_featured_movies text-center">
                        <?php $__currentLoopData = $newmovie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-2 w3l-movie-gride-agile float-right">
                            <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="hvr-shutter-out-horizontal"><img src="<?php echo e('storage/app/poster/'.$item->poster_image); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="img-responsive" alt=" " />
                                <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                            </a>
                            <div class="mid-1 agileits_w3layouts_mid_1_home">
                                <div class="w3l-movie-text">
                                    <h6><a class="mid-1" href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>"><?php echo e($item->vie_name); ?></a>
                                    </h6>
                                </div>
                                <div class="mid-2 agile_mid_2_home">
                                    <p>
                                        <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if($item2->id==$item->year_id): ?>
                                        <?php echo e($item2->year); ?>

                                        <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </p>
                                    <div class="block-stars">
                                        <ul class="w3l-ratings">
                                            <p><?php echo e($item->time); ?></p>
                                        </ul>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="ribben">
                                <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($item->language_id==$lang->id): ?>
                                <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>">
                                    <p><?php echo e($item->quality.'-'.$lang->language); ?></p>
                                </a>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="ribbennew3">
                                <span class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px">
                                    <?php if($item->price==0): ?>
                                    Miễn phí
                                    <?php else: ?>
                                    <?php echo e(number_format(round($item->price)).'đ'); ?>

                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="clearfix"> </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    <?php $__currentLoopData = $randommovie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-2 w3l-movie-gride-agile float-right">
                        <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="hvr-shutter-out-horizontal"><img src="<?php echo e('storage/app/poster/'.$item->poster_image); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="img-responsive" alt=" " />
                            <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                        </a>
                        <div class="mid-1 agileits_w3layouts_mid_1_home">
                            <div class="w3l-movie-text">
                                <h6><a class="mid-1" href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>"><?php echo e($item->vie_name); ?></a>
                                </h6>
                            </div>
                            <div class="mid-2 agile_mid_2_home">
                                <p>
                                    <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item2->id==$item->year_id): ?>
                                    <?php echo e($item2->year); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </p>
                                <div class="block-stars">
                                    <ul class="w3l-ratings">
                                        <p><?php echo e($item->time); ?></p>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="ribben">
                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->language_id==$lang->id): ?>
                            <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>">
                                <p><?php echo e($item->quality.'-'.$lang->language); ?></p>
                            </a>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="ribbennew3">
                            <span class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px">
                                <?php if($item->price==0): ?>
                                Miễn phí
                                <?php else: ?>
                                <?php echo e(number_format(round($item->price)).'đ'); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="clearfix"> </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="free" aria-labelledby="free-tab">                    
                    <?php $__currentLoopData = $freemovie; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-2 w3l-movie-gride-agile float-right">
                        <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="hvr-shutter-out-horizontal"><img src="<?php echo e('storage/app/poster/'.$item->poster_image); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="img-responsive" alt=" " />
                            <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i></div>
                        </a>
                        <div class="mid-1 agileits_w3layouts_mid_1_home">
                            <div class="w3l-movie-text">
                                <h6><a class="mid-1" href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>"><?php echo e($item->vie_name); ?></a>
                                </h6>
                            </div>
                            <div class="mid-2 agile_mid_2_home">
                                <p>
                                    <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($item2->id==$item->year_id): ?>
                                    <?php echo e($item2->year); ?>

                                    <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </p>
                                <div class="block-stars">
                                    <ul class="w3l-ratings">
                                        <p><?php echo e($item->time); ?></p>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="ribben">
                            <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($item->language_id==$lang->id): ?>
                            <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>">
                                <p><?php echo e($item->quality.'-'.$lang->language); ?></p>
                            </a>
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="ribbennew3">
                            <span class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px">
                                <?php if($item->price==0): ?>
                                Miễn phí
                                <?php else: ?>
                                <?php echo e(number_format(round($item->price)).'đ'); ?>

                                <?php endif; ?>
                            </span>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- //general -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webxemphim\resources\views/user/index.blade.php ENDPATH**/ ?>
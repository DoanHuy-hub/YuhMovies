<?php $__env->startSection('title','Phim '.$movie->vie_name.' ('.$movie->eng_name.') - YuhMovies'); ?>
<?php $__env->startSection('content'); ?>
<!----------------- Movie list begin -------------------->
<div class="faq">
    <div class="container">
        <div class="agileits-news-top">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('user.index')); ?>">Trang Chủ</a></li>
                <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->id==$movie->cate_id): ?>
                <li><a href="<?php echo e(route('user.cate',$item->id)); ?>"><?php echo e($item->cate_name); ?></a></li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $nation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->id==$movie->nation_id): ?>
                <li><a href="<?php echo e(route('user.nation',$item->id)); ?>"><?php echo e($item->nation_name); ?></a></li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($item->id==$movie->year_id): ?>
                <li><a href="<?php echo e(route('user.year',$item->id)); ?>">Năm <?php echo e($item->year); ?></a></li>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <li class="active"><?php echo e($movie->vie_name); ?></li>
            </ol>
        </div>
        <div class="row moviedetail">
            <div class="col-md-4 text-center">
                <img class="img-thumbnail" src="<?php echo e('storage/app/poster/'.$movie->poster_image); ?>">
            </div>
            <div class="col-md-4">
                <div class="moviedetailinfor">
                    <h3><?php echo e($movie->vie_name); ?></h3>
                    <h4>
                        <b style="margin-right: 5px;"><?php echo e($movie->eng_name); ?></b>
                    </h4>
                    <div class="moviedetailinfor2">
                        <p><b>Đạo diễn: </b><?php echo e($movie->director); ?></p>
                        <?php $__currentLoopData = $nation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->id==$movie->nation_id): ?>
                        <p><b>Quốc gia: </b><a href="<?php echo e(route('user.nation',$movie->nation_id)); ?>"><?php echo e($item->nation_name); ?></a></p>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->id==$movie->year_id): ?>
                        <p><b>Năm sản xuất: </b><a href="<?php echo e(route('user.year',$movie->year_id)); ?>"><?php echo e($item->year); ?></a>
                        </p>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->id==$movie->cate_id): ?>
                        <p><b>Thể loại: </b><a href="<?php echo e(route('user.cate',$movie->cate_id)); ?>"><?php echo e($item->cate_name); ?></a>
                        </p>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <p><b>Thời lượng: </b><?php echo e($movie->time); ?></p>
                        <p><b>Chất lượng: </b><?php echo e($movie->quality); ?></p>
                        <?php $__currentLoopData = $language; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($item->id==$movie->language_id): ?>
                        <p><b>Ngôn ngữ: </b><?php echo e($item->language); ?></p>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <p><b>Điểm: </b><span class="badge badge-primary"><?php echo e($movie->point); ?></span></p>
                        <?php if($averageRate==0&&$totalRate==0): ?>
                        <p><b>Điểm người dùng đánh giá: </b><span class="badge badge-primary">Chưa có đánh giá</span></p>

                        <?php else: ?>
                        <p><b>Điểm người dùng đánh giá: </b><span class="badge badge-primary"><?php echo e($averageRate); ?> (<?php echo e($totalRate); ?> đánh giá)</span></p>

                        <?php endif; ?>
                        <p><b>Diễn viên: </b><?php echo e($movie->actor); ?></p>
                        <p><b>Giá: </b><span class="badge badge-pill badge-danger price pull-center">
                                <?php if($movie->price==0): ?>
                                <?php echo e('Miễn phí ('.number_format(round($movie->price)).'đ)'); ?>

                                <?php else: ?>
                                <?php echo e(number_format(round($movie->price)).'đ'); ?>

                                <?php endif; ?>
                            </span></p>
                        <hr>
                        <div class="text-center">
                            <!-- LikeBtn.com BEGIN -->
                            <div class="row">
                                <span class="likebtn-wrapper" data-identifier="detailmovie/<?php echo e($movie->id); ?>" data-theme="ublue" data-lang="vi" data-ef_voting="push" data-rich_snippet="true" data-dislike_enabled="false" data-show_dislike_label="true" data-counter_clickable="true" data-counter_zero_show="true" data-counter_count="true" data-popup_width="0" data-share_size="small" data-loader_show="true" data-i18n_like_tooltip="Thích phim này!" data-i18n_dislike_tooltip="Không thích phim này!" data-i18n_share_text="Cảm ơn bạn đã thích phim!" data-i18n_popup_close="Tắt"></span>
                                <script>
                                    (function(d, e, s) {
                                        if (d.getElementById("likebtn_wjs")) return;
                                        a = d.createElement(e);
                                        m = d.getElementsByTagName(e)[0];
                                        a.async = 1;
                                        a.id = "likebtn_wjs";
                                        a.src = s;
                                        m.parentNode.insertBefore(a, m)
                                    })(document, "script", "//w.likebtn.com/js/w/widget.js");
                                </script>
                                <!-- LikeBtn.com END -->
                                <a target="_blank" class="btn btn-info infobtn" title="Chia sẻ lên Facebook!" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>"><i class="fab fa-facebook-square"></i> Facebook</a>
                            </div>

                        </div>
                    </div>
                    <div class="row moviebutton">
                        <div class="col-md-6">
                            <?php if(session('username_minmovies')): ?>
                            
                            <a href="<?php echo e(route('user.addCabinet',[session('username_minmovies'),$movie->id])); ?>" class="btn btn-warning btn-lg btn-block warningbtn">Thêm phim<br>vào
                                tủ</a>
                            <?php else: ?>
                            
                            <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-warning btn-lg btn-block warningbtn">Thêm phim<br>vào
                                tủ</a>
                            <p class="text-center">(Yêu cầu đăng nhập)</p>
                            </form>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            $server=1;
                            ?>
                            <?php if($movie->price==0): ?>
                            <a href="<?php echo e(route('user.movie.watch',[$movie->id,$server])); ?>" class="btn btn-success btn-lg btn-block successbtn">Xem ngay<br>(Miễn phí)</a>
                            <?php else: ?>
                            <?php if(session('username_minmovies')): ?>
                            <?php if(!$payment->isEmpty()): ?>
                            <a href="<?php echo e(route('user.movie.watch',[$movie->id,$server])); ?>" class="btn btn-success btn-lg btn-block successbtn">Xem
                                ngay<br>(Đã mua)</a>
                            <?php else: ?>
                            <a href="#" data-toggle="modal" data-target="#buyMovie" class="btn btn-success btn-lg btn-block successbtn">Mua
                                ngay<br>(<?php echo e(number_format(round($movie->price)).'đ'); ?>)</a>
                            <?php endif; ?>
                            <?php else: ?>
                            <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-success btn-lg btn-block successbtn">Mua
                                ngay<br>(<?php echo e(number_format(round($movie->price)).'đ'); ?>)</a>
                            <p class="text-center">(Yêu cầu đăng nhập)</p>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        

                        <div class="modal video-modal fade" id="buyMovie" tabindex="-1" role="dialog" aria-labelledby="myModal">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        MUA PHIM
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <section>
                                        <div class="modal-body">
                                            <div class="w3_login_module">
                                                <div class="module form-module">
                                                    <div class="toggle"><a class="walletI" href="<?php echo e(route('user.getChargeWallet')); ?>">
                                                            <i class="fad fa-wallet" title="Nạp tiền vào ví ngay!"></i></a>
                                                        <div class="tooltip" style="margin-left:35px">Nạp tiền ngay!
                                                        </div>
                                                    </div>
                                                    <div class="form">
                                                        <form action="<?php echo e(route('user.buyMovie',$movie->id)); ?>" method="get">
                                                            <?php echo csrf_field(); ?>
                                                            <h2 class="text-center">VÍ:
                                                                <?php if($wallet): ?>
                                                                <?php $__currentLoopData = $wallet; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <b><?php echo e(number_format(round($item->money)).'đ'); ?></b>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php endif; ?>
                                                            </h2><br>
                                                            <h3>Bạn có muốn mua phim <b><?php echo e($movie->vie_name); ?></b> với
                                                                giá
                                                                <span class="badge badge-pill badge-danger price text-center"><?php echo e(number_format(round($movie->price)).'đ'); ?></span>
                                                            </h3>
                                                            <br>
                                                            <input type="submit" value="Xác nhận">
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="moviedetailinfor">
                    <p>
                        <h4><b>Nội dung</b></h4><?php echo $movie->information; ?>

                    </p>
                    <p>
                        <h4><b>Trailer</b></h4>
                    </p>
                    <div class="video-responsive">
                        <?php echo $movie->trailer; ?>

                    </div>
                    <div>
                        <h4><b>Đánh giá phim</b></h4>
                        <?php if(session('username_minmovies')): ?>
                        <form action="<?php echo e(route('user.postRate',[$movie->id, $user_id])); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="row text-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input name="rate" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="2" max="10" class="form-control" placeholder="Nhập điểm phim">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-left: 0px  !important;">
                                    <button type="submit" class="btn btn-primary btn-block">Đánh giá</button>
                                </div>
                            </div>
                        </form>
                        <?php else: ?>
                        <form>
                            <div class="row text-center">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input name="rate" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="2" max="10" class="form-control" disabled placeholder="Đăng nhập để đánh giá">
                                    </div>
                                </div>
                                <div class="col-md-4" style="padding-left: 0px  !important;">
                                    <div class="text-center">
                                        <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-block btn-primary primarybtn">
                                            Đăng nhập
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="comment">
                        <div class="row bootstrap snippets">
                            <div class="col-md-12">
                                <div class="comment-wrapper">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">
                                            <h3><b>Bình luận</b></h3>
                                        </div>
                                        <div class="panel-body" id="updateComment">
                                            <?php if(session('username_minmovies')): ?>
                                            <form id="formComment" action="<?php echo e(route('user.postComment',$movie->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <textarea required class="form-control" name="comment" id="addComment" maxlength="200" placeholder="Cảm nghĩ của bạn..." rows="3" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')" oninput="this.setCustomValidity('')"></textarea>
                                                <br>
                                                <button type="submit" id="submitComment" class="btn btn-info pull-right infobtn">Bình
                                                    luận</button>
                                            </form>
                                            <?php else: ?>
                                            <div class="text-center">
                                                <a href="#" data-toggle="modal" data-target="#myModal" class="btn btn-lg btn-primary primarybtn">
                                                    <h4 class="text-center">Đăng nhập để bình luận</h4>
                                                </a>
                                            </div>
                                            <?php endif; ?>
                                            <div class="clearfix"></div>
                                            <hr>
                                            <?php if($comment->isEmpty()): ?>
                                            <h4 class="text-center">Chưa có bình luận nào</h4>
                                            <?php endif; ?>
                                            <?php
                                            $username=session('username_minmovies');
                                            ?>
                                            <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <ul class="media-list">
                                                <li class="media">
                                                    <div class="media-body">
                                                        <span class="text-muted pull-right">
                                                            <strong class="text-muted">
                                                                <?php
                                                                \Carbon\Carbon::setLocale('vi');
                                                                $commentTime=$item->created_at;
                                                                $commentTime=\Carbon\Carbon::parse($commentTime);
                                                                $currentTime= \Carbon\Carbon::now('Asia/Ho_Chi_Minh');
                                                                echo $commentTime->diffForHumans($currentTime);
                                                                ?>
                                                            </strong>
                                                        </span>
                                                        <strong class="text-primary" style="font-size:17px">
                                                            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($item->user_id==$item2->id): ?>
                                                            <?php echo e($item2->name); ?>

                                                            <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </strong>
                                                        <p style="font-size:16px">
                                                            <?php echo e($item->comment); ?>

                                                        </p>
                                                        <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if($item2->id==$item->user_id&&$item2->username==$username): ?>
                                                        <a href="#" class="btn btn-success" data-toggle="modal" data-target="#editComment<?php echo e($item->id); ?>">Sửa</a>
                                                        <a href="<?php echo e(route('user.delComment',$item->id)); ?>" class="btn btn-danger" data-toggle="confirm" role="button">Xoá</a>
                                                        <br><br>
                                                        <div class="modal video-modal fade" id="editComment<?php echo e($item->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModal">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        Sửa bình luận
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    </div>
                                                                    <section>
                                                                        <div class="modal-body">
                                                                            <div class="w3_login_module">
                                                                                <div class="module form-module">
                                                                                    <div class="toggle"><i class="fa fa-times fa-pencil"></i>
                                                                                    </div>
                                                                                    <div class="form">
                                                                                        <form action="<?php echo e(route('user.editComment',$item->id)); ?>" method="post">
                                                                                            <?php echo csrf_field(); ?>
                                                                                            <textarea name="comment" id="txtEditComment<?php echo e($item->id); ?>" class="form-control" rows="5" placeholder="Nhập bình luận" maxlength="250" required="" oninvalid="this.setCustomValidity('Có phải bạn có quên mất gì đó?')" oninput="this.setCustomValidity('')"><?php echo e($item->comment); ?></textarea><br>
                                                                                            <input type="submit" value="Xác nhận" id="btnEditComment">
                                                                                        </form>
                                                                                    </div>
                                                                                    <script type="text/javascript">
                                                                                        $('body').on('click', '#btnEditComment', function(e) {
                                                                                            e.preventDefault();
                                                                                            $.ajax({
                                                                                                type: "post",
                                                                                                url: "<?php echo e(route('user.editComment',$item->id)); ?>",
                                                                                                data: {
                                                                                                    "_token": "<?php echo e(csrf_token()); ?>",
                                                                                                    "comment": $("#txtEditComment<?php echo e($item->id); ?>").val(),
                                                                                                },
                                                                                                dataType: "html",
                                                                                                success: function(data) {
                                                                                                    $("#updateComment").load(location.href + " #updateComment>*", "");
                                                                                                }
                                                                                            });
                                                                                            $("#editComment<?php echo e($item->id); ?>").modal('hide');
                                                                                        });
                                                                                    </script>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </section>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </li>
                                            </ul>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if(!$slider->isEmpty()): ?>
        <!-- slider-bottom -->
        <div class="banner-bottom">
            <h3 class="text-uppercase text-lg text-bold">phim cùng thể loại</h3><br>
            <div class="container text-center">
                <div class="w3_agile_banner_bottom_grid">
                    <div id="owl-demo" class="owl-carousel owl-theme">
                        <?php $__currentLoopData = $slider; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="w3l-movie-gride-agile w3l-movie-gride-agile1">
                                <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="hvr-shutter-out-horizontal">
                                    <img src="<?php echo e('storage/app/poster/'.$item->poster_image); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>" class="img-responsive" alt=" " />
                                    <div class="w3l-action-icon"><i class="fa fa-play-circle" aria-hidden="true"></i>
                                    </div>
                                </a>
                                <div class="mid-1 agileits_w3layouts_mid_1_home">
                                    <div class="w3l-movie-text">
                                        <a href="<?php echo e(route('user.movie',$item->id)); ?>" title="<?php echo e($item->vie_name.' ('.$item->eng_name.')'); ?>"><?php echo e($item->vie_name); ?></a>
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
                                <div class="ribbennew5">
                                    <span class="badge badge-pill badge-danger price2 text-center" style="margin-top:5px;">
                                        <?php if($item->price==0): ?>
                                        Miễn phí
                                        <?php else: ?>
                                        <?php echo e(number_format(round($item->price)).'đ'); ?>

                                        <?php endif; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider-bottom -->
        <?php endif; ?>
    </div>
</div>
<script>
    //Code nút xoá
    $('[data-toggle="confirm"]').jConfirm({
        question: 'Bạn có chắc chắn xoá?',
        confirm_text: 'Có',
        deny_text: 'Không',
        size: 'medium',
        theme: 'white',
        follow_href: true
    });
</script>
<script src="public/user/js/owl.carousel2.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('body').on('click', '#submitComment', function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: "<?php echo e(route('user.postComment',$movie->id)); ?>",
                data: {
                    "_token": "<?php echo e(csrf_token()); ?>",
                    "comment": $("#addComment").val(),
                },
                dataType: "html",
                success: function(data) {
                    $("#updateComment").load(location.href + " #updateComment>*", "");
                }
            });
        });

    });
</script>
<!----------------- Movie list end -------------------->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\webxemphim\resources\views/user/detailmovie.blade.php ENDPATH**/ ?>
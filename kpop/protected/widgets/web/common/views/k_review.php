<div class="herald-module col-lg-12 col-md-12 col-sm-12" id="herald-module-1-6" data-col="12">

    <div class="herald-mod-wrap">
        <div class="herald-mod-head ">
            <div class="herald-mod-title"><h2 class="h6 herald-mod-h herald-color">Netizen</h2>
            </div>
        </div>
    </div>
    <div class="row herald-posts row-eq-height ">

        <?php
        $news = WebNewsModel::model()->getNewsByCat(5, 6, 0);
        foreach ($news as $item):
        ?>
        <article
            class="herald-lay-f post-140 post type-post status-publish format-standard has-post-thumbnail hentry category-travel">

            <div class="herald-post-thumbnail herald-format-icon-middle">
                <a href="#"
                   title="The top 10 traveling taboos you should break">
                    <img width="300" height="168"
                         src="<?php echo Yii::app()->params['storage']['NewsUrl'] . $item->url_img;?>"
                         class="attachment-herald-lay-f size-herald-lay-f wp-post-image" alt=""
                         srcset="<?php echo Yii::app()->params['storage']['NewsUrl'] . $item->url_img;?> 300w, <?php echo Yii::app()->params['storage']['NewsUrl'] . $item->url_img;?> 990w, <?php echo Yii::app()->params['storage']['NewsUrl'] . $item->url_img;?> 1320w,
                         <?php echo Yii::app()->params['storage']['NewsUrl'] . $item->url_img;?> 470w, <?php echo Yii::app()->params['storage']['NewsUrl'] . $item->url_img;?> 640w, <?php echo Yii::app()->params['storage']['NewsUrl'] . $item->url_img;?> 215w, <?php echo Yii::app()->params['storage']['NewsUrl'] . $item->url_img;?> 414w"
                         sizes="(max-width: 300px) 100vw, 300px" data-wp-pid="1259"/> </a>
            </div>

            <div class="entry-header">
                                    <span class="meta-category meta-small"><a href="#" class="herald-cat-2">Netizen</a></span>

                <h2 class="entry-title h5"><a href="<?php echo Yii::app()->createUrl('news/index', array('id'=>$item->id, 'url_key'=>Common::makeFriendlyUrl($item->title)));?>"><?php echo Formatter::smartCut($item->title, 90, 0); ?></a></h2>
                <div class="entry-meta meta-small">
                    <div class="meta-item herald-views">3,703 Views</div>
                    <div class="meta-item herald-rtime">2 Min Read</div>

                </div>
            </div>
        </article>
        <?php endforeach;?>
    </div>

</div>

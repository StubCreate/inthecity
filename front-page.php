<?php
/**
 * The template for displaying front-page
 */
get_header(); ?>

<div class="row">
	<div class="large-4 small-12 colums left">
		<h3 class="tit_news">News</h3>
		<dl>
		<?php
		   $newslist = get_posts( array(
		    'category_name' => 'news', //特定のカテゴリースラッグを指定
		    'posts_per_page' => 3 //取得記事件数
		  ));
		    foreach( $newslist as $post ):
		    setup_postdata( $post );
		?>
		<dt> <?php the_time('Y年n月j日'); ?></dt>
		<dd> <a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a>
		<?php the_excerpt(); ?>
		</dd>
		<?php
		  endforeach;
		  wp_reset_postdata();
		?>
		</dl>
	</div><!-- News -->

	<div class="large-7 small-12 colums right">
	<div class="front-news">
		<div class="row">
			<div class="large-12 columns">
				<h3>New&nbsp;Arrival</h3>
				<div class="row">
					<?php query_posts( 'posts_per_page=4' ); ?>
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div class="large-6 small-12 columns">
						<a href="<?php the_permalink(); ?>">
							<div class="newspost">
								<div class="row">
									<div class="large-12 small-3 columns">
										<div class="thumbnail">
										<?php if ( has_post_thumbnail() ) : ?>
											<?php the_post_thumbnail( 'top-thumb', array( 'class' => 'thumbnail' ) ); ?>
										<?php else : ?>
											<img src="<?php echo get_template_directory_uri(); ?>/assets/img/no_image.gif" alt="" title="" />
										<?php endif; ?>
										</div>
									</div>

									<div class="large-12 small-9 columns">
										<div class="news-meta">
											<div class="date">
												<div class="genericon genericon-time"></div>
												<?php the_time( 'Y/m/d' ); ?>
											</div>
											<p>
												<?php echo mb_substr( get_the_title(), 0, 40 ); ?>
											</p>
										</div>
									</div>
								</div>
							</div>
						</a>
					</div>
				<?php endwhile; endif; ?>
				<?php wp_reset_query(); ?>
				</div>
			</div>
		</div> <!-- /row -->
	</div> <!-- /front-news -->
</div>
<div class="clear"></div>
</div><!-- /-NewArrivel&news -->

	<div class="front-sp">
		<center><h3 class="tit_top">Concept</h3></center>
		<div class="row">
			<div class="large-6 columns">
				<div class="circle">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/img/4.jpg" alt="" />
				</div>
			</div> <!--  -->

			<div class="large-6 columns">
				<h2>みんなの来店を<br />待ってるワンッ！</h2>
				<p>たまに出勤する、店長のマルくんです。</p>
			</div>
		</div>
	</div>
	<div class="row front-feature">
		<center><h3 class="tit_top">More</h3></center>
	<?php if ( get_page_by_path( 'concept' ) ) : ?>
		<div class="large-4 columns">
			<a href="<?php echo get_permalink( get_page_by_path( 'concept' )->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/1.jpg" alt=""></a>
			<h5><a href="<?php echo get_permalink( get_page_by_path( 'concept' )->ID ); ?>">Your&nbsp;Onlyone&nbsp;Shop</a></h5>
			<p>ライフスタイルに合わせたスタイルの提案</p>
		</div>
	<?php endif; ?>
	<?php if ( get_page_by_path( 'catalog' ) ) : ?>
		<div class="large-4 columns">
			<a href="<?php echo get_permalink( get_page_by_path( 'catalog' )->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/2.jpg" alt=""></a>
			<h5><a href="<?php echo get_permalink( get_page_by_path( 'catalog' )->ID ); ?>">Women&nbsp;Item</a></h5>
			<p>洗練されたブランドから、素敵なものだけをチョイス</p>
		</div>
	<?php endif; ?>
	<?php if ( get_page_by_path( 'access' ) ) : ?>
		<div class="large-4 columns">
			<a href="<?php echo get_permalink( get_page_by_path( 'access' )->ID ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/3.jpg" alt=""></a>
			<h5><a href="<?php echo get_permalink( get_page_by_path( 'access' )->ID ); ?>">Citycenter&nbsp;HONDORI</a></h5>
			<p>本通り駅、立町駅から徒歩5分。Accessはこちらを御覧ください。</p>
		</div>
	<?php endif; ?>
	</div>
	<div id="main" class="site-main row">
<?php get_footer(); ?>

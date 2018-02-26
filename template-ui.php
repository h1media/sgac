<?php
/**
 * Template Name: UI
 *
 * @package one55
 */
$uri = get_template_directory_uri();
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

<style>
	.ui-row { min-height: 227px; padding: 50px 20px; }
	.ui-row > * { width: 100%; display: block; }
	.rectangle {width: 100%; background-color: #504E4E;}
	.ui-heading { height: 43px;	color: #58595B;	font-family: Georgia; font-size: 38px; line-height: 43px; margin: 30px 0; }
	.ui-row span.ui-title {margin-bottom: 32px; display: block; height: 27px; font-family: Georgia; font-size: 24px; font-weight: bold; line-height: 27px; }
	.ui-row span.ui-spec { margin-top: 32px; display: block; height: 20px; font-family: Georgia; font-size: 17px; line-height: 20px; }
	.rectangle span.ui-title, .rectangle span.ui-spec { color: #fff; }
</style>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ui-heading">Primary Type Styles</div>
					<div class="ui-row rectangle">
						<div class="inner">
							<span class="ui-title">H1.home</span>
							<h1 class="home">One55 isn’t just a Fitness Club,<br> It’s a <span>community!</span></h1>
							<span class="ui-spec">Poppins SemiBold / 51 px / 57 px Leading / #FFFFFF + span #F7931D </span>
						</div>
					</div>
					<div class="ui-row">
						<span class="ui-title">H1</span>
						<h1>Is it time for a Personal Trainer?</h1>
						<span class="ui-spec">Poppins Medium / 34 px / 41 px Leading / #F7931D </span>
					</div>
					<div class="ui-row rectangle">
						<span class="ui-title">H2.home.light</span>
						<h2 class="home-light">HEY YOU!</h2>
						<span class="ui-spec">Poppins Bold / 44 px / 72 px Leading / #FFFFFF</span>
					</div>
					<div class="ui-row">
						<span class="ui-title">H2.home.dark</span>
						<h2 class="home-dark">CLASSES TODAY.</h2>
						<span class="ui-spec">Poppins Bold / 44 px / 72 px Leading / #221F20</span>
					</div>
					<div class="ui-row">
						<span class="ui-title">H2</span>
						<h2>Sports-inspired high-cardio training</h2>
						<span class="ui-spec">Poppins Medium / 26 px / 33 px Leading / #F7931D</span>
					</div>
					<div class="ui-row">
						<span class="ui-title">H3.home</span>
						<h3 class="home">We are Western Sydney’s <br>hottest Fitness Club.</h3>
						<span class="ui-spec">Poppins Medium / 34 px / 41 px Leading / #F7931D</span>
					</div>
					<div class="ui-row">
						<span class="ui-title">H3.home.dark</span>
						<h3 class="home-dark">ONE55 on Instagram</h3>
						<span class="ui-spec">Poppins Medium / 34 px / 41 px Leading / #221F20</span>
					</div>
					<div class="ui-row">
						<span class="ui-title">H3</span>
						<h3>One55 personal training is designed to help members achieve their goals easier thanks to the motivation and expertise our fully qualified Personal Trainers provide.</h3>
						<span class="ui-spec">Roboto Light / 24 px / 32 px Leading / #221F20 </span>
					</div>
					<div class="ui-row rectangle">
						<span class="ui-title">H4.home</span>
						<h4 class="home">Are you ready to get out of the house, get in shape and go beyond your old limits?</h4>
						<span class="ui-spec">Roboto Light / 24 px / 32 px Leading / #FFFFFF</span>
					</div>
					<div class="ui-row">
						<span class="ui-title">p.dark</span>
						<p>One55 Fitness offers the largest fitness facilities in Western Sydney including state-of-the-art weights & equipment, a dedicated 25 metre pool, steam room, private fitness studios and crèche. </p>
						<span class="ui-spec">Roboto Light / 16 px / 27 px Leading / #58595B </span>
					</div>
					<div class="ui-row">
						<span class="ui-title">p.dark.link</span>
						<p>One55 Fitness offers the largest fitness facilities in Western Sydney including <a href="#">state-of-the-art weights & equipment</a>, a dedicated 25 metre pool, steam room, private fitness studios and crèche. </p>
						<span class="ui-spec">Roboto Light / 16 px / 27 px Leading / #58595B </span>
					</div>
					<div class="ui-row rectangle">
						<span class="ui-title">p.light</span>
						<p class="light">Starting with the largest fitness facilities in Western Sydney, kitted out with modern, state of the art equipment, private fitness studios, saunas, a cafe and a crèche.</p>
						<span class="ui-spec">Roboto Light / 16 px / 27 px Leading / #58595B</span>
					</div>
					<div class="ui-row rectangle">
						<span class="ui-title">p.light.link</span>
						<p class="light">Starting with the largest fitness facilities in Western Sydney, kitted out with modern, state of the art equipment, private fitness studios, saunas, a cafe and a crèche. (BTW, have you seen how many <a href="#">Group Fitness classes</a> we run?)</p>
						<span class="ui-spec">Roboto Light / 16 px / 27 px Leading / #58595B </span>
					</div>
					<div class="ui-heading">Hover Effects</div>
					<div class="rectangle">
						<div class="row">
							<div class="col-md-5">
								<div class="ui-row">
									<span class="ui-title">social icons</span>
									<ul class="social-icons">
										<li class="icon__item">
											<a href="#">
												<span class="icon-ico-facebook"></span>
											</a>
										</li>
										<li class="icon__item">
											<a href="#">
												<span class="icon-ico-instagram"></span>
											</a>
										</li>
										<li class="icon__item">
											<a href="#">
												<span class="icon-ico-twitter"></span>
											</a>
										</li>
										<li class="icon__item">
											<a href="#">
												<span class="icon-ico-envelope"></span>
											</a>
										</li>
									</ul>
								</div>
								<div class="ui-row">
									<span class="ui-title">Buttons</span>
									<div class="wrap">
										<a href="#" class="button button--big">
											Join now
										</a><br><br>
										<a href="#" class="button">
											Facilities
										</a><br><br>
										<a href="#" class="button button--small">
											Full timetable
										</a>
									</div>
								</div>
								<div class="ui-row">
									<span class="ui-title">Offer Box</span>
									<div class="wrap">
										<div class="row">
											<div class="col-sm-7">
												<div class="offer-box">
													<div class="offer-box__title">
														3 PERSONAL TRAINING
														SESSION <span>ONLY $99!</span>
													</div>
													<a href="#" class="offer-box__link"></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="ui-row">
									<span class="ui-title">Class thumb</span>
									<div class="wrap">
										<div class="row">
											<div class="col-sm-8">
												<div class="class-thumbnail" style="background-image:url( <?php echo esc_url( $uri . '/dist/img/ui/class-thumb.jpg' ); ?> ); ?>">
													<div class="class-thumbnail__overlay"></div>
													<div class="class-thumbnail__hover"></div>
													<h3 class="class-thumbnail__title">
														Warrior and Spartan
													</h3>
													<div class="class-thumbnail__colour"></div>
													<a href="#" class="class-thumbnail__link"></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="ui-row">
									<span class="ui-title">People Module</span>
									<div class="row">
										<div class="col-sm-7">
											<div class="person-thumbnail">
												<img src="<?php echo esc_url( $uri . '/dist/img/ui/img-profile-sml.jpg' ); ?>" alt="profile-pic" >
												<div class="person-thumbnail__hover">
													<h3 class="person-thumbnail__title">
														Chantell
													</h3>
												</div>
												<div class="person-thumbnail__icon">
													<span class="icon__line line--h"></span>
													<span class="icon__line line--v"></span>
												</div>
												<a href="#" class="person-thumbnail__link"></a>
											</div>
										</div>
									</div>
								</div>
								<div class="ui-row">
									<span class="ui-title">Blog Category</span>
									<div class="wrap">
										<div class="row">
											<div class="col-sm-6">
												<div class="blog-sidebar__block">
													<h4 class="sidebar-block__title">Categories</h4>
													<ul class="sidebar-block__list">
														<li class="block-list__item">
															<a href="#">Fitness Training</a>
														</li>
														<li class="block-list__item">
															<a href="#">Healthy Living</a>
														</li>
														<li class="block-list__item">
															<a href="#">Clean Living</a>
														</li>
														<li class="block-list__item">
															<a href="#">People</a>
														</li>
														<li class="block-list__item">
															<a href="#">Events</a>
														</li>
														<li class="block-list__item">
															<a href="#">News</a>
														</li>
													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="ui-row">
									<span class="ui-title">Gallery + Modal Nav</span>
									<div class="col-md-6">
										<div class="col-md-1">
											<a href="#" class="gallery-btn gallery-btn__prev">
												<span class="icon-ico-left-chevron-sml"></span>
											</a>
										</div>
										<div class="col-md-1">
											<a href="#" class="gallery-btn gallery-btn__next">
												<span class="icon-ico-right-chevron-sml"></span>
											</a>
										</div>
									</div>
									<div class="col-md-6"></div>
									<br>
									<br>
									<div class="col-md-6">
										<div class="col-md-2">
											<a href="#" class="gallery-alt-btn gallery-btn__prev">
												<span class="icon-left-open"></span>
											</a>
										</div>
										<div class="col-md-2">
											<a href="#" class="gallery-alt-btn gallery-btn__next">
												<span class="icon-right-open"></span>
											</a>
										</div>
									
										
									</div>
									<div class="col-md-6"></div>
								</div>
							</div>
							<div class="col-md-7">
								<div class="ui-row">
									<span class="ui-title">tabs</span>
									<div class="wrap">
										<div class="tabs-primary">
											<ul class="tabs__list">
												<li class="tab__item">Studio 1</li>
												<li class="tab__item">Studio 2</li>
												<li class="tab__item active">Studio 3</li>
											</ul>
										</div>
										<div style="clear:both"></div><br>
										<div class="tabs-secondary">
											<ul class="tabs__list">
												<li class="tab__item">Personal Trainers</li>
												<li class="tab__item active">Group Class Instructors</li>
											</ul>
										</div>
										<div style="clear:both"></div>
									</div>
								</div>
								<div class="ui-row">
									<span class="ui-title">footer links</span>
									<div class="row">
										<div class="col-sm-6">
											<div class="footer-links">
												<h3 class="footer__heading">Quick Links</h3>
												<ul class="footer-links__list">
													<li><a href="#">Home</a></li>
													<li><a href="#">Our People</a></li>
													<li><a href="#">Classes</a></li>
													<li><a href="#">Facilities</a></li>
													<li><a href="#">Timetables</a></li>
													<li><a href="#">Blog/Events</a></li>
													<li><a href="#">Membership</a></li>
													<li><a href="#">Contact</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<div class="ui-row">
									<span class="ui-title">blog navigation</span>
									<div class="wrap">
										<div class="single-post__nav">
											<div class="post-nav__prev">
												<a href="#" class="post-nav__title">
													<span class="icon-ico-left-arrow"></span>
													previous
												</a>
												<a href="#" class="post-nav__post-title">
													Taking Extra Time – Why It's Ok to Go at Your Own Pace
												</a>
											</div>
											<div class="post-nav__next">
												<a href="#" class="post-nav__title">
													next
													<span class="icon-ico-right-arrow"></span>

												</a>
												<a href="#" class="post-nav__post-title">
													The signs of depression or anxiety
												</a>
											</div>
										</div>
									</div>
								</div>
								<div class="ui-row">
									<span class="ui-title">pagination</span>
									<div class="wrap">
										<ul class="page-numbers__list">
											<li>
												<a class="prev page-numbers" href="#">
													<span class="icon-ico-left-chevron-sml"></span>
												</a>
											</li>
											<li><span class="page-numbers current">1</span></li>
											<li><a class="page-numbers" href="#">2</a></li>
											<li><a class="page-numbers" href="#">3</a></li>
											<li><a class="page-numbers" href="#">4</a></li>
											<li><a class="page-numbers" href="#">5</a></li>
											<li><a class="page-numbers" href="#">...</a></li>
											<li>
												<a class="next page-numbers" href="#">
													<span class="icon-ico-right-chevron-sml"></span>
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="ui-heading">Menu</div>
					<div class="ui-row rectangle">
						<div class="wrap">
							<button class="button menu-button">
								<span class="menu-button__icon">
									<span></span>
									<span></span>
									<span></span>
									<span></span>
								</span>
								menu
							</button>
						</div>
					</div>
					<div class="ui-row">
						<span class="ui-title">menu side</span>
						<div class="wrap">
							<div class="menu-side__inner">
								<button class="button menu-button open">
									<span class="menu-button__icon">
										<span></span>
										<span></span>
										<span></span>
										<span></span>
									</span>
									menu
								</button>
								<ul class="menu-side__list">
									<li><a href="#">Home</a></li>
									<li><a href="#">Membership</a></li>
									<li class="menu-item-has-children"><a href="#">Classes</a>
										<ul class="sub-menu">
											<li><a href="#">Warrior and Spartan</a></li>
											<li><a href="#">Yoga</a></li>
											<li><a href="#">The HIIT</a></li>
											<li><a href="#">Les Mills BodyPump</a></li>
											<li><a href="#">Les Mills BodyCombat</a></li>
											<li><a href="#">Les Mills BodyAttack</a></li>
											<li><a href="#">Les Mills GRIT Strength</a></li>
											<li><a href="#">Les Mills SPRINT</a></li>
											<li><a href="#">Les Mills RPM</a></li>
											<li><a href="#">Les Mills BodyBalance</a></li>
											<li><a href="#">Les Mills CXWORX</a></li>
											<li><a href="#">Awesome Abs</a></li>
											<li><a href="#">Zumba</a></li>
											<li><a href="#">Boxing</a></li>
										</ul>
									</li>
									<li><a href="#">Timetables</a></li>
									<li><a href="#">Personal Training</a></li>
									<li><a href="#">Our People</a></li>
									<li><a href="#">Facilities</a></li>
									<li><a href="#">Blog/Events</a></li>
									<li><a href="#">Contact</a></li>
								</ul>
								<div class="menu-side__button">
									<a href="#" class="button">Join now</a>
								</div>
							</div>
						</div>
					</div>
					<div class="ui-heading">Utility bars</div>
				</div>
			</div>
		</div>
		<div class="utilities-section">
			<div class="container">
				<div class="utilities">
					<div class="blog-categories">
						<ul class="blog-categories__list">
							<li class="category__item">
								<a href="#">Fitness Training</a>
							</li>
							<li class="category__item">
								<a href="#">Healthy Living</a>
							</li>
							<li class="category__item">
								<a href="#">Clean Eating</a>
							</li>
							<li class="category__item">
								<a href="#">People</a>
							</li>
							<li class="category__item">
								<a href="#">Events</a>
							</li>
							<li class="category__item">
								<a href="#">News</a>
							</li>
						</ul>
					</div>
					<div class="blog-search">
						<form action="" class="blog-search__form">
							<div class="search__field">
								<input type="text" name="s" placeholder="Looking for something?" class="input-search" />
								<button class="blog-search__button">
									<span class="icon-ico-search"></span>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<br><br>
		<div class="utilities-section">
			<div class="container container--narrow">
				<div class="utilities">
					<div class="studio-select">
						<label class="studio-select__label">Select studio</label>
						<select class="studio-select__select" data-dropdown-css-class="studio-select__dropdown">
							<option>Studio 1</option>
							<option>Studio 2</option>
							<option>Studio 3</option>

						</select>
					</div>
					<div class="studio-timetable">
						<a href="#" class="studio-timetable__download">
							<span class="icon-ico-download"></span>Download Timetable
						</a>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ui-heading">Promo & Precinct Bar</div>
				</div>
			</div>
		</div>
		
		<?php get_template_part( 'modules/precinct', 'bar' ); ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ui-heading">Form elements</div>
					<div class="ui-row" style="min-height: 0;">
						<span class="ui-title" style="margin-bottom:0">Form elements + validation</span>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-wrap">
								<form action="#">
									<div class="form__row">
										<div class="field field--text field--wide">
											<label class="required">First Name</label>
											<span class="form__notice">Applicants under the age of 18 will require Parent/Guardian Consent.</span>
											<input type="text" name="" placeholder="First Name">
										</div>
									</div>
									<div class="form__row">
										<div class="field field--text">
											<label class="required">First Name</label>
											<input type="text" name="" placeholder="First Name">
										</div>
										<div class="field field--text error">
											<label class="required">Last Name</label>
											<input type="text" name="" placeholder="Last Name">
											<span class="error-msg">Last Name is required</span>
										</div>
									</div>
									<div class="form__row">
										<div class="field field--select">
											<label class="required">I'm interested in</label>
											<select>
												<option>Please select...</option>
												<option>Option 2 </option>
											</select>
										</div>
									</div>
									<div class="form__row">
										<div class="field field--date">
											<label class="required">select date</label>
											<input type="date" name="date">
										</div>
									</div>
									<div class="form__row">
										<div class="field field--textarea">
											<label class="required">Message</label>
											<textarea placeholder="Your message"></textarea>
										</div>
									</div>
									<div class="form__row">
										<div class="field field--radio">
											<input type="radio" id="v" name="v">
											<input type="radio" id="v" name="v">
											<input type="checkbox" id="c" name="c1">
											<input type="checkbox" id="c" name="c2">
										</div>
									</div>
									<div class="form__row">
										<div class="field field--file">
											<label class="required">Attach file</label>
											<input type="file" name="pic" accept="image/*">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="ui-row" style="min-height: 0;">
						<span class="ui-title" style="margin-bottom:0">form success message</span>
					</div>
					<div class="row">
						<div class="col-md-7">
							<div class="form-wrap">
								<div class="form__message">
									<h5>Thanks!</h5>
									<p>Your message has been successfully sent to our team. We’ll be in touch with you as soon as possible.</p>
								</div>
							</div>
						</div>
					</div>
					<br> <br>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="ui-heading">Todays Class Widget</div>
				</div>
			</div>
		</div>
		<?php get_template_part( 'modules/today', 'classes' ); ?>
		<br><br><br>
	</main>
</div>

</div>
<?php wp_footer(); ?>

</body>
</html>


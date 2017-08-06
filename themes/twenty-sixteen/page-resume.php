<?php
/**
 * Template for displaying the resume page.
 *
 * @package Vincent Ragosta - Twenty Sixteen
 * @since 0.1.0
 */

namespace VincentRagosta;

get_header(); ?>

<main id="resume">

	<div class="container">

		<div class="row">
			<section class="col-xs-12 col-sm-4">
				<h2>Technologies</h2>
			</section>
			<section class="col-xs-12 col-sm-8">
				<div class="row">
					<div class="day-to-day col-xs-12 col-sm-6">
						<h3>Day-to-day Comfort</h3>
						<ul>
							<li>HTML5 / CSS 3</li>
							<li>Javascript / jQuery</li>
							<li>Wordpress / PHP</li>
							<li>Photoshop / GIMP</li>
							<li>Version Control ( GIT )</li>
							<li>Foundation / Bootstrap</li>
							<li>Responsive Layout Design</li>
							<li>Agile Methodology</li>
							<li>Cross Browser Compatibility</li>
							<li>Mobile First Thinking</li>
							<li>Linux / MySQL</li>
							<li>Amazon Web Services</li>
							<li>REST API</li>
							<li>Grunt / Gulp</li>
						</ul>
					</div>
					<div class="experience-with col-xs-12 col-sm-6">
						<h3>Experience With</h3>
						<ul>
							<li>Sass / LESS</li>
							<li>Nginx / Apache</li>
							<li>Salesforce / SOAP API</li>
							<li>Composer / NPM</li>
							<li>Node.js ( limited )</li>
							<li>RequireJS ( limited )</li>
							<li>React.js ( limited )</li>
							<li>Backbone.js ( limited )</li>
							<li>AngularJS ( limited )</li>
						</ul>
					</div>
				</div>
			</section>
		</div>

		<hr />

		<div class="row">
			<section class="col-xs-12 col-sm-4">
				<h2>Work Experience</h2>
			</section>
			<section class="col-xs-12 col-sm-8">
				<div class="work-item row">
					<h4>Owner, WordPress Developer</h4>
					<p><a href="<?php echo home_url(); ?>">Vincentragosta.com</a><span>, Brooklyn, NY, November 2016 – Present</span></p>
					<p>Just like a Wordpress Specialist I'm an expert with all things Wordpress. The goal in mind is to provide small businesses as well as recently established startups with well-thought websites that conveys their unique brand or product. I'm able to deliver a top-notch user experience that doesn't lack in the care that I provide to my customers. All projects are built in the Wordpress platform that fully utilizes their JSON API, and are extensively modified. Primary code utilization includes HTML5, CSS3, Less, Javascript and Git.</p>
				</div>

				<div class="work-item row">
					<h4>Web Developer, Digital & Technical Innovation</h4>
					<p><a href="https://www.storycorps.org" target="_blank">StoryCorps.org</a><span>, Brooklyn, NY, June 2015 – Present</span></p>
					<p>StoryCorps mission is to preserve and share humanity’s stories in order to build connections between people and create a more just and compassionate world. At StoryCorps, I work on a small team of developers in an agile environment to build and maintain more than 5 websites and an app. Extensive work with WordPress, PHP, HTML, CSS, and various Javascript libraries.</p>
				</div>
			</section>
		</div>

		<hr />

		<div class="row">
			<section class="col-xs-12 col-sm-4">
				<h2>Education</h2>
			</section>
			<section class="col-xs-12 col-sm-8">
				<div class="education-item row">
					<h4>Batchelors of Science: Computer Science</h4>
					<p>Brooklyn College, Brooklyn, NY, September 2010 - May 2015</p>
				</div>

				<div class="education-item row">
					<h4>Associates of Science: Computer Science</h4>
					<p>Kingsborough Community College, Brooklyn, NY, September 2009 - May 2010</p>
				</div>

				<div class="education-item row">
					<h4>Batchelor of Science: Computer Science</h4>
					<p>St. Johns University, Brooklyn, NY, September 2008 - May 2009</p>
				</div>
			</section>
		</div>

	</div>

</main>

<?php get_footer(); ?>

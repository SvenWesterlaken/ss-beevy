<div class="header-banner  big-header yellow ">
		<div class="header-mask">
				<div class="show-large start-video">
						<a href="$VideoLink">$ImageDesktop</a>
				</div>
				<div class="hide-large start-video">
						<a href="$VideoLink">$ImageMobile</a>
				</div>
		</div>
		<div class="container header-content">
			<div class="banner-top">
				<h1 class="p1">$TitleFormatted</h1>
				<h2>$SubTitle</h2>
			</div>
			<div class="header-action">
				<div class="button dark">
					<a href="$ButtonLink.Link">$ButtonText</a>
				</div>
					<a class="link dark" href="$VideoLink">Bekijk de video</a>
				</div>
		</div>
</div>

<main>
	<section id="cards" class="big-padding text-center">
	<div class="container">
		<div class="section-title">
			<h2>$CardsHeadingFormatted</h2>
		</div>
		<div id="cards-holder" class="clear">
				<% loop $ChallengeCards %>
				<div class="card">
					<a href="$Link.Link">
						<div class="card-wrapper">
								<div class="card-image">
									<img alt="$Icon.FileName" src="$Icon.AbsoluteUrl">
								</div>
							<div class="card-content">
								<h4>$Heading</h4>
								<p>$Information</p>
							</div>
						</div>
						<div class="card-number">
							<h1>$Pos</h1>
						</div>
					</a>
				</div>
				<% end_loop %>
		</div>
		<div class="button yellow">
			<a href="$CardsButtonLink.Link">$CardsButtonText</a>
		</div>
		<a class="link dark" href="$CardsSubLink.Link">$CardsSubLinkText</a>
	</div>
</section>

<section id="challenges" class="gray big-padding">
	<div class="container">
		<div class="section-title text-center">
			<h2>$ChallengesHeading</h2>
			<h3>$ChallengesSubHeading</h3>
		</div>
		<div id="challenge-holder" class="clear">
				<div class="challenge-wrapper">
						<% loop $Challenges %>
						<div class="challenge">
							<a href="$Link">
									<div class="challenge-image" style="background-image:url($HeaderImage.AbsoluteLink); background-position: 50% 50%;"></div>
								<div class="challenge-content">
									<h4>$Type</h4>
									<span>$EducationLevel</span>
									<span> - $Place</span>
								</div>
							</a>
						</div>
					<% end_loop %>
				</div>
		</div>
	</div>
</section>


	<section id="benefit">
		<div class="benefit-image" style="background-image:url($BenefitsBackgroundImage.AbsoluteUrl); background-position: 50% 50%;"></div>
		<div class="benefit-overlay"></div>
		<div class="container">
			<div class="benefit-content side-padding">
				<div class="section-title">
					<h2>$BenefitsHeading</h2>
				</div>
				<div id="benefit-holder">
					<% loop $Benefits %>
						<% if $First %>
						<div class="benefit active-toggle">
						<% else %>
						<div class="benefit">
						<% end_if %>
							<h3>$Title</h3>
							<div class="content">
								<p><span>$Content</span></p>
							</div>
						</div>
					<% end_loop %>
				</div>
			</div>
		</div>
	</section>



	<section id="content" class="big-padding">
		<div class="container">
			<div class="section-title side-padding">
				<h2>$InformationHeading</h2>
				<h3></h3>
			</div>
			<div class="content side-padding">
				$Content
			</div>

				<div class="divider text-center">
					<div class="button yellow">
						<a href="$InformationButtonLink.Link">$InformationButtonText</a>
					</div>
				</div>

		</div>
	</section>

</main>

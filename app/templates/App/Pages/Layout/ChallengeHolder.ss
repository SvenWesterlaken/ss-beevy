<div class="header-banner  small-header  no-image"></div>
<main>
	<section id="challenges" class="big-padding">
	<div class="container">
		<div class="section-title text-center">
			<h2>$Title</h2>
		</div>

		<div id="challenge-holder" class="clear">

	    <% loop $Children %>
			<div class="challenge">
				<a href="$Link">
					<div class="challenge-image" style="background-image:url($HeaderImage.AbsoluteUrl); background-position: 50% 50%;"></div>
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
</section>


	<section id="challenge-divider" class="gray text-center">
		<div class="container">
			<h2>$BottomText</h2>
			<div class="button yellow">
				<a href="$BottomButtonLink.Link">$BottomButtonText</a>
			</div>
		</div>
	</section>


</main>

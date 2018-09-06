<div class="header-banner  small-header ">
  <div class="header-image" style="background-image:url($HeaderImage.AbsoluteUrl); background-position: 50% 50%;">
  			<div class="header-image-mask"></div>
  			<div class="container header-content">
  				<h2>$Title</h2>
  				<h3>$SubTitle</h3>
  						<div class="button yellow">
  							<a href="$HeaderButtonLink.Link">$HeaderButtonText</a>
  						</div>
  			</div>
  </div>
</div>
<main>
	<section class="info-bar gray clear">
		<div class="container">
			<div id="info-items" class="challenges-bar clear">
					<div class="info-item">
						<h5>Type</h5>
						<h5><span>$Type</span></h5>
					</div>
					<div class="info-item">
						<h5>Soort opleiding</h5>
						<h5><span>$EducationType</span></h5>
					</div>
					<div class="info-item">
						<h5>Niveau</h5>
						<h5><span>$EducationLevel</span></h5>
					</div>
			</div>
		</div>
	</section>
  <section class="challenge-content">
	<div id="challenge-navigator">
		<div class="selection-wrapper">
			<span id="toggle-list">Direct naar sectie... <span class="arrow-down"></span></span>
			<div class="list-box">
        <% loop $Sections %>
					<span id="$Pos">$Pos. $Title</span>
        <% end_loop %>
			</div>
		</div>
	</div>
</section>

<section class="big-padding">
	<div class="container">
		<div id="challenge-content">
      <% loop $Sections %>
				<div id="$Pos" class="content-item">
					<div class="title"><h4>$Pos. $Title</h4></div>
					<div class="content">$Content</div>
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

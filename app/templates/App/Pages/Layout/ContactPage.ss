<div class="header-banner  small-header ">
  <div class="header-image" style="background-image:url($HeaderImage.AbsoluteUrl); background-position: 50% 50%;">
		<div class="header-image-mask"></div>
			<div class="container header-content">
				<h2 class="p1">Interesse of vragen?&nbsp;</h2>
				<h3>Laat dan hier je gegevens achter en wij nemen contact met je op!</h3>
			</div>
	</div>
</div>

<main>
  <% if $Title == 'Contact' %>

	<section class="info-bar gray clear">
  	<div class="container">
  		<div id="info-items" class="clear">
  			<div class="info-item">
  				<h5>E-mail</h5>
  				<h5><span>info@beevy.nl</span></h5>
  			</div>
  			<div class="info-item">
  				<h5>Telefoonnummer</h5>
  				<h5><span>+31 30 888 71 25</span></h5>
  			</div>
  			<div class="info-item">
  				<h5>Adres</h5>
  				<h5><span>Euclideslaan 60</span></h5>
  			</div>
  			<div class="info-item">
  				<h5>Postcode</h5>
  				<h5><span>3584 BN Utrecht</span></h5>
  			</div>
  		</div>
  	</div>
  </section>
  <% end_if %>


  <section id="contact" class="big-padding">
  	<div class="container">
  		<div id="form">
        $GetContactForm.Form
  		</div>
  	</div>
  </section>
</main>

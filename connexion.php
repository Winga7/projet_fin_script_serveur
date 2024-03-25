<?php
$metaDesc = "Connexion";
require_once __DIR__ . DIRECTORY_SEPARATOR . "header.php";
?>
<main id="connexion">
	<div id="stars"></div>
	<div id="stars2"></div>
	<div id="stars3"></div>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3">
							<span>Connexion</span><span>Enregistre toi</span>
						</h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log" />
						<label for="reg-log"></label>
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Connexion</h4>
											<div class="form-group">
												<input type="email" class="form-style" placeholder="Email" />
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" class="form-style" placeholder="Password" />
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<a href="" class="btn mt-4">Connexion</a>
											<p class="mb-0 mt-4 text-center"><a href="" class="link">Mot de passe oublié?</a></p>
										</div>
									</div>
								</div>
								<div class="card-back">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-3 pb-3">Enregistrement</h4>
											<div class="form-group">
												<input type="text" class="form-style" placeholder="Pseudo" />
												<i class="input-icon uil uil-user"></i>
											</div>
											<div class="form-group mt-2">
												<input type="email" class="form-style" placeholder="Email" />
												<i class="input-icon uil uil-at"></i>
											</div>
											<div class="form-group mt-2">
												<input type="password" class="form-style" placeholder="Mot de passe" />
												<i class="input-icon uil uil-lock-alt"></i>
											</div>
											<a href="" class="btn mt-4">Enregistrement</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- <form action="connexion.php" method="post">

            <fieldset>
                <legend>Connexion</legend>
                <div class"coordonnees">
                    <div class="champs">
                        <label for="pseudo">Pseudo :</label>
                        <input type="text" id="pseudo" />
                    </div>
                    <div class="champs">
                        <label for="mail">E-Mail :</label>
                        <input type="email" name="mail" >
                    </div>
                    <div class="champs">
                        <label for="password">Mot de passe :</label>
                        <input type="password" name="password" >
            </fieldset>
        </form> -->
</main>

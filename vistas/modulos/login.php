<body class="login-page" style="background-image:url('vistas/img/login.jpg');background-repeat:no-repeat; background-attachment: fixed; background-size:cover;">
	<div class="login-wrap">
		<div class="container"style="float: left;">
			<div class="row" >
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<h1 class="text-center text-primary">DakApp - Sistema de Gestion</h1>
							<h2 class="text-center text-warning">Ingresar</h2>
						</div>
						<form method="post">
							<div class="input-group custom">
								<input type="text" class="form-control form-control-lg" name="ingUsuario" placeholder="Usuario del dominio"/>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" class="form-control form-control-lg" name="ingPassword" placeholder="**********"/>
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-6">
									<div class="custom-control custom-checkbox">
										<input
											type="checkbox"
											class="custom-control-input"
											id="customCheck1"
										/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-primary btn-block">Ingresar</button>
									</div>
								</div>
							</div>
						</form>
						<?php
              $login = new ControladorUsuarios();
              $login -> ctrIngresoUsuario();        
            ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
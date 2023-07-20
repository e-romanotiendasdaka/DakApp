<?php
class ControladorUsuarios{
	static public function ctrIngresoUsuario(){		
		if(isset($_POST["ingUsuario"])){
			$ldaphost = "192.168.21.15";
			$ldapport = 389;
			$ldapdom = '@daka.local';
		  $ldaprdn  = $_POST["ingUsuario"];
			$ldappass = $_POST["ingPassword"];
			$ldaptree    = "dc=daka,dc=local";
			$filter = "(&(objectCategory=person)(sAMAccountName=$ldaprdn))";
			$attributes = array("displayname","mail","telephonenumber");
			$ldapconn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to $ldaphost");
	  	ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
			ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
			if ($ldapconn) {
			    $ldapbind = ldap_bind($ldapconn, $ldaprdn.$ldapdom, $ldappass);
				if ($ldapbind == "true"){
					$result = ldap_search($ldapconn, $ldaptree, $filter, $attributes);
					$entries = ldap_get_entries($ldapconn, $result);
					if($entries["count"] > 0){
						$entry_id = ldap_first_entry($ldapconn, $result);
						$user_dn = ldap_get_dn($ldapconn, $entry_id);
						$_SESSION["iniciarSesion"] = "ok";
						$_SESSION["usuario"] = $ldaprdn;
						$_SESSION["password"] = $ldappass;
						$_SESSION["empleado"] = $entries[0]['displayname'][0];
						$_SESSION["perfil"] = $entries[0]['mail'][0];
						$_SESSION["sucursal"] = $entries[0]['telephonenumber'][0];
						if($_SESSION["perfil"] == "Logistica" || $_SESSION["perfil"] == "Auditor" || $_SESSION["perfil"] == "Administrador"){
							ldap_close($ldapconn);
							echo '<script>window.location = "serial-data";</script>';
						}
						if($_SESSION["perfil"] == "Auditor" || $_SESSION["perfil"] == "Administrador"){
							ldap_close($ldapconn);
							echo '<script>window.location = "data";</script>';
						}
					}
				}else{
					echo '<br><div class="alert alert-danger">Error al ingresar, Usuario o Clave no coinciden</div>';
				}
			}
		}
	}	
}
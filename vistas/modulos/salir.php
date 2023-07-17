<?php
	$ldaphost = "192.168.21.15";
	$ldapport = 389;
	$ldapdom = '@daka.local';
  $ldaprdn  = $_SESSION["usuario"];
	$ldappass = $_SESSION["password"];
	$ldaptree    = "dc=daka,dc=local";
	$filter = "(&(objectCategory=person)(sAMAccountName=$ldaprdn))";
	$attributes = array("displayname","mail","telephoneNumber");
	$ldapconn = ldap_connect($ldaphost, $ldapport) or die("Could not connect to $ldaphost");
	ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option($ldapconn, LDAP_OPT_REFERRALS, 0);
	if ($ldapconn) {
	    $ldapbind = ldap_bind($ldapconn, $ldaprdn.$ldapdom, $ldappass);
		if ($ldapbind == "true"){
			$result = ldap_search($ldapconn, $ldaptree, $filter, $attributes);
			$entries = ldap_get_entries($ldapconn, $result);
			if($entries["count"] > 0){
				if ($entries[0]["telephonenumber"][0] == 1) {
					$entry_id = ldap_first_entry($ldapconn, $result);
					$user_dn = ldap_get_dn($ldapconn, $entry_id);
					$telephonenumber = array('telephonenumber' => 0);
					$modifications = ldap_mod_replace ($ldapconn, $user_dn, $telephonenumber);
					ldap_close($ldapconn);
					session_destroy();
					echo '<script>window.location="ingreso";</script>';
				}else{
					ldap_close($ldapconn);
					session_destroy();
					echo '<script>window.location="ingreso";</script>';
				}
			}
		}
	}

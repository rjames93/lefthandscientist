<?php

/*
Written by Imran Hussain ~imranh

Used to auth people, will check SUCS then the uni ldap, will only check
students on the uni ldap.

will return "sucs" if the username/password passed is a sucs member
will return "uni" if the user/pass passed has a student swan uni account
will return "nope" if the user/pass passed is inavlid

Example usage:

include_once("ldap-auth.php");

isAuthd = ldapAuth("usaername", "password");

if (isAuthd == "sucs"){
	//do stuff for sucs auth
}elseif (isAuthd == "uni"){
	//do stuff for uni auth
}else{
	//do stuff for not authd peeps
}

 */

// we don't care about warnings, we write our own
error_reporting(E_ERROR | E_PARSE);

function ldapAuth($username, $password) {

	if ($username != "" && $password != ""){

		// people like to use emails to login so lets detect and strip
		if(filter_var($username, FILTER_VALIDATE_EMAIL)){
			//valid email, lets strip
			// split the email into a string array "@" as a delim
			$s = explode("@",$username);
			// remove the last element (domain)
			array_pop($s);
			// put the array back togther using "@" as a seperator
			$username = implode("@",$s);
		}

		// ldap servers
		$sucsLDAPServer = 'silver.sucs.swan.ac.uk';
		$lisLDAPServer = 'ccs-suld1.swan.ac.uk';

		// lis auth stuffs
		$lisUsernameOu = substr($username, -1);
		$lisOtherOu = "Moved";

		// how to bind
		$sucsBindDn = "uid=$username,ou=People,dc=sucs,dc=org";
		$lisBindDn1 = "cn=$username,ou=$lisUsernameOu,ou=Students,ou=SWANSEA,o=SWANUNI";
		$lisBindDn2 = "cn=$username,ou=$lisOtherOu,ou=Students,ou=SWANSEA,o=SWANUNI";

		// Main auth

		// Try and connect to silver
		$ldapconnSUCS = ldap_connect($sucsLDAPServer) or die("Could not connect to SUCS LDAP server.");

		if ($ldapconnSUCS) {

			//echo "Connected to $sucsLDAPServer <br>";

			// try and bind to sucs ldap
			$ldapbindSUCS = ldap_bind($ldapconnSUCS, $sucsBindDn, $password);

			if ($ldapbindSUCS) {
				//echo "Auth'd as $username using SUCS LDAP<br>";
				return "sucs";
				// turns out they didn't give us valid sucs creds, lets try lis now
			} else {

				// try and connect to the lis ldap server
				$ldapconnLIS = ldap_connect($lisLDAPServer) or die("Could not connect to uni LDAP server.");
				//echo "Connected to $lisLDAPServer <br>";

				// lets try and bind to the uni ldap
				$ldapbindLIS1 = ldap_bind($ldapconnLIS, $lisBindDn1, $password);
				if ($ldapbindLIS1) {
					//echo "Auth'd as $username using uni LDAP using ou=$lisUsernameOu<br>";
					return "uni";
				} else {
					$ldapbindLIS2 = ldap_bind($ldapconnLIS, $lisBindDn2, $password);
					if ($ldapbindLIS2) {
						//echo "Auth'd as $username using uni LDAP using ou=moved<br>";
						return "uni";
						// shit, couldn't bind to anything
					} else {
						//exit("Invalid Username or Password");
						return "nope";
					}
				}
			}
		}
	}else {
		return "nope";
	}
}
?>

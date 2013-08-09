/*
 *
 * Work with CodeIgniter / Windows 2k8 AD
 *
 * Place this file @ application/libraries/Ldap.php
 *
 * Create by: j0se <jose -DOT- ferreira @ gmail.NO.SPAM
 *
 */
 
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ldap {
	public function validar($usuario,$password) {
		$dominio = '<myDOMAIN>';
		$servidor = '<LDAP_SERVER>';
		$ldaprdn =  $dominio . "\\" . $usuario;
		$ldappass = utf8_decode($password); //issue with passwords with "ñ"
		$ldapconn = ldap_connect($servidor) 
		    or die("Could not connect to LDAP server."); /* Connect or die this is the question!! */
		if ($ldapconn)  {
		    $ldapbind = @ldap_bind($ldapconn, $ldaprdn, $ldappass); /* Connect with user and pass */
		    if (($ldapbind) and ($password != '')) {
		        $estado = 'OK'; /* User and Password is OK. All is OK */
		    } else {
		        $estado = 'ERROR'; /* WRONG!!! */
		    }
		}
		ldap_close($ldapconn); /*Close*/
		return $estado;
	}
	public function tiene_session() {
		$CI =& get_instance();
  		$tiene_session = $CI->session->userdata('login_on');
    	if(!isset($tiene_session) || $tiene_session != TRUE) {
    			 redirect('login');    
    	} 
	}
}

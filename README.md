ldapPHP
=======

Library to use with CodeIgniter to auth users against LDAP directory (test w2K8)


How to use
==========

In model or controller



if ($this->ldap->validar($usuario,$password) != 'ERROR'):
/*here code to validation ok (ex: session sets... )*/
else:
/*here error  (ex: redirect login form)*/
endif;





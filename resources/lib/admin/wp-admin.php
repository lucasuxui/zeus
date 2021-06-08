<?php

/**
* Admin Style functions
*/



add_action('login_head', 'custom_login_logo');

function custom_login_logo() {



$nocolor            = 'rgba(0,0,0,0)';

$bg_color           = '#ffffff'; //COR DO BAGROUND DA PÁGINA

$lb_color           = '#72777c'; //COR DOS LABEL'S DO FORM



$in_focus_shadow    = '#a1bae0'; //COR DA SOMBRA DOS CAMPOS (FOCUS)

$in_focus_border    = '#ccc'; //COR DA BORDA DOS CAMPOS (FOCUS)



$lg_text_color      = '#fff';    //COR DO TEXTO DO BOTÃO PRIMRÁRIO

$lg_text_color_h    = '#fff';    //COR DO TEXTO DO BOTÃO PRIMRÁRIO (HOVER)

$lg_color           = '#681aff'; //COR DO BOTÃO PRIMÁRIO

$lg_color_hover     = '#4912B2'; //COR DA BOTÃO PRIMÁRIO HOVER

$lg_color_shadow    = $nocolor;  //COR DA SOMBRA DO BOTÃO PRIMRÁRIO

$lg_color_shadow_h  = $nocolor;  //COR DA SOMBRA DO BOTÃO PRIMRÁRIO (HOVER)

//$lg_border_color    = $nocolor;  //COR DA BORDA DO BOTÃO PRIMRÁRIO

$lg_border_color_h  = $nocolor;  //COR DA BORDA DO BOTÃO PRIMRÁRIO (HOVER)



$bt_color           = '#681aff'; //COR DO BOTÃO SECUNDÁRIO

$bt_color_h         = '#4912B2'; //COR DO BOTÃO SECUNDÁRIO (HOVER)

$bt_text_color      = '#fff';    //COR DO TEXTO DO BOTÃO SECUNDÁRIO (HOVER)

$bt_text_color_h    = '#fff';    //COR DO TEXTO DO BOTÃO SECUNDÁRIO (HOVER)



$logow              = '105px';   //DIMENSÕES DO LOGO - LARGURA

$logoh              = '60px';    //DIMENSÕES DO LOGO - ALTURA

add_filter( 'login_headerurl', 'custom_login_url' );
function custom_login_url($url) {
    return get_home_url();
}

echo '

<style type="text/css">



body.login {background: '.$bg_color.' !important;}

.wp-core-ui .button-primary:hover, .login #backtoblog:hover, .login #nav:hover {

  transition: background .25s ease-in-out;

  -moz-transition: background .25s ease-in-out;

  -webkit-transition: background .25s ease-in-out;

}

.login-form {

  margin-top: 25px;

}

#loginform {
    border-radius: 5px;
}



.login h1 a {

  background-image: url('.get_template_directory_uri().'/lib/admin/logo.png) !important;

  background-size: contain !important;

  width: 200px !important;

  padding-bottom: 0px;

  margin: 0px auto!important;

}



#loginform input:focus {

  box-shadow: 0px 0px 2px '.$in_focus_shadow.';

  border-color: '.$in_focus_border.';

}



.login label {color: '.$lb_color.' !important;font-weight: bold;}

#login_error, .login .message {display: none;}



.wp-core-ui .button-primary {

  background: '.$lg_color.' !important;color: '.$lg_text_color.' !important;

  box-shadow: 0 1px 0 '.$lg_color_shadow.' !important;

  text-shadow: none;

  border: 0;

}



.wp-core-ui .button-primary:hover {

    background: '.$lg_color_hover.' !important;color: '.$lg_text_color_h.' !important;

}



.login #backtoblog, .login #nav {

  color: '.$bt_text_color.' !important;

  background: '.$bt_color.';

  border-radius: 5px;

  float: left;

  margin: 15px 0 0px !important;

  padding: 10px 0px !important;

  text-align: center;

  width: 100%;

}

.login #backtoblog:hover, .login #nav:hover {

    background: '.$bt_color_h.' !important;

    color: '.$bt_text_color_h.' !important;

}

.login #backtoblog a, .login #nav a {color: inherit !important;}

.madedby img{
  position: absolute;
  bottom: 10vh;
  max-width: 170px;
  left: 50%;
  transform: translate(-50%, 0);
}

</style>

<div class="madedby">
  <img src="'.get_template_directory_uri().'/lib/admin/madedby.png"/>
</div>
'
;

}
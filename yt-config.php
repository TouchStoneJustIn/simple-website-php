<?php
/**
 * Ytronic configuration.
 *
 * @var string or null
 */
function yt_config( $opt = '' )
{
	$settings = array(
		
		'site_lang'		=> 'en',							/** Website language **/
		'site_name'		=> 'Ytronic',						/** Website name **/
		'site_descript'	=> 'Ytronic description',			/** Website description **/
		'site_url'		=> 'http://localhost/ytronic/',		/** Website url **/
		'pretty_url'	=> false,							/** Convert url "/?page=contact" to "/contact" **/
		'template_dir'	=> 'yt-template',					/** Template directory name **/
		'content_dir'	=> 'yt-content',					/** Pages directory name **/
		'version'		=> 'v1.1.0',						/** Ytronic app version **/
    );

    return isset($settings[$opt]) ? $settings[$opt] : null;
}

/**
 * Site url.
 */
function site_url()
{
	if ( yt_config('site_url') == '' )
	{
		// Verify server scheme if is http or https
		$ifHttps = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
		$url_site = $ifHttps .'://'. $_SERVER['HTTP_HOST'] .'/';
	} else {
		// Adding trailing end slash if dont have
		$url_last_char = mb_substr(yt_config('site_url'), -1);
		$url_site = $url_last_char == '/' ? yt_config('site_url') : yt_config('site_url') .'/';
	}
	return $url_site;
}

/** Absolute path to the Ytronic directory. */
if ( ! defined( 'YTABPATH' ) ) {
	define( 'YTABPATH', __DIR__ . DIRECTORY_SEPARATOR );
}

/** Set the path of the Ytronic template directory. */
if ( ! defined( 'YTTMPL' ) ) {
	define ( 'YTTMPL', __DIR__ . DIRECTORY_SEPARATOR . yt_config('template_dir') );
}

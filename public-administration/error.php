<?php
/*--------------------------------------------------------------
# Copyright (C) joomla-monster.com
# License: http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
# Website: http://www.joomla-monster.com
# Support: info@joomla-monster.com
---------------------------------------------------------------*/

/**
 * @package			Joomla.Site
 * @subpackage	Template.system
 *
 * @copyright		Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights contenterved.
 * @license			GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
if (!isset($this->error)) {
	$this->error = JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
	$this->debug = false;
}

// get language and direction
$doc = JFactory::getDocument();
$this->language = $doc->language;
$this->direction = $doc->direction;

// get error code
$errorcode = $this->error->getCode();

// get article ID from options
$app = JFactory::getApplication();
$tpl = $app->getTemplate(true);

$errorpage = $tpl->params->get('error404article'); //article ID

// only for error404
if( $errorcode=='404' ) {

	if( !empty($errorpage) ) {
		// check DB results
		$dbresults = false;

		// get a db connection.
		$db = JFactory::getDbo();

		// create a new query object.
		$query = $db->getQuery(true);

		$query->select($db->quoteName(array('id')));
		$query->from($db->quoteName('#__content'));
		$query->where(
			$db->quoteName('id') .' = '. $db->quote($errorpage)
			.' AND '. $db->quoteName('state') . ' = '. $db->quote('1')
			.' AND '. $db->quoteName('access') .' = '. $db->quote('1')
			.' AND ('. $db->quoteName('language') . ' = ' . $db->quote('*') .' OR '. $db->quoteName('language') . ' = ' . $db->quote($this->language) .')' );

		$db->setQuery($query);

		// load the results
		$dbresults = $db->loadResult();

		// only if article exists and have access
		if( $dbresults ) {

			@ini_set('user_agent', $_SERVER['HTTP_USER_AGENT']);

			require_once JPath::clean(JPATH_ROOT.DS.'components'.DS.'com_content'.DS.'helpers'.DS.'route.php');

			// check multilanguage
			$multilang = $app->getLanguageFilter();
			$lang_sfx = '';
			if ( $multilang ) {
				$sefs = JLanguageHelper::getLanguages('sef');
				$current = $app->input->get('language', 'en-GB');

				foreach ($sefs as $sef => $language) {
					if ($language->lang_code == $current) {
						$lang_sfx = $sef;
						break;
					}
				}
			}

			// get article full url
			$url = JRoute::_(JURI::root(false) . ContentHelperRoute::getArticleRoute($errorpage, 0, $lang_sfx), false);

			if( $url ) {
				// HTML document of 404 page.
				$content = null;

				// check disabled functions
				$disabled_fns = explode(',', @ini_get('disable_functions'));

				// using basic file_get_contents
				if (count($disabled_fns) == 0 || (!in_array('get_headers', $disabled_fns) && !in_array('file_get_contents', $disabled_fns))) {
					$headers = get_headers($url);

					// check if not return 4XX or 5XX status
					if ( isset($headers[0]) && !preg_match('#4[0-9]{2}#', $headers[0]) && !preg_match('#5[0-9]{2}#', $headers[0]) ) {
						$content = file_get_contents($url);
					}
				}

				// if previous one failed, let's use CURL
				if( !$content && function_exists('curl_init') ) {
					$ch = curl_init();

					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
					curl_setopt($ch, CURLOPT_TIMEOUT, 10);

					$curl_content = curl_exec($ch);

					$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

					if( !preg_match('#4[0-9]{2}#', $code) && !preg_match('#5[0-9]{2}#', $code) ) {
						$content = $curl_content;
					}

					curl_close($ch);
				}

				// display article
				if( !empty($content) ) {
					header('HTTP/1.0 404 Not Found');
					echo $content;
					exit();
				}
			}
		}
	}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
	<link rel="stylesheet" href="<?php echo JURI::base(); ?>templates/<?php echo $this->template; ?>/css/error.css" type="text/css" />
</head>
<body>
	<div class="jm-error">
		<div class="jm-error-title">
			<div class="jm-error-code">
				<h1><?php echo $this->error->getCode(); ?></h1>
			</div>
			<div class="jm-error-message">
				<h2><?php echo $this->error->getMessage(); ?></h2>
			</div>
		</div>
		<div class="jm-error-desc">
			<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_JERROR_PAGE_DOESNT_EXIST'); ?><br/>
			<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_JERROR_GO_BACK_OR_HEAD_OVER'); ?><br />
			<div class="jm-error-buttons">
				<a class="jm-error-left" href="javascript:history.go(-1)"><?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_JERROR_BACK'); ?></a> <a class="jm-error-right" href="<?php echo JURI::base(); ?>" title="<?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_JERROR_HOME_PAGE'); ?>"><?php echo JText::_('PLG_SYSTEM_JMFRAMEWORK_JERROR_HOME_PAGE'); ?></a>
			</div>
			<?php if ($this->debug) : ?>
			<pre>
				<?php echo $this->renderBacktrace(); ?>
				<?php // Check if there are more Exceptions and render their data as well ?>
				<?php if ($this->error->getPrevious()) : ?>
					<?php $loop = true; ?>
					<?php // Reference $this->_error here and in the loop as setError() assigns errors to this property and we need this for the backtrace to work correctly ?>
					<?php // Make the first assignment to setError() outside the loop so the loop does not skip Exceptions ?>
					<?php $this->setError($this->_error->getPrevious()); ?>
					<?php while ($loop === true) : ?>
						<p><strong><?php echo JText::_('JERROR_LAYOUT_PREVIOUS_ERROR'); ?></strong></p>
						<p>
								<?php echo htmlspecialchars($this->_error->getMessage(), ENT_QUOTES, 'UTF-8'); ?>
							<br/><?php echo htmlspecialchars($this->_error->getFile(), ENT_QUOTES, 'UTF-8');?>:<?php echo $this->_error->getLine(); ?>
							</p>
						<?php echo $this->renderBacktrace(); ?>
						<?php $loop = $this->setError($this->_error->getPrevious()); ?>
					<?php endwhile; ?>
					<?php // Reset the main error object to the base error ?>
					<?php $this->setError($this->error); ?>
				<?php endif; ?>
			</pre>
			<?php endif; ?>
		</div>
	</div>
</body>
</html>

<?php
/**
 * Citation element syntax component for the adhoctags plugin
 *
 * Defines  <cite> ... </cite> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/cite
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_cite extends syntax_plugin_adhoctags_abstractinline {

	protected $tag	= 'cite';

    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->emphasis_open();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->emphasis_close();
    }
}
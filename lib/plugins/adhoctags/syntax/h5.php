<?php
/**
 * Headline Level 5 element component for the adhoctags plugin
 *
 * Defines  <h5> ... </h5> syntax
 * More info: https://developer.mozilla.org/en-US/docs/Web/HTML/Element/Heading_Elements
 *
 * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
 * @author     Anika Henke <anika@selfthinker.org>
 * @author     Sascha Leib <sascha.leib(at)kolmio.com>
 */

class syntax_plugin_adhoctags_h5 extends syntax_plugin_adhoctags_abstractheadline {

	protected $tag	= 'h5';

    /**
     * ODT Renderer Functions
     */
    function renderODTElementOpen($renderer, $HTMLelement, $data) {
		$renderer->p_open();
		$renderer->strong_open();
    }
    function renderODTElementClose($renderer, $element) {
		$renderer->strong_close();
 		$renderer->p_close();
   }
}
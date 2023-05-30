<?php
/**
 * Class LangXml, lang file controller
 *
 * LICENSE: CREATIVE COMMONS PUBLIC LICENSE  "Namensnennung — Nicht-kommerziell 2.0"
 *
 * @copyright  2009 <SEDesign />
 * @license    http://creativecommons.org/licenses/by-nc/2.0/de/
 * @version    $3.0.6$
 * @link       http://www.sedesign.de/de_produkte_chat-v3.html
 * @since      File available since Alpha 1.0
 */
 
class LangXml extends EtChatConfig
{
	/**
	* AAFParser Obj
	* @var AAFParser
	*/
	public $langXmlDoc;
	
	/**
	* Constructor
	*
	* @param  string $path relative path to language files
	* @param  string $xmlfile 
	* @uses AAFParser object creation
	* @uses AAFParser::Parse() parse the lang file
	* @uses AAFParser::$document root-tag as DOM Obj
	* @return void
	*/
	public function __construct ($path="./lang/", $xmlfile=""){	
		
		// call parent Constructor from class EtChatConfig
		parent::__construct();
		
		// if you want to use an other lang-file then was sets in the actual session
		$xmlfile = (empty($xmlfile)) ? $_SESSION['etchat_'.$this->_prefix.'lang_xml_file'] : $xmlfile;

		//if still empty
		if (empty($xmlfile)) $xmlfile = "lang_en.xml";
		
		// read the whole XML-Lang file
		$xml = @file_get_contents($path.$xmlfile);
		
		// create a AAFParser obj
		$parser = new AAFParser($xml);
		$parser->Parse();
		$this->langXmlDoc = $parser->document;
	}
	
	/**
	* Get language datasets for curent class
	*
	* @return AAFParser
	*/
	public function getLang(){	
		return $this->langXmlDoc;
	}
}
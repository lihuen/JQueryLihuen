<?php
/**
 * Hooks for JQueryLihuen extension
 * 
 * @file
 * @ingroup Extensions
 */

class JQueryLihuen {
	private static $tabcount = 0;
	public function registerHooks(Parser &$parser){
		global $wgOut;
		$wgOut->addModules('ext.JQueryLihuen');
		$parser->setHook('tabs', 'JQueryLihuen::renderTabs');
		return true;
	}
	public function renderTabs($input, array $args, Parser $parser, PPFrame $frame) {
		#$output = $parser->recursiveTagParse($input, $frame);
		$doc = new DOMDocument('1.0', "ISO-8859-1");
		$doc->loadHTML($parser->recursiveTagParse($input, $frame));
		$doc = JQueryLihuen::renderTabsDoFormat($doc, "extJQueryLihuenTabs-" . JQueryLihuen::$tabcount);
		JQueryLihuen::$tabcount++;
	
		return $doc->saveHTML();
	}
	function renderTabsGetHeadline(&$node, &$newDoc){
		foreach ($node->childNodes as $child){
			if (isset($child->tagName) && $child->tagName == "h3"){
				$title = $child;
				break;
			}
		}
		if (!isset($title)) return $newDoc->createElement("a", "NotFound");
                $spans = $title->getElementsByTagName("span");
                foreach ($spans as $span){
                        if ($span->getAttribute("class") == "mw-headline"){
				$a = $newDoc->createElement("a", $span->nodeValue);
				//$node->removeChild($span->parentNode);
				$title->setAttribute("class", "extJQueryLihuenHide");
				return $a;
                        }
                }
		return $newDoc->createElement("a", "NotFound");
	}
		
	function renderTabsDoFormat(&$doc, $id){
		$newDoc = new DOMDocument('1.0', "ISO-8859-1");
		$container = $newDoc->createElement("div");
		$container->setAttribute("id", $id);
		$container->setAttribute("class", "extJQueryLihuenTabs");
		$newDoc->appendChild($container);
		$list = $newDoc->createElement("ul");
		$list->setAttribute("style", "display: none");
		$list->setAttribute("class", "extJQueryLihuenTabsList");
		$container->appendChild($list);

		$children = $doc->getElementsByTagName("body")->item(0)->childNodes;
		$i = 1;
		foreach ($children as $child){
			if (isset ($child->tagName) && $child->tagName == "div"){
				$a = JQueryLihuen::renderTabsGetHeadline($child, $newDoc);
				$a->setAttribute("href", "#$id-$i");
				$li = $newDoc->createElement("li");
				$li->appendChild($a);
				$list->appendChild($li);

				$child->setAttribute("id", "$id-$i");
				//$child->removeAttribute("style");
				$child->setAttribute("class", "extJQueryLihuenTab " . $child->getAttribute("class"));
				$container->appendChild($newDoc->importNode($child, true));
				$i++;
			}
		}

		return $newDoc;
	}
}
?>

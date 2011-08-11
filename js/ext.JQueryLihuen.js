(function (){
// The next operations remove attributes ment to browsers without javascript support
	$(".extJQueryLihuenTabsList").removeAttr("style");
	$(".extJQueryLihuenTab").removeAttr("style");
// In Lihuen wiki we want to remove some styles
	$(".extJQueryLihuenTab > div").removeAttr("style");
// Creation of the widgets
//	$(".extJQueryLihuenTabs").tabs({event:"mouseover"});
	$(".extJQueryLihuenTabs").tabs();
	$(".ui-tabs .ui-tabs-panel").css("padding", "0.5em");
	$(".ui-widget-content a").css("color", $("a").css("color"));
})();


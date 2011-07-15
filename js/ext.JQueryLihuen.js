(function (){
// The next operations remove attributes ment to browsers without javascript support
	$(".extJQueryLihuenTabsList").removeAttr("style");
	$(".extJQueryLihuenTab").removeAttr("style");
// Creation of the widgets
	$(".extJQueryLihuenTabs").tabs({event:"mouseover"});
})();


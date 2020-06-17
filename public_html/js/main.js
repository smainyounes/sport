$( document ).ready(function () {
	/*smoothproduct load*/
	$('.sp-wrap').smoothproducts();

	/*loading dzair js*/
	wilaya1(9);
	commune11(9);
	
});

/*on change for the wilaya*/
function f1(x) {
	var strUser = x.options[x.selectedIndex].value;
	commune11(strUser);
}
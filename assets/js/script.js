$(document).ready(function () {

	/**
	 * Using a self initialising function to set wrapper margin
	 * from the top. The integer is retrieved from the entire height
	 * of the navbar.
	 * 
	 * @return void
	 */
	(function(){
		var wrapper = $("#wrapper");
		var navHeight = $(".nav").outerHeight();

		wrapper.css("margin-top", navHeight);
	})();

});
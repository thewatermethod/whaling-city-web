document.addEventListener("DOMContentLoaded", function() {
  	
  	document.querySelector('.burger-menu-btn').addEventListener("click", function() {
  		 this.classList.toggle("open");
  		 document.querySelector(".main-navigation ul").classList.toggle("opened");
  	});
  	
});
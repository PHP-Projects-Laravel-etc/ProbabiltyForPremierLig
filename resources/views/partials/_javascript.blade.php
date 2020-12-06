<script src="https:////cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<script src="{{ asset('js\jquery.plugin.min.js') }}"></script>
<script src="{{ asset('js\jquery.calculator.min.js') }}"></script>
<script src="{{ asset('js/i18n/jquery.calculator-tr.js') }}"></script>

<script type="text/javascript">
$(function () {
	$('.calculator').calculator();

	if($(window).innerWidth() <= 400) {
 				$('.navbar-inverse').removeClass('navbar-fixed-left1');
     }


    $('.dropdown-submenu a.test').on("click", function(e){
        $(this).next('ul').toggle();
        e.stopPropagation();
        e.preventDefault();
    });
		});
</script>

@yield('scripts')

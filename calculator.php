<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">



<br>
<div class="container">
	<div class="col-sm-offset-4">
		<div class="row">
			<div class="col-md-4">
				<input type="text" class="form-control text-right" id="total" readonly >

			</div>
		</div>
		<br>
			<div class="row">
				<div class="col-md-4 text-center">
					<button class="btn btn-primary btn-lg">7</button>
					<button class="btn btn-primary btn-lg">8</button>
					<button class="btn btn-primary btn-lg">9</button>
					<button class="btn btn-primary btn-lg">/</button>
				</div>
			</div>
		<br>

			<div class="row">
				<div class="col-md-4 text-center">
					<button class="btn btn-primary btn-lg">4</button>
					<button class="btn btn-primary btn-lg">5</button>
					<button class="btn btn-primary btn-lg">6</button>
					<button class="btn btn-primary btn-lg">*</button>
				</div>
			</div>
		<br>
			<div class="row">
				<div class="col-md-4 text-center">
					<button class="btn btn-primary btn-lg">3</button>
					<button class="btn btn-primary btn-lg">2</button>
					<button class="btn btn-primary btn-lg">1</button>
					<button class="btn btn-primary btn-lg">-</button>
				</div>
			</div>

		<br>
			<div class="row text-center">

				<div class="col-md-4 text-center">
					<button class="btn btn-primary btn-lg">0</button>
					<button class="btn btn-primary btn-lg">.</button>
					<button class="btn btn-success btn-lg">=</button>
					<button class="btn btn-primary btn-lg">+</button>

				</div>


			</div>
		<br>
		<div class="row text-center">

				<div class="col-md-4 text-center">
					<button class="btn btn-info btn-lg btn-block">CLEAR</button>
				</div>
			</div>
		</div>


		</div>



	</div>


</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript">
$(function() {


		var oper_list = ['+','-','*','/','=','CLEAR'];
		var list = [];

		$('#total').val('0');

		$('button').click(function() {

			var value = $(this).text();
			var curr = $('#total').val();

			operand(value,curr);

		});

		function operand(oper,curr) {

			if(oper == "CLEAR") {
				list = [];
				$('#total').val('0');
				return false;
			}else if(oper_list.includes(oper) && oper !== "=") {

				$('#total').val(oper);
				list.push(curr);
				list.push(oper);

			}else if(oper == "=") {

				list.push(curr);
				var equals = 0;

				for(var x = 0; x<list.length; x++) {

					if(oper_list.includes(list[x]) && (oper !== "=" || oper !== "CLEAR") ) {

						var i = x + 1;

						if(list[x] == "+") {
							equals = parseFloat(equals) + parseFloat(list[i]);
						}else if(list[x] == "-") {
							equals = parseFloat(equals) - parseFloat(list[i]);
						}else if(list[x] == "/") {
							equals = parseFloat(equals) / parseFloat(list[i]);
						}else if(list[x] == "*") {
							equals = parseFloat(equals) * parseFloat(list[i]);
						}
						x = i;
					}else {
						equals = list[x];
					}
				}

				$('#total').val(parseFloat(equals.toFixed(2)));
			}else {
				display(oper);
			}
		}


		function display(num) {

			var value = $('#total').val();

			if(oper_list.includes(value) || value == 0) {
				value = num;
			}else {
				value += num;
			}

			$('#total').val(value);

		}

});
</script>

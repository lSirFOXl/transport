@extends('app')

@section('content')

<script>
    $(function() {
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $('#insertForm').submit(function(e) {
            $.ajax({
                url: '/form.html',
                type: 'POST',
                data: {
                        _token: CSRF_TOKEN, 
                        transportName: $('#transportName').val(),
                        number: $('#number').val(),
                        way: $('#way').val(),
                    },
                
                success: function (data) {
                    $('#transportName').val("")
                    $('#number').val("")
                    $('#way').val("")
                    $('#cont').append(
                        '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Запись добавлена</div>'
                    );
                }

            }); 
            return false; 
        });
    });
</script>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1" id="cont">
			<div class="panel panel-default" >
				<div class="panel-heading">Добавление записи</div>

				<div class="panel-body">
                    <form action="" method="post" id="insertForm">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                            <label for="name">Наименование транспорта: </label>
                            <input id="transportName" class="form-control" id="name" name="transportName" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="number">Номер транспорта: </label>
                            <input id="number" type="number" class="form-control" id="number" name="number" placeholder="">
                        </div>
                        <div class="form-check">
                            <label for="way">Направление: </label>
                            <input id="way" class="form-control" id="way" name="way" placeholder="">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Подвердить</button>
                    </form>
				</div>
			</div>

		</div>
	</div>
</div>
@endsection

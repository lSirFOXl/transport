@extends('app')

@section('content')

<script>
    $(document).ready(function(){
        /*$('#contactform').on('submit', function(e){
            e.preventDefault();
    
            

            
        });*/
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var lastTime = {{time()}};

        setInterval(getAjaxInfo, 5000);

        function getAjaxInfo(){
            $.ajax({
                url: '/getNewInfo',
                type: 'POST',
                data: {
                        _token: CSRF_TOKEN, 
                        time: lastTime
                    },
                success: function (data) {
                    lastTime = data.date;
                    data.info.forEach(function(element) {
                        var date = new Date(element["date"]*1000);
                        var hours = date.getHours();
                        var minutes = date.getMinutes();
                        var seconds = date.getSeconds();
                        var day = date.getDate();
                        var monthIndex = date.getMonth();
                        var year = date.getFullYear();

                        $('#tableBody').prepend(
                            '<tr><td>'+element["name"]+'</td><td>'+element["number"]+'</td><td>'+element["way"]+'</td><td>'+element["date"]+'</td></tr>'
                        );
                    });
                    console.log(data);
                }
            }); 
        }
    });
</script>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Список транспорта</div>

				<div class="panel-body">
                <table class="table">
                        <thead class="thead-inverse">
                            <tr>
                                <th scope="col">Наименование транспорта</th>
                                <th scope="col">Номер транспорта</th>
                                <th scope="col">Направление</th>
                                <th scope="col">Дата</th>
                            </tr>
                        </thead>
                        <tbody id = "tableBody">
                            <? 
                                
                                foreach ($transport_info as $key => $value) {
                                    ?>
                                        <tr>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->number}}</td>
                                            <td>{{$value->way}}</td>
                                            <td>{{ date("d.m.y, H:i:s", $value->date) }}</td>
                                        </tr>
                                    <?
                                }
                            ?>
                        </tbody>
                    </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
@extends('home')

@section('title', 'Cadastro')
@section('content')
<style>
    svg {
        width: 50%!important;
    }
</style>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" id="tabs">{{ csrf_field() }}
                <div class="card col-lg-12" id="tab-cadastro">
                    <form class="form-horizontal">
                        <div class="panel-body">
                            <div id="form-cadastro">
                                <div id="piechart" style="width: 900px; height: 500px;"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('js/jquery-1.10.2.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/jquery-ui/jquery-ui.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/dataTables.js') }}"></script>
<script>
$(document).ready(function () {
    $("#tabs").tabs({
        activate: function (event, ui) {
            var active = $('#tabs').tabs('option', 'active');
        }
    });
google.charts.load('current', {'packages': ['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['Canceladas', {{$nOscancelada}}],
        ['Em Andamento', {{$nOsAndamento}}],
        ['Finalizadas', {{$nOsFinalizada}}],
    ]);

    var options = {
        title: 'Ordens de Serviço',
        backgroundColor: 'none',
        chartArea: {left:10,top:20,width:'50%',height:'75%'}
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data, options);
}
});
</script>
@stop
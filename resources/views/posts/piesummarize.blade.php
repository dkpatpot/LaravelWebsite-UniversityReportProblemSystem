@extends('layouts.main')

@section('content')
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light2", 
	animationEnabled: true,
	title: {
		text: "Categories Summarize Pie Chart"
	},
	data: [{
		type: "pie",
		startAngle: 240,
		yValueFormatString: "##\" posts\"",
		indexLabel: "{label} {y}",
		dataPoints: [
            @foreach($tags as $tag)
			    {y: {{$tag->posts->count()}}, label: "{{ $tag->name }}"},
            @endforeach
		]
	}]
});
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 450px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>
<div class="pt-6 pb-4 pl-4">
        <a class="app-button text-slate-200" href="{{ route('posts.summarize', ['tags' => $tags]) }}">
            Column charts
        </a>
</div>
    
@endsection
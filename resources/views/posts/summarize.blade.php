@extends('layouts.main')

@section('content')
    <!DOCTYPE HTML>
    <html>
    <head>
    <script type="text/javascript">
    window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
	    theme: "light2", 
	    animationEnabled: true, 
	    title:{
		    text: "Categories Summarize Column Chart"
	    },
	    data: [
	    {
		    type: "column",
		    dataPoints: [
                @foreach($tags as $tag)
			        { label: "{{ $tag->name }}",  y: {{ $tag->posts->count() }} },
                @endforeach
		    ]
	    }
	    ]
    });
    
    chart.render();

    }   
    </script>
    </head>
    <body>
    <div id="chartContainer" style="height: 450px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
    </body>
    </html>
    <div class="pt-6 pb-4 pl-4">
        <a class="app-button text-slate-200" href="{{ route('posts.piesummarize', ['tags' => $tags]) }}">
            Pie charts
        </a>
    </div>
    
@endsection
@extends('layouts.main')

@section('content')
    <section class="mx-8 font-mono bg-slate-800 rounded-lg px-4 py-6 pb-4 ring-1 ring-slate-900/5 shadow-xl">
        <h1 class="text-2xl mx-4 mt-6 text-white pl-8" >
            หมวดหมู่ทั้งหมด
        </h1>
        <div class="my-1 px-8 py-2 justify-between space-y-6">
            @foreach($tags as $tag)
                <a href="{{ route('tags.show', ['tag' => $tag->name]) }}"
                   class="block p-6 bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">
                        {{ $tag->name }}
                    </h5>
                    <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        <svg class="w-6 h-6 inline mr-1" viewBox="0 0 20 20">
                            <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
                        </svg>
                        {{ $tag->posts->count() }} posts
                    </p>
                </a>
            @endforeach
        </div>
    </section>



@endsection

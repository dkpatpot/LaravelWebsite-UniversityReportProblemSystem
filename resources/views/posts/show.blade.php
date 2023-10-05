{{-- resources/views/posts/show.blade.php --}}
@extends('layouts.main')

@section('content')
<article class="mx-8 font-mono bg-slate-800 rounded-lg px-4 py-6 ring-1 ring-slate-900/5 shadow-xl" >
        <h1 class="text-2xl mb-1 text-white">
            {{ $post->title }}
                    
        <p class="bg-rose-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                {{ $post->created_at->diffForHumans() }}
        </p>
        </h1>
        <div class="mb-4 ">
            <p class="bg-orange-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                <svg class="w-6 h-6 inline mr-1" viewBox="0 0 20 20">
                    <path d="M10,6.978c-1.666,0-3.022,1.356-3.022,3.022S8.334,13.022,10,13.022s3.022-1.356,3.022-3.022S11.666,6.978,10,6.978M10,12.267c-1.25,0-2.267-1.017-2.267-2.267c0-1.25,1.016-2.267,2.267-2.267c1.251,0,2.267,1.016,2.267,2.267C12.267,11.25,11.251,12.267,10,12.267 M18.391,9.733l-1.624-1.639C14.966,6.279,12.563,5.278,10,5.278S5.034,6.279,3.234,8.094L1.609,9.733c-0.146,0.147-0.146,0.386,0,0.533l1.625,1.639c1.8,1.815,4.203,2.816,6.766,2.816s4.966-1.001,6.767-2.816l1.624-1.639C18.536,10.119,18.536,9.881,18.391,9.733 M16.229,11.373c-1.656,1.672-3.868,2.594-6.229,2.594s-4.573-0.922-6.23-2.594L2.41,10l1.36-1.374C5.427,6.955,7.639,6.033,10,6.033s4.573,0.922,6.229,2.593L17.59,10L16.229,11.373z"></path>
                </svg>
                {{ $post->view_count }} views
            </p>

            {{-- <p class="bg-green-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-6 inline mr-1" viewBox="0 0 16 16">
                    <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                </svg>
                {{ $post->like_count }} likes
            </p> --}}
            

            <form action="{{ route('like.post', $post->id) }}"
                method="post">
                @csrf
                <button class="bg-green-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-6 inline mr-1" viewBox="0 0 16 16">
                        <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
                    </svg>
                    {{ $post->like_count }} likes
                </button>
            </form>

        </div>
        <div class="my-4">
            <p class="text-white">
                หมวดหมู่
            </p>
            @foreach($post->tags as $tag)
                <a class="bg-purple-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2"
                    href="{{ route('tags.show', ['tag' => $tag->name]) }}">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
        <img src = "{{ asset('images/'.$post->image) }}"  alt="image-post" width=300 hieght=200 class="mb-8">

        <p class="mb-8 text-slate-200 ">
            {{ $post->description }}
        </p>

        @if($post->status =='incognito')
            <p class=" text-slate-200">
            {{$post->created_at}} โดย ผู้ใช้ไม่ระบุตัวตน
            </p>
        
        @else
            <p class="text-slate-200">
            {{$post->created_at}} โดย {{ $post->user->name }} {{ $post->user->jobs }}
                {{ $post->user->departure }} {{ $post->user->faculty }} {{ $post->user->years }}
            </p>
        @endif
        
        @can('update', $post)
            <div class="pt-6 pb-4">
                <a class="app-button text-slate-200" href="{{ route('posts.edit', ['post' => $post->id]) }}">
                    แก้ไขรายการปัญหา
                </a>
            </div>
            <!-- <button type="button" class="bg-indigo-500 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
              <svg class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
              </svg>
                Waiting...
            </button> -->
        @endcan

    </article>

        <!-- รายงานการดำเนินงาน -->
        @if ($post->reports)
            <section class="mt-8 mx-16 font-mono">
                <h1 class="text-sm mb-2"> รายงานการดำเนินงาน</h1>
                <h2 class="text-sm mb-2">{{ $post->reports->count() }} รายการ</h2>

                @foreach($post->reports->sortByDesc('created_at') as $report)
                    <div class="mb-2 block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                        <div>
                            <p>
                                {{$report->name}} 
                                <p class="bg-rose-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    {{$report->status}}
                                    <p class="bg-rose-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                                    {{ $report->created_at->diffForHumans() }}
                                    </p>
                                </p>
                                
                            </p>
                        </div>
                        <div class="pl-4 pt-2">
                            {{ $report->message }}
                        </div>
                        <p class="text-sm text-right">{{$post->created_at}}</p>
                    </div>
                @endforeach
            </section>
        @endif
        
        @if (Auth::user() && Auth::user()->isAdmin())
            <section class="mx-16 mt-8 font-mono" >
                <form action="{{ route('posts.reports.store', ['post' => $post->id]) }}" method="post">
                    @csrf
                    <div>
                        <label for="message" class="first-letter:block mb-2 text-sm font-medium">รายงานการดำเนินงาน</label>
                        <textarea name="message" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-400 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
                    </div>
                    <div class="form-group mt-4" >
                        <label for="status">status</label>
                        <div class= "form-check">
                            <input type="radio" class= "form-check-input" name = "status" id="receive" value="รับเรื่อง">
                            <label for="receive" class="form-check-label">
                                รับเรื่อง
                            </label>
                        </div>
                        <div class= "form-check">
                            <input type="radio" class= "form-check-input" name = "status" id="in progress" value="กำลังดำเนินงาน">
                            <label for="in progress" class="form-check-label">
                                กำลังดำเนินงาน
                            </label>
                        </div>
                        <div class= "form-check">
                            <input type="radio" class= "form-check-input" name = "status" id="complete" value="แก้ไขเรียบร้อย">
                            <label for="complete" class="form-check-label">
                                แก้ไขเรียบร้อย
                            </label>
                        </div>
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="app-button">Submit</button>
                    </div>
                </form>
            </section>
        @endif

<!-- user Comment -->
    @if ($post->comments)
        <section class="mt-8 mx-16 font-mono">
            <h1 class="text-sm mb-2">{{ $post->comments->count() }} Comments</h1>

            @foreach($post->comments->sortByDesc('created_at') as $comment)
                <div class="mb-2 block p-6 w-full bg-white rounded-lg border border-gray-200 shadow-md hover:bg-gray-100 ">
                    <p>
                        {{$comment->name}}
                    </p>
                    <p class="bg-rose-100 text-gray-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded mr-2">
                        {{ $comment->created_at->diffForHumans() }}
                    </p>
                    <div class="pl-4 pt-2 text-sm">
                        {{ $comment->message }}
                    </div>
                    <p class="text-sm text-right">{{$post->created_at}}</p>
                </div>
            @endforeach
        </section>
    @endif
    <section class="mx-16 mt-8 font-mono">
        <form action="{{ route('posts.comments.store', ['post' => $post->id]) }}" method="post">
            @csrf
            <div>
                <label for="message" class="first-letter:block mb-2 text-sm font-medium">Your message</label>
                <textarea name="message" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-400 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your message..."></textarea>
            </div>
            <div class="mt-2">
                <button type="submit" class="app-button">Comment</button>
            </div>
                

        </form>
    </section>
@endsection

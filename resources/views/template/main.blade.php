@php
use App\Models\User;

 @endphp

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
          integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="shortcut icon" href="{{asset('/assets/uploads/setting/'.User::first()->profile_image)}}" type="image/x-icon">
    <title>@yield("title") ~ Project</title>
</head>

<body class="antialiased text-slate-500 dark:text-slate-400 bg-white dark:bg-slate-900">

<div
    class="sticky top-0 z-40 w-full backdrop-blur flex-none transition-colors duration-500 lg:z-50 lg:border-b lg:border-slate-900/10 dark:border-slate-50/[0.06] bg-white supports-backdrop-blur:bg-white/95 dark:bg-slate-900/75"
    bis_skin_checked="1">
    <div class="max-w-8xl mx-auto" bis_skin_checked="1">
        <div class="py-4 border-b border-slate-900/10 lg:px-8 lg:border-0 dark:border-slate-300/10 px-4"
             bis_skin_checked="1">
            <div class="relative flex items-center" bis_skin_checked="1">
                <h3>{{User::first()->name}}</h3>

                <div class="relative hidden lg:flex items-center ml-auto" bis_skin_checked="1">
                    <nav class="text-sm leading-6 font-semibold text-slate-700 dark:text-slate-200">
                        <ul class="flex space-x-8">
                            @php
                                $menu = [
                                ["frontend.home", "Home"],
                                ["frontend.blogs.index", "Blog"],
                                [ "frontend.projects.index", "Projects"],
                                ["frontend.about.index", "About"],
                                ["frontend.services", "Services"],
                                ["frontend.gallery.index", "Gallery"],
                                [ "frontend.contact.create", "Contact"],

                            ];
                            @endphp

                            @foreach($menu as $item)
                                <li><a class="hover:text-sky-500 dark:hover:text-sky-400  aa"
                                       href="{{route($item[0])}}">{{$item[1]}}</a></li>
                            @endforeach


                        </ul>
                    </nav>

                </div>
                <button type="button"
                        class="ml-auto text-slate-500 w-8 h-8 -my-1 flex items-center justify-center hover:text-slate-600 lg:hidden dark:text-slate-400 dark:hover:text-slate-300">
                    <span class="sr-only">Search</span>
                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2"
                         stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                        <path d="m19 19-3.5-3.5"></path>
                        <circle cx="11" cy="11" r="6"></circle>
                    </svg>
                </button>
                <div class="ml-2 -my-1 lg:hidden" bis_skin_checked="1">
                    <button type="button"
                            class="text-slate-500 w-8 h-8 flex items-center justify-center hover:text-slate-600 dark:text-slate-400 dark:hover:text-slate-300">
                        <span class="sr-only">Navigation</span>
                        <svg width="24" height="24" fill="none" aria-hidden="true">
                            <path
                                d="M12 6v.01M12 12v.01M12 18v.01M12 7a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm0 6a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z"
                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <div hidden=""
                         style="position:fixed;top:1px;left:1px;width:1px;height:0;padding:0;margin:-1px;overflow:hidden;clip:rect(0, 0, 0, 0);white-space:nowrap;border-width:0;display:none"
                         bis_skin_checked="1"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<article>

    <div class="overflow-hidden" bis_skin_checked="1">
        <div
            class="relative max-w-8xl py-6 mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6"
            bis_skin_checked="1">
            <dl class="relative flex flex-wrap h-14 overflow-hidden">

                <div class="border-l border-slate-500/10 dark:border-slate-400/10 ml-6 pl-6 lg:ml-8 lg:pl-8"
                     bis_skin_checked="1">
                    <dt class="text-[0.8125rem] leading-6 font-semibold text-slate-700 dark:text-slate-400">Date
                    </dt>
                    <dd class="text-sm leading-6 mt-2 text-slate-700 dark:text-slate-200">

                        <time datetime="2022-09-30T00:00:00.000Z">{{ now()->format('M d, Y') }}</time>
                    </dd>
                </div>

            </dl>
            <a aria-label="Visit GitHub"
               target="_blank"
               class="relative flex-none text-sm text-center font-semibold text-white py-2.5 px-4 rounded-lg bg-slate-900 dark:bg-sky-500 dark:text-white focus:outline-none hover:bg-slate-700 focus:ring-2 focus:ring-slate-400 focus:ring-offset-2 dark:highlight-white/20 dark:hover:bg-sky-400 dark:focus:ring-2 dark:focus:ring-sky-600 dark:focus:ring-offset-slate-900"
               href="https://github.com/AlenPariyarOct10">View GitHub<span aria-hidden="true">→</span></a></div>
        <div class="relative [&amp;>:first-child]:!mt-0 [&amp;>:last-child]:!mb-0" bis_skin_checked="1">
            <div class="flex flex-row w-full justify-around align-middle items-center">
                <div class=""
                     bis_skin_checked="1"><p class="text-2xl leading-4 font-semibold text-sky-500">@yield("title")</p>
                    <h2 class="mt-4 max-w-5xl text-slate-900 text-3xl sm:text-6xl tracking-tight font-bold dark:text-white">
                        {{User::first()->name}}</h2>
                    <div class="mt-4 max-w-3xl prose prose-slate dark:prose-dark" bis_skin_checked="1"><p>{{User::first()->bio}}</p></div>
                </div>
                <div>
                    @yield("profileimg")
                </div>
            </div>
            @yield("descriptions")
            @yield("images")
            @yield("content")

        </div>
    </div>
</article>
<footer class="pt-5 sm:pt-5 text-center pb-5">
    <div class="text-center" bis_skin_checked="1">
        <p class="mt-4 text-sm leading-6 text-slate-500">© {{now()->format("Y")}} {{User::first()->name}}. All rights reserved.</p>
    </div>
</footer>
</div>
<script id="__NEXT_DATA__" type="application/json">
    {"props":{"pageProps":{}},"page":"/showcase","query":{},"buildId":"uKtXAwrBu0lXSvfuYTNio","nextExport":true,"autoExport":true,"isFallback":false,"scriptLoader":[]}
</script>
<script></script>
<div id="headlessui-portal-root" bis_skin_checked="1">
    <div data-headlessui-portal="" bis_skin_checked="1">
        <div bis_skin_checked="1"></div>
    </div>
</div>

<div id="5D43456F-73C6-FF00-FA0E-FCC51FAF4FAD" bis_skin_checked="1"></div>

<div class="bar-of-progress finished"
     style="position: fixed; top: 0px; left: 0px; margin: 0px; padding: 0px; border: none; border-radius: 0px; background-color: currentcolor; z-index: 10000; height: 2px; color: rgb(56, 189, 248); opacity: 0; width: 100%; transition: width 0.1s ease-out 0s, opacity 0.5s ease 0.2s;"
     bis_skin_checked="1">
    <div class="glow" style="opacity: 0.4; box-shadow: 3px 0px 8px; height: 100%;" bis_skin_checked="1"></div>
</div>
@yield("scripts")

</body>
</html>

@php
    use App\Models\User;
    use App\Models\Setting;
@endphp

@extends("template.main")
@section("title", "Home")
@section("scripts")
    <script>

        let fullString = (@json(Setting::first()->dynamic_typer_array));
        jobs = fullString.split(",");
        let textBase = "";
        //let jobs = ["Alen Pariyar", "a BCA Student", "a Web Developer", "from Lamjung, Nepal"];
        let jobIdx = 0;
        let i = 0;
        let reverse = false;

        function typeWriter() {
            // Generate some random text jitter between 45 and 75 ms to simulate a keyboard
            var textJitter = Math.floor(Math.random() * (70 - 45) + 45);

            // Check if we want to remove text ('reverse'), or add it.
            if (reverse) {
                if (document.getElementById("text").innerHTML.length > textBase.length) {
                    // We're still in the process of removing the job
                    document.getElementById("text").innerHTML = document
                        .getElementById("text")
                        .innerHTML.slice(0, -1);
                    setTimeout(typeWriter, textJitter);
                } else {
                    // deleting done. Set next job, and repeat with typing by
                    // setting reverse to false
                    jobIdx = (jobIdx + 1) % jobs.length;
                    reverse = false;
                    setTimeout(typeWriter, 1000);
                }
            } else {
                // We're adding text
                if (i === (textBase + jobs[jobIdx]).length) {
                    // Line is done. Wait and then reverse
                    i = textBase.length;
                    reverse = true;

                    // Wait a second, then start deleting
                    setTimeout(typeWriter, 3000);
                } else {
                    // Write text like a typewriter
                    if (i < (textBase + jobs[jobIdx]).length) {
                        document.getElementById("text").innerHTML = document.getElementById("text").innerHTML + (
                            textBase + jobs[jobIdx]
                        ).charAt(i);
                        i++;
                        setTimeout(typeWriter, textJitter);
                    }
                }
            }
        }

        typeWriter();
    </script>

@endsection
@section("descriptions")

    <figure class="relative z-20 my-20 sm:my-32">
        <div class="relative bg-slate-100 overflow-hidden dark:bg-slate-800" bis_skin_checked="1">
            <div class="absolute inset-x-0 top-0 bg-slate-900/5 h-px dark:bg-slate-100/5"
                 bis_skin_checked="1"></div>
            <div class="absolute inset-x-0 bottom-0 bg-slate-900/5 h-px dark:bg-slate-100/5"
                 bis_skin_checked="1"></div>
        </div>

        <figcaption class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 2xl:px-0 2xl:max-w-8xl">
            <div
                class="-ml-px pt-4 pl-4 sm:pt-6 sm:pl-6 border-l border-slate-200 text-sm leading-6 text-slate-600 dark:border-slate-700 dark:text-slate-400"
                bis_skin_checked="1"> <div class="text-center" bis_skin_checked="1">
                    <h2 class="mt-4 max-w-5xl text-slate-900 text-3xl sm:text-6xl tracking-tight font-bold dark:text-purple-600">
                        {{Setting::first()->dynamic_typer_prefix}} <span class="text-white" id="text"></span> </h2>
                </div>
            </div>
        </figcaption>
    </figure>
@endsection

@section("profileimg")
    <img class="rounded-full bg-blue-200 bg-opacity-10 w-auto h-64" src="{{asset('/assets/uploads/setting/'.User::first()->profile_image)}}" alt="" srcset="">
@endsection

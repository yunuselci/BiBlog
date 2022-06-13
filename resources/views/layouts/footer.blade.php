<footer
    class="bg-black relative z-10 wow fadeInUp"
    data-wow-delay=".15s"
>
    <div class="border-t border-opacity-40 md:py-8 py-6">
        <div class="container">
            <div class="flex flex-wrap -mx-4 md:divide-y-0 divide-y divide-gray-200">
                <div class="w-full md:w-2/3 lg:w-1/2 px-4 md:pb-0 pb-6">
                    <div class="my-1">
                        <div
                            class="
                                flex
                                items-center
                                justify-center
                                md:justify-start
                                -mx-3
                              "
                        >
                            <a
                                href="{{ LaravelLocalization::localizeUrl(route('home')) }}"
                                class="text-base text-[#f3f4fe] hover:text-primary px-3"
                            >
                                {{ __('Home') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 lg:w-1/2 px-4 md:pt-0 pt-6">
                    <div class="flex justify-center md:justify-end my-1">
                        <p class="text-base text-[#f3f4fe]">
                            {{ __('Licensed under WTFPL') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

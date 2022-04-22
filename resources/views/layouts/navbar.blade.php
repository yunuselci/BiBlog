<div
    class="
        ud-header
        bg-transparent
        absolute
        top-0
        left-0
        z-40
        w-full
        flex
        items-center
      "
>
    <div class="container">
        <div class="flex -mx-4 items-center justify-between relative lg:h-auto h-[48px]">
            <div class="flex px-4 justify-between items-center w-full">
                <div class="flex-1 w-full">
                    <button
                        id="navbarToggler"
                        class="
                  block
                  absolute
                  right-4
                  top-1/2
                  -translate-y-1/2
                  lg:hidden
                  focus:ring-2
                  ring-primary
                  px-3
                  py-[6px]
                  rounded-lg
                "
                    >
                <span
                    class="relative w-[30px] h-[2px] my-[6px] block bg-white"
                ></span>
                        <span
                            class="relative w-[30px] h-[2px] my-[6px] block bg-white"
                        ></span>
                        <span
                            class="relative w-[30px] h-[2px] my-[6px] block bg-white"
                        ></span>
                    </button>
                    <nav
                        id="navbarCollapse"
                        class="
                  absolute
                  py-5
                  lg:py-0 lg:px-4
                  xl:px-6
                  bg-white
                  lg:bg-transparent
                  shadow-lg
                  rounded-lg
                  max-w-[250px]
                  w-full
                  lg:max-w-full lg:w-full
                  right-4
                  top-full
                  hidden
                  lg:block lg:static lg:shadow-none
                "
                    >
                        <ul class="blcok lg:flex justify-between">
                            <li class="relative group">
                                <a
                                    href="{{ route('home') }}"
                                    class="
                                    ud-menu-scroll
                                    text-base text-dark
                                    lg:text-white
                                    lg:group-hover:opacity-70
                                    lg:group-hover:text-white
                                    group-hover:text-primary
                                    py-2
                                    lg:py-6 lg:inline-flex lg:px-0
                                    flex
                                    mx-8
                                    lg:mr-0
                                  "
                                >
                                    {{ __('Home') }}
                                </a>
                            </li>
                            <li class="relative group submenu-item">
                                <a
                                    href="javascript:void(0)"
                                    class="
                                        text-base text-dark
                                        lg:text-white
                                        lg:group-hover:opacity-70
                                        lg:group-hover:text-white
                                        group-hover:text-primary
                                        py-2
                                        lg:py-6 lg:inline-flex lg:pl-0 lg:pr-4
                                        flex
                                        mx-8
                                        lg:mr-0 lg:ml-8
                                        xl:ml-8
                                        relative
                                        after:absolute
                                        after:w-2
                                        after:h-2
                                        after:border-b-2
                                        after:border-r-2
                                        after:border-current
                                        after:rotate-45
                                        lg:after:right-0
                                        after:right-1
                                        after:top-1/2
                                        after:-translate-y-1/2
                                        after:mt-[-2px]
                                        uppercase
                                      "
                                >
                                    {{ app()->getLocale() }}
                                </a>
                                <div
                                    class="
                                        submenu
                                        hidden
                                        relative
                                        lg:absolute
                                        w-[250px]
                                        top-full
                                        lg:top-[110%]
                                        left-0
                                        rounded-sm
                                        lg:shadow-lg
                                        py-1
                                        divide-y
                                        divide-gray-100
                                        lg:block lg:opacity-0 lg:invisible
                                        group-hover:opacity-100
                                        lg:group-hover:visible lg:group-hover:top-full
                                        bg-white
                                        transition-[top]
                                        duration-300
                                      "
                                >
                                    <a
                                        href="{{ LaravelLocalization::getLocalizedURL('tr', null, [] ,true) }}"
                                        class="
                                          block
                                          text-sm text-body-color
                                          rounded
                                          hover:text-primary
                                          py-[10px]
                                          px-4
                                        "
                                    >
                                        Türkçe
                                    </a>
                                    <a
                                        href="{{ LaravelLocalization::getLocalizedURL('en', null, [] ,true) }}"
                                        class="
                                          block
                                          text-sm text-body-color
                                          rounded
                                          hover:text-primary
                                          py-[10px]
                                          px-4
                                        "
                                    >
                                        English
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

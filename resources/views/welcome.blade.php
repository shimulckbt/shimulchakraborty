<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">

    <!-- =====BOX ICONS===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <title>Portfolio website complete</title>
</head>

<body>
    <!--===== HEADER =====-->
    <header class="l-header">
        <nav class="nav bd-grid">
            <div>
                <a href="{{ route('welcome') }}" class="nav__logo" style="font-size: 1.2rem">Shimul Chakraborty</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <li class="nav__item"><a href="#home" class="nav__link active">Home</a></li>
                    <li class="nav__item"><a href="#about" class="nav__link">About</a></li>
                    <li class="nav__item"><a href="#skills" class="nav__link">Skills</a></li>
                    <li class="nav__item"><a href="#services" class="nav__link">Services</a></li>
                    <li class="nav__item"><a href="#work" class="nav__link">Work</a></li>
                    <li class="nav__item"><a href="#contact" class="nav__link">Contact</a></li>
                </ul>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class='bx bx-menu'></i>
            </div>
        </nav>
    </header>

    <main class="l-main">
        <!--===== HOME =====-->
        <section class="home bd-grid" id="home">
            <div class="home__data">
                <h1 class="home__title">Hi,<br>I'am <span class="home__title-color">Shimul</span><br> Web Developer</h1>

                <a href="#" class="button">Contact</a>
            </div>

            <div class="home__social">
                <a href="" class="home__social-icon"><i class='bx bxl-linkedin'></i></a>
                <a href="" class="home__social-icon"><i class='bx bxl-stack-overflow'></i></a>
                <a href="" class="home__social-icon"><i class='bx bxl-github'></i></a>
                <a href="https://mail.google.com/mail/?view=cm&fs=1&tf=1&to=shimulckbt@gmail.com" target="_blank"
                    title="gmail.com" class="home__social-icon"><i class='bx bx-envelope'></i></a>
            </div>

            <div class="home__img">
                <svg class="home__blob" viewBox="0 0 479 467" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <mask id="mask0" mask-type="alpha">
                        <path
                            d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z" />
                    </mask>
                    <g mask="url(#mask0)">
                        <path
                            d="M9.19024 145.964C34.0253 76.5814 114.865 54.7299 184.111 29.4823C245.804 6.98884 311.86 -14.9503 370.735 14.143C431.207 44.026 467.948 107.508 477.191 174.311C485.897 237.229 454.931 294.377 416.506 344.954C373.74 401.245 326.068 462.801 255.442 466.189C179.416 469.835 111.552 422.137 65.1576 361.805C17.4835 299.81 -17.1617 219.583 9.19024 145.964Z" />
                        <image class="home__blob-img" x="50" y="60"
                            href="{{ asset('frontend/img/final-removebg.png') }}" />
                    </g>
                </svg>
            </div>
        </section>

        <!--===== ABOUT =====-->
        <section class="about section " id="about">
            <h2 class="section-title">About</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="{{ asset('frontend/img/final-removebg.png') }}" alt="">
                </div>

                <div>
                    <h2 class="about__subtitle">I'am Shimul</h2>
                    <p class="about__text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate cum
                        expedita quo culpa tempora, assumenda, quis fugiat ut voluptates soluta, aut earum nemo
                        recusandae cumque perferendis! Recusandae alias accusamus atque.</p>
                </div>
            </div>
        </section>

        <!--===== SKILLS =====-->
        <section class="skills section" id="skills">
            <h2 class="section-title">Skills</h2>

            <div class="skills__container bd-grid">
                <div>
                    <h2 class="skills__subtitle">Profesional Skills</h2>
                    <p class="skills__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit optio id
                        vero amet, alias architecto consectetur error eum eaque sit.</p>
                    <div class="skills__data">
                        <div class="skills__names">
                            <i class='bx bxl-html5 skills__icon'></i>
                            <span class="skills__name">HTML5</span>
                        </div>
                        <div class="skills__bar skills__html">

                        </div>
                        <div>
                            <span class="skills__percentage">95%</span>
                        </div>
                    </div>
                    <div class="skills__data">
                        <div class="skills__names">
                            <i class='bx bxl-css3 skills__icon'></i>
                            <span class="skills__name">CSS3</span>
                        </div>
                        <div class="skills__bar skills__css">

                        </div>
                        <div>
                            <span class="skills__percentage">85%</span>
                        </div>
                    </div>
                    <div class="skills__data">
                        <div class="skills__names">
                            <i class='bx bxl-javascript skills__icon'></i>
                            <span class="skills__name">JAVASCRIPT</span>
                        </div>
                        <div class="skills__bar skills__js">

                        </div>
                        <div>
                            <span class="skills__percentage">65%</span>
                        </div>
                    </div>
                    <div class="skills__data">
                        <div class="skills__names">
                            <i class='bx bxs-paint skills__icon'></i>
                            <span class="skills__name">UX/UI</span>
                        </div>
                        <div class="skills__bar skills__ux">

                        </div>
                        <div>
                            <span class="skills__percentage">85%</span>
                        </div>
                    </div>
                </div>

                <div>
                    <img src="{{ asset('frontend/img/work3.jpg') }}" alt="" class="skills__img">
                </div>
            </div>
        </section>


        <!--===== Services =====-->
        <section class="services section" id="services">
            <h2 class="section-title">Services</h2>
            <div class="services__container bd-grid">
                <div class="cards">
                    <div class="card-wrap">
                        {{-- <img src="{{ asset('frontend/img/shapes/points3.png') }}"
                            class="points points2 points-sq" alt="" /> --}}
                        <div class="card" data-card="UI / UX">
                            <div class="card-content z-index">
                                <img src="{{ asset('frontend/img/app-icon.png') }}" class="icon"
                                    alt="" />
                                <h3 class="title-sm">UI/UX</h3>
                                <p class="text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Voluptatum hic veniam nihil.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-wrap">
                        <div class="card" data-card="DESIGN">
                            <div class="card-content z-index">
                                <img src="{{ asset('frontend/img/design-icon.png') }}" class="icon"
                                    alt="" />
                                <h3 class="title-sm">Web Design</h3>
                                <p class="text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam
                                    est suscipit itaque?
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="card-wrap">
                        <div class="card" data-card="CODE">
                            <div class="card-content z-index">
                                {{-- <img src="{{ asset('frontend/img/points3.png') }}" class="points points1 points-sq"
                            alt="" /> --}}
                                <img src="{{ asset('frontend/img/code-icon.png') }}" class="icon"
                                    alt="" />
                                <h3 class="title-sm">Web Development</h3>
                                <p class="text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Dolores suscipit nobis dolore?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--===== Services End =====-->

        <!--===== WORK =====-->
        <section class="work section" id="work">
            <h2 class="section-title">Work</h2>

            <div class="work__container bd-grid">
                <a href="" class="work__img">
                    <img src="{{ asset('frontend/img/work1.jpg') }}" alt="">
                </a>
                <a href="" class="work__img">
                    <img src="{{ asset('frontend/img/work2.jpg') }}" alt="">
                </a>
                <a href="" class="work__img">
                    <img src="{{ asset('frontend/img/work3.jpg') }}" alt="">
                </a>
                <a href="" class="work__img">
                    <img src="{{ asset('frontend/img/work4.jpg') }}" alt="">
                </a>
                <a href="" class="work__img">
                    <img src="{{ asset('frontend/img/work5.jpg') }}" alt="">
                </a>
                <a href="" class="work__img">
                    <img src="{{ asset('frontend/img/work6.jpg') }}" alt="">
                </a>
            </div>
        </section>

        <!--===== CONTACT =====-->
        <section class="contact section" id="contact">
            <h2 class="section-title">Contact</h2>

            <div class="contact__container bd-grid">
                <form action="" class="contact__form">
                    <input type="text" placeholder="Name" class="contact__input">
                    <input type="mail" placeholder="Email" class="contact__input">
                    <textarea name="" id="" cols="0" rows="10" placeholder="Write Something.."
                        class="contact__input"></textarea>
                    <input type="button" value="Submit" class="contact__button button">
                </form>
            </div>
        </section>
    </main>

    <!--===== FOOTER =====-->
    <footer class="footer">
        <p class="footer__title">Shimul</p>
        <div class="footer__social">
            <a href="#" class="footer__icon"><i class='bx bxl-facebook'></i></a>
            <a href="#" class="footer__icon"><i class='bx bxl-instagram'></i></a>
            <a href="#" class="footer__icon"><i class='bx bxl-twitter'></i></a>
        </div>

        <p class="footer__copy">2022 &#169; shimulckbt.com All rigths reserved</p>
    </footer>


    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--===== MAIN JS =====-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
</body>

</html>









{{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
{{-- <body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</body> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Shimul Chakraborty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="It's a personal portfolio website that will help people to recognoze me as a web developer. So visit my page and do contact if anyone need web application.">
    <meta name="keywords" content="shimulckbt, shimul ckbt, shimul, ckbt, shimul chakraborty">
    <meta name="author" content="Shimul Chakraborty">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="stylesheet" href="{{ asset('frontend/css/styles.css') }}">
    <!-- =====BOX ICONS===== -->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <meta name="google-site-verification" content="4FASCBeFJrCSmvVCd6Chkr0CbF8leTzy9-DrGUOn_wY" />
</head>

<body>
    @php
        $result = App\Models\HomePageEtc::select('home_title', 'home_subtitle', 'tech_description')->first();
        $profile = App\Models\User::select('profile_photo_path')->first();
        $links = App\Models\Footer::first();
        $skills = App\Models\Chart::all();
        $services = App\Models\Services::all();
        $projects = App\Models\Projects::select('img_one')->get();
    @endphp
    {{-- {{ dd($projects) }} --}}
    <!--===== HEADER =====-->
    <header class="l-header">
        <nav class="nav bd-grid">
            {{-- {{ dd($result->home_title) }} --}}
            <div>
                <a href="{{ route('welcome') }}" class="nav__logo"
                    style="font-size: 1.2rem">{{ isset($result->home_title) ? $result->home_title : 'Shimul' }}</a>

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
                <h1 class="home__title">Hi,<br>I'am <span
                        class="home__title-color">{{ isset($result->home_subtitle) ? $result->home_subtitle : 'CKBT' }}</span><br>
                    Web Developer</h1>

                <a href="#contact" class="button">Contact</a>
            </div>

            <div class="home__social">
                <a href="{{ $links->linkedin }}" target="_blank" class="home__social-icon" title="in/shimulckbt"><i
                        class='bx bxl-linkedin'></i></a>
                <a href="{{ $links->stackoverflow }}" target="_blank" class="home__social-icon"
                    title="stackoverflow/shimulckbt"><i class='bx bxl-stack-overflow'></i></a>
                <a href="{{ $links->github }}" target="_blank" class="home__social-icon" title="github/shimulckbt"><i
                        class='bx bxl-github'></i></a>
                <a href="mailto:{{ $links->email }}" target="_blank" title="shimul.ckbt@gmail.com"
                    class="home__social-icon"><i class='bx bx-envelope'></i></a>
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
                            href="{{ isset($profile->profile_photo_path) ? asset('upload/user_images/' . $profile->profile_photo_path) : asset('frontend/img/final-removebg.png') }}" />
                    </g>
                </svg>
            </div>
        </section>

        <!--===== ABOUT =====-->
        <section class="about section " id="about">
            <h2 class="section-title">About</h2>

            <div class="about__container bd-grid">
                <div class="about__img">
                    <img src="{{ isset($profile->profile_photo_path) ? asset('upload/user_images/' . $profile->profile_photo_path) : asset('frontend/img/final-removebg.png') }}"
                        alt="image">
                </div>

                <div>
                    <h2 class="about__subtitle">I'am
                        {{ isset($result->home_subtitle) ? $result->home_subtitle : 'CKBT' }}</h2>
                    <p class="about__text">
                        {{ isset($result->tech_description)
                            ? $result->tech_description
                            : 'Professional Software Engineer motivated to do any task with experience in Web application development. Area of skills are PHP, Laravel, MysQL, React JS, Node JS, Express JS, Mongo DB, Javascript, CSS, Html' }}
                    </p>
                </div>
            </div>
        </section>

        <!--===== SKILLS =====-->
        <section class="skills section" id="skills">
            <h2 class="section-title">Skills</h2>

            <div class="skills__container bd-grid">
                <div>
                    <h2 class="skills__subtitle">Profesional Skills</h2>
                    {{-- <p class="skills__text">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Velit optio id
                        vero amet, alias architecto consectetur error eum eaque sit.</p> --}}
                    @foreach ($skills as $skill)
                        <div class="skills__data">
                            <div class="skills__names">
                                {{-- <i class='bx bxl-html5 skills__icon'></i> --}}
                                <span
                                    class="skills__name">{{ isset($skill->x_data) ? $skill->x_data : 'Not Set' }}</span>
                            </div>
                            <div class="skills__bar"
                                style="width: {{ isset($skill->css_prop) ? $skill->css_prop : '0%' }}">

                            </div>
                            <div>
                                <span
                                    class="skills__percentage">{{ isset($skill->y_data) ? $skill->y_data : '0%' }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div>
                    <img src="{{ asset('frontend/img/work3.jpg') }}" alt="image" class="skills__img">
                </div>
            </div>
        </section>


        <!--===== Services =====-->
        <section class="services section" id="services">
            <h2 class="section-title">Services</h2>
            <div class="services__container bd-grid">
                <div class="cards">
                    @foreach ($services as $service)
                        <div class="card-wrap">
                            {{-- <img src="{{ asset('frontend/img/shapes/points3.png') }}"
                            class="points points2 points-sq" alt="image" /> --}}
                            <div class="card"
                                data-card="{{ isset($service->service_name) ? $service->service_name : 'NOTHING' }}">
                                <div class="card-content z-index">
                                    <img src="{{ isset($service->service_logo) ? asset($service->service_logo) : asset('frontend/img/app-icon.png') }}"
                                        class="icon" alt="image" />
                                    <h3 class="title-sm">{{ $service->service_name }}</h3>
                                    <p class="text">
                                        {{ isset($service->service_discription) ? $service->service_discription : 'No services added' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!--===== Services End =====-->

        <!--===== WORK =====-->
        <section class="work section" id="work">
            <h2 class="section-title">Work</h2>

            <div class="work__container bd-grid">
                @foreach ($projects as $project)
                    <a href="#work" class="work__img">
                        <img src="{{ isset($project->img_one) ? asset($project->img_one) : asset('frontend/img/work1.jpg') }}"
                            alt="image">
                    </a>
                @endforeach
            </div>
        </section>

        <!--===== CONTACT =====-->
        <section class="contact section" id="contact">
            <h2 class="section-title">Contact</h2>

            <div class="contact__container bd-grid">
                <form action="" id="contactForm" class="contact__form">
                    @csrf
                    <span class="error_text name_error"></span>
                    <input type="text" name="name" placeholder="Name" class="contact__input">
                    <span class="error_text email_error"></span>
                    <input type="mail" name="email" placeholder="Email" class="contact__input">
                    <span class="error_text message_error"></span>
                    <textarea id="" cols="0" rows="10" name="message" placeholder="Your Message.."
                        class="contact__input"></textarea>
                    <input type="submit" value="Submit" class="contact__button button">
                    <span id="message" class="success_text"></span>
                </form>
            </div>
        </section>
    </main>

    <!--===== FOOTER =====-->
    <footer class="footer">
        <p class="footer__title">Shimul</p>
        <div class="footer__social">
            <a href="{{ $links->facebook }}" target="_blank" class="footer__icon"><i
                    class='bx bxl-facebook'></i></a>
            <a href="{{ $links->instagram }}" target="_blank" class="footer__icon"><i
                    class='bx bxl-instagram'></i></a>
            <a href="{{ $links->twitter }}" target="_blank" class="footer__icon"><i
                    class='bx bxl-twitter'></i></a>
        </div>

        <p class="footer__copy"> &#169; {{ $links->footer_credit }} All rights reserved</p>
    </footer>


    <!--===== SCROLL REVEAL =====-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--===== MAIN JS =====-->
    <script src="{{ asset('frontend/js/main.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- contact form --}}

    <script type="text/javascript">
        $('#contactForm').submit(function(e) {
            e.preventDefault();
            let data = $('#contactForm').serialize();
            console.log(data);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: "{{ route('create.contact') }}",
                data: data,
                dataType: 'json',
                beforeSend: function() {
                    $(document).find('span.error_text').text('');
                },
                success: function(response) {
                    if (response.status == 200) {
                        $('#contactForm')[0].reset();
                        $('#message').empty().removeClass().addClass('success_text');
                        $('#message').append(response.message);
                    } else if (response.status == 400) {
                        $.each(response.error, function(prefix, val) {
                            $('span.' + prefix + '_error').text(val[0]);
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>

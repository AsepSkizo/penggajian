<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Rys Admin Dashboard</title>
    @include('partials.css')
</head>

<body class="theme-dark" style="overflow-y: auto;">
    <div id="app">
        @include('partials.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>{{ $title }}</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Selamat Datang, Admin</h4>
                                    </div>
                                    <div class="card-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold">John Duck</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Recent Messages</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/5.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="assets/images/faces/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <button class="btn btn-block btn-xl btn-outline-primary font-bold mt-3">Start
                                        Conversation</button>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </section>
            </div>

            @include('partials.footer')
        </div>
    </div>
    @include('partials.js')




    <svg id="SvgjsSvg1315" width="2" height="0" xmlns="http://www.w3.org/2000/svg" version="1.1"
        xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
        style="overflow: hidden; top: -100%; left: -100%; position: absolute; opacity: 0;">
        <defs id="SvgjsDefs1316"></defs>
        <polyline id="SvgjsPolyline1317" points="0,0"></polyline>
        <path id="SvgjsPath1318"
            d="M-1 45L-1 45C-1 45 19.17391304347826 45 19.17391304347826 45C19.17391304347826 45 31.956521739130434 45 31.956521739130434 45C31.956521739130434 45 44.73913043478261 45 44.73913043478261 45C44.73913043478261 45 57.52173913043478 45 57.52173913043478 45C57.52173913043478 45 70.30434782608695 45 70.30434782608695 45C70.30434782608695 45 83.08695652173913 45 83.08695652173913 45C83.08695652173913 45 95.8695652173913 45 95.8695652173913 45C95.8695652173913 45 108.65217391304347 45 108.65217391304347 45C108.65217391304347 45 121.43478260869566 45 121.43478260869566 45C121.43478260869566 45 134.2173913043478 45 134.2173913043478 45C134.2173913043478 45 147 45 147 45C147 45 147 45 147 45 ">
        </path>
    </svg>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include ('include.head')
<body id="home" data-spy="scroll" data-target="#navbar-top" data-offset="200">
@include ('include.navigate')
<!-- Jumbtron / Slider -->
<div class="jumbotron-wrap jumbotron-wrap-image mb-0">
    <div class="container">
        <div id="mainCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="jumbotron">
                        <h1 class="text-center">Events</h1>
                        <p class="lead text-center">Choose your event</p>

                    </div>
                </div>
              <!--  <div class="carousel-item">
                    <div class="jumbotron">
                        <h1 class="text-center">Vijuku houses</h1>
                        <p class="lead text-center">Choose your home</p>
                        <p class="lead text-center">
                            <a class="btn btn-primary btn-lg" href="/en_contact" role="button">
                                <i class="fa fa-info"></i> &nbsp; Contacts</a>
                            <a class="btn btn-secondary btn-lg" href="projects/2/subprojects" role="button">
                                <i class="fa fa-gbp"> </i> &nbsp; Make reservation</a>
                        </p>
                    </div>-->
                </div>
            </div>
            <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>
<!-- Footer -->
<footer class="footer">
    <div class="footer-lists">
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <ul>
                        <li><h4>Events</h4></li>
                        <li>
                        </li>
                    </ul>
                </div>
             <!--   <div class="col-sm">
                    <ul>
                        <li><h4>Vijukai</h4></li>
                        <li><a href="http://www.spektas.lt/projects/en_vijuku">Builder</a></li>
                    </ul>
                </div>-->
                <div class="col-sm">
                    @include ('include.socialnet')
                </div>
            </div>
        </div>
    </div>
    <!--<div class="footer-bottom">
        <p class="text-center">Visit us   <a href="http://www.spektas.lt">www.spektas.lt</a></p>
    </div>-->
</footer>
@include ('include.script')
</body>
</body>
</html>

<div class="container-fluid bg-black-shade text-light">
    <div class="row mt-3">
        <div class="col-md-11 mx-auto">
            <div class="row d-flex justify-content-between mt-5">
                <div class="col-md-4">
                    <img src="{{ asset('images/greenKeyLogo.png') }}" alt="Green Key Logo" class="img-fluid">
                    <h5 class="fw-semibold fs-32 fs-sm-25">Take the First Step</h5>
                    <p class="fs-20 fs-sm-18">Let us help you turn your property into a powerful force for good.</p>
                </div>
                <div class="col-md-3">
                    <p class="fs-20 fw-semibold fs-sm-18">Quick Links</p>
                    <a href="{{route('Contact')}}" class="d-block text-light text-decoration-none fs-18 fs-sm-16">
                        Book a Free Consultation
                        <img src="{{ asset('images/rightArrowSm.png') }}" alt="small right arrow">
                    </a>
                    <a href="{{route('About')}}" class="text-light text-decoration-none fs-18 fs-sm-16">
                        Learn More About Us
                        <img src="{{ asset('images/rightArrowSm.png') }}" alt="small right arrow">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11 mx-auto">
            <hr>
        </div>
    </div>

    <div class="row text-center">
        <p class="fs-18 fs-sm-16">Copyright &copy; 2024 Green Key Housing. <span
                class="text-decoration-underline fw-medium">All Rights Reserved.</span></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="{{ asset('JS/ActiveLink.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="{{ asset('JS/swiper.js') }}"></script>
<script src="{{asset('JS/property-swiper.js')}}"></script>
</body>

</html>

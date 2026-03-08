<html lang="en" style="height: 100%;">
@include('layout.partials.summit-head')
<body>

<div>
    {{ $slot }}
</div>

<script>
    function carousel() {
        return {
            current: 0,
            timer: null,
            interval: 3000,

            slides: [{
                bg: '{{ asset('assets/media/images//assets/slider-1.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images//assets/slider-2.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images//assets/slider-3.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images//assets/slider-4.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images//assets/slider-5.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images//assets/slider-6.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images//assets/slider-7.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images//assets/slider-8.jpg') }}'
            }],

            start() {
                this.pause()
                this.timer = setInterval(() => this.next(), this.interval)
            },

            pause() {
                if (this.timer) {
                    clearInterval(this.timer)
                    this.timer = null
                }
            },

            next() {
                this.current =
                    this.current === this.slides.length - 1 ? 0 : this.current + 1
            },

            prev() {
                this.current =
                    this.current === 0 ? this.slides.length - 1 : this.current - 1
            },

            goTo(index) {
                this.current = index
            },
        }
    }
</script>

@stack('scripts')

</body>

</html>

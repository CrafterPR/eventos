<html lang="en" style="height: 100%;">
@include('layout.partials.summit-head')
<body>

<div>
    {{ $slot }}
</div>
</body>

</html>


<script>
    function carousel() {
        return {
            current: 0,
            timer: null,
            interval: 3000,

            slides: [{
                bg: './assets/slider-1.jpg'
            }, {
                bg: './assets/slider-2.jpg'
            }, {
                bg: './assets/slider-3.jpg'
            }, {
                bg: './assets/slider-4.jpg'
            }, {
                bg: './assets/slider-5.jpg'
            }, {
                bg: './assets/slider-6.jpg'
            }, {
                bg: './assets/slider-7.jpg'
            }, {
                bg: './assets/slider-8.jpg'
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

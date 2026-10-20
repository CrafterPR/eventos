<html lang="en" style="height: 100%;">
@include('layout.partials.summit-head')


<body {!! printHtmlClasses('body') !!} {!! printHtmlAttributes('body') !!}>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TLCWHS6H"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

<!-- End Google Tag Manager (noscript) -->
{{-- <div id="site-banner-popup" role="dialog" aria-modal="true" aria-label="Announcement banner"
     style="position: fixed; inset: 0; z-index: 9999; display: flex; align-items: center; justify-content: center; padding: 1rem; background: rgba(0, 0, 0, 0.75);">
    <div style="position: relative; max-width: min(960px, 92vw); max-height: 90vh;">
        <button id="site-banner-close" type="button" aria-label="Close banner"
                style="position: absolute; top: 0.75rem; right: 0.75rem; z-index: 1; padding: 0.5rem 1rem; border: 0; border-radius: 9999px; background: white; color: #172840; font-weight: 600; cursor: pointer;">
            Close
        </button>
        <img src="{{ asset('assets/media/images/banner.webp') }}" alt="Announcement banner"
             style="display: block; max-width: 100%; max-height: 85vh; object-fit: contain;">
    </div>
</div> --}}
<script>
    (function () {
        const bannerPopup = document.getElementById('site-banner-popup');
        document.getElementById('site-banner-close').addEventListener('click', function () {
            bannerPopup.hidden = true;
            bannerPopup.style.display = 'none';
        });
    })();
</script>
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
                bg: '{{ asset('assets/media/images/assets/slider-1.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images/assets/slider-2.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images/assets/slider-3.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images/assets/slider-4.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images/assets/slider-5.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images/assets/slider-6.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images/assets/slider-7.jpg') }}'
            }, {
                bg: '{{ asset('assets/media/images/assets/slider-8.jpg') }}'
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

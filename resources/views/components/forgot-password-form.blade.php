<section class="sign_in_form ">
    <div class="flex ">
        <img src="{{ asset('assets/media/images/logogreen.svg') }}" alt=" image here" class="position_logo mt-5 mb-5"/>

    </div>
    <h3 class="title_h3">Forgot Password </h3>
    <p class="caption-p">
        A link will be sent to your email to create a new password
    </p>


    <div>
        <div class="newsletter-wrap">
            <form action="javascript:void(0)" id="sign-up-form">
                @csrf
                <div class="custom-input">
                    <input type="email" name="email" id="email" class="input_color focus:outline-none"
                           placeholder="Your Email">
                    <label for="email">
                        Your Email *
                    </label>
                </div>


                <button class="btn">Request Password Link</button>

            </form>
        </div>
    </div>
</section>
</div>


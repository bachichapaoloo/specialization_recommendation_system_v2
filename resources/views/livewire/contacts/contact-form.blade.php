<div>
    <!-- CONTACT -->
    <section class="bg-custom-img">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 login-section border-light m-5 px-5 @if (!$formSubmitted) hidden @endif">
                    <div class="login-form">
                        <h2 class="text-light text-center text-md-start my-4 get fs-3">Get in touch with Admin</h2>
                        <div class="container">
                            <form wire:submit.prevent="submit">
                                <div class="mb-3">
                                    <label for="name" class="form-label text-light">Your name</label>
                                    <input type="text" class="form-control" id="name" wire:model="name" required>
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label text-light">Your email</label>
                                    <input type="email" class="form-control" id="email" wire:model="email" required>
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label text-light">How can we help?</label>
                                    <textarea class="form-control" id="message" rows="3" wire:model="message"
                                        required></textarea>
                                    @error('message') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="d-flex justify-content-center align-items-center mt-4 mb-4">
                                    <button type="submit" name="submit" class="btn btn-success py-3 px-5 text-white">Send
                                        my message</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="col-md-3 py-4">
                    <img src="../img/contactimg.png" alt="" height="600px" width="600px"
                        class="image-fluid cimg d-none d-lg-block @if (!$formSubmitted) hidden2 @endif">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact cards -->
    <section class="my-5">
        <div class="container @if (!$formSubmitted) hidden @endif">
            <h5 class="c-heading py-5">Get in touch anytime</h5>
            <div class="row">
                <div class="col-md-3">
                    <div class="card" id="fc">
                        <div class="card-body">
                            <h5 class="card-title" id="cont">Email</h5>
                            <p class="card-text" id="cp"><i class="bi bi-envelope clogo"></i> youremail@emial.com
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" id="fc">
                        <div class="card-body">
                            <h5 class="card-title" id="cont"> Phone</h5>
                            <p class="card-text" id="cp"><i class="bi bi-telephone clogo"> </i> +1 (123)
                                456-78990
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" id="fc">
                        <div class="card-body">
                            <h5 class="card-title" id="cont">Fax</h5>
                            <p class="card-text" id="cp"><i class="bi bi-file-earmark clogo"> </i> (123)
                                456-78990
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" id="fc">
                        <div class="card-body">
                            <h5 class="card-title" id="cont">Address</h5>
                            <p class="card-text" id="cp"><i class="bi bi-geo-alt clogo"></i> PH</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script>

    </script>
@endpush

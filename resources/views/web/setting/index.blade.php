<x-front-layout title="Settings">
<!-- MainContent -->
    <section class="m-profile setting-wrapper">
        <div class="container">
            <h4 class="main-title mb-4">Account Setting</h4>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <div class="sign-user_card text-center">
                        <img src="{{ asset('storage') . '/' . $user->image }}" width="150" class="rounded-circle img-fluid d-block mx-auto mb-3" alt="user" loading="lazy" style="height: 150px;">
                        <h4 class="mb-3">
                            {{ $user->name }}
                        </h4>
                        <a href="#" class="edit-icon text-primary">Edit</a>
                    </div>
                </div>
                <div class="col-lg-8" id="formData">
                    @include('web.setting.form_data')
                </div>
            </div>
        </div>
    </section>

    @section('js')
        <script>
            $(document).on('click', '.ChangeEmailBtn', function(e) {
                e.preventDefault();

                $(this).addClass('d-none');
                $('.UpdateEmailBtn').removeClass('d-none');
                $('.CancelEmailBtn').removeClass('d-none');
                $('.emailInput').removeClass('d-none');
                $('.emailData').addClass('d-none');
            });

            $(document).on('click', '.CancelEmailBtn', function(e) {
                e.preventDefault();

                $(this).addClass('d-none');
                $('.UpdateEmailBtn').addClass('d-none');
                $('.emailInput').addClass('d-none');
                $('.emailData').removeClass('d-none');
                $('.ChangeEmailBtn').removeClass('d-none');

            });

            $(document).on('click', '.UpdateEmailBtn', function(e) {
                e.preventDefault();

                var email = $('#emailValue').val();

                $.ajax({
                    url: "{{ route('setting.update') }}",
                    type: "GET",
                    data: {
                        email: email,
                    },
                    success: function(data) {
                        $.ajax({
                            url: "{{ route('setting.index') }}",
                            type: "GET",
                        }).done(function(data) {
                            $('#formData').html(data);
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });
            })


            $(document).on('click', '.ChangePasswordBtn', function(e) {
                e.preventDefault();

                $(this).addClass('d-none');
                $('.UpdatePasswordBtn').removeClass('d-none');
                $('.CancelPasswordBtn').removeClass('d-none');
                $('.passwordInput').removeClass('d-none');
                $('.passwordData').addClass('d-none');
            });

            $(document).on('click', '.CancelPasswordBtn', function(e) {
                e.preventDefault();

                $(this).addClass('d-none');
                $('.UpdatePasswordBtn').addClass('d-none');
                $('.passwordInput').addClass('d-none');
                $('.passwordData').removeClass('d-none');
                $('.ChangePasswordBtn').removeClass('d-none');

            });

            $(document).on('click', '.UpdatePasswordBtn', function(e) {
                e.preventDefault();

                var password = $('#passwordValue').val();

                $.ajax({
                    url: "{{ route('setting.update') }}",
                    type: "GET",
                    data: {
                        password: password,
                    },
                    success: function(data) {
                        $.ajax({
                            url: "{{ route('setting.index') }}",
                            type: "GET",
                        }).done(function(data) {
                            $('#formData').html(data);
                        });
                    },
                    error: function(data) {
                        console.log(data);
                    },
                });
            })
        </script>

        <script>
            $(document).on('click', '.showLogoutForm', function(e) {
                e.preventDefault();

                $('#logoutForm').removeClass('d-none');
            });

            $(document).on('click', '.hideLogoutForm', function(e) {
                e.preventDefault();

                $('#logoutForm').addClass('d-none');
            })
        </script>
    @endsection
</x-front-layout>

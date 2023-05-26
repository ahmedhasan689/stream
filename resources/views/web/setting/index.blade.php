<x-front-layout title="Settings">

    @section('css')
        <style>
            .submitBtn, .modalSubmit{
                background-color: #e50914;
                border: none;
            }

            .submitBtn:hover, .modalSubmit:hover{
                background-color: #bf000a;
                color:white;
            }
            .modalSubmit {
                color: white;
            }
            .buttons {
                display: flex;
                justify-content: end;
                gap: 8px;
            }
        </style>
    @endsection
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
                        <a href="#" class="edit-icon text-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</a>
                    </div>
                </div>
                <div class="col-lg-8" id="formData">
                    @include('web.setting.form_data')
                </div>
            </div>
        </div>
    </section>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" style="background-color: #141414">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('GET')
                            <div class="mb-3">
                                <label for="formFileMultiple" class="form-label">Upload Avatar</label>
                                <input class="form-control" type="file" name="avatar" id="formFileMultiple" multiple>
                            </div>

                            <div class="mt-3 buttons">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary modalSubmit">Save changes</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

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

            // Show Date Input
            $(document).on('click', '.ChangeDateBtn', function(e) {
                e.preventDefault();

                $(this).addClass('d-none');
                $('.UpdateDateBtn').removeClass('d-none'); // Update
                $('.CancelDateBtn').removeClass('d-none'); // Cancel
                $('.dateInput').removeClass('d-none'); // Date Input
                $('.dateData').addClass('d-none'); // Data
            });

            // Cancel Btn For Date
            $(document).on('click', '.CancelDateBtn', function(e) {
                e.preventDefault();

                $(this).addClass('d-none'); // Cancel BTN
                $('.UpdateDateBtn').addClass('d-none'); // Update BTN
                $('.dateInput').addClass('d-none'); //
                $('.dateData').removeClass('d-none');
                $('.ChangeDateBtn').removeClass('d-none');

            });

            // Update BTN For Date
            $(document).on('click', '.UpdateDateBtn', function(e) {
                e.preventDefault();

                var date = $('#dateValue').val();

                $.ajax({
                    url: "{{ route('setting.update') }}",
                    type: "GET",
                    data: {
                        date: date,
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

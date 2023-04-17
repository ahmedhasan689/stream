<x-front-layout title="Account">
    @section('css')
        <style>
            label {
                margin-left: 10px !important;
            }

            input, select {
                border-radius: 20px !important;
            }
        </style>
    @endsection

    <section class="m-profile manage-p">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-lg-10">
                    <div class="sign-user_card" style="border-radius: 15px">
                        <form action="{{ route('account.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-lg-2">
                                    <div class="upload_profile d-inline-block">
                                        <img src="{{ $user->avatar }}" class="profile-pic rounded-circle img-fluid" alt="user" style="width: 100px; height: 100px">
                                        <div class="p-image">
                                            <i class="ri-pencil-line upload-button"></i>
                                            <input class="file-upload" name="image" type="file" accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-10 device-margin">
                                    <div class="profile-from">
                                        <h4 class="mb-3">Manage Profile</h4>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control mb-0" id="exampleInputl2"
                                                   placeholder="Enter Your Name" value="{{ $user->name }}" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="text" name="email" class="form-control mb-0" id="exampleInputl2"
                                                   placeholder="Enter Your Email" value="{{ $user->email }}" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="date" name="date_of_birth" value="{{ $user->date_of_birth }}" class="form-control date-input basicFlatpickr mb-0 dateInput" placeholder="Select Date">
                                        </div>
                                        <div class="form-group d-flex flex-md-row flex-column">
                                            <div class="iq-custom-select d-inline-block manage-gen">
                                                <select name="gender" class="form-control pro-dropdown">
                                                    <option value="female" @if( $user->gender == 'female' ) selected @endif>Female</option>
                                                    <option value="male" @if( $user->gender == 'male' ) selected @endif>Male</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <button type="submit" class="btn btn-hover">Save</button>
                                            <button href="#" class="btn btn-link">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @section('js')
        <script>
            $(document).ready(function(e) {
                let now = new Date();

                let date = now.toISOString().substring(0,10);

                $('.dateInput').attr('max', date);
            });
        </script>
    @endsection
</x-front-layout>

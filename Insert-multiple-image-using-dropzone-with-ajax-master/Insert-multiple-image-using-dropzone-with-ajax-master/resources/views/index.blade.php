@extends('layouts.master')

@section('content')
<div class="container">
    <form class="form-signin text-center" id="user_save_profile_form" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="photo-row">
            <div class="photo-img" id="image_user"
                style="background-image:url('{{ asset('public/assets/images/default.png') }}');">
            </div>
            <div class="profile-content">
                <div>
                    <label class="change-photo" for="profile_pic">Change Photo</label>
                    <input onchange="doAfterSelectImage(this)" type="file" style="display: none;" id="profile_pic"
                        name="picture" />
                </div>
            </div>


        </div>
    </form>
</div>
@endsection


@section('javascript')


<script>
    
    function doAfterSelectImage(input) {
        readURL(input);
        uploadUserProfileImage();
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image_user').css('background-image', 'url(' + e.target.result + ')');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }


    function uploadUserProfileImage() {
        let myForm = document.getElementById('user_save_profile_form');
        let formData = new FormData(myForm);
        $.ajax({
            type: 'POST',
            data: formData,
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            url: '{{route('save.profile.picture')}}',
            success: function (response) {
                if (response == 200) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'green');
                    $('#notifDiv').text('Profile Saved Successfully.');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);

                } else if (response == 700) {
                    $('#notifDiv').fadeIn();
                    $('#notifDiv').css('background', 'red');
                    $('#notifDiv').text('An error occured. Please try later');
                    setTimeout(() => {
                        $('#notifDiv').fadeOut();
                    }, 3000);
                }
            }.bind($(this))
        });
    }

</script>

@endsection

<meta name="csrf-token" content="{{ csrf_token() }}">
@extends('admin.layouts.main')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css" integrity="sha512-zoIoZAaHj0iHEOwZZeQnGqpU8Ph4ki9ptyHZFPe+BmILwqAksvwm27hR9dYH4WXjYY/4/mz8YDBCgVqzc2+BJA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
.dz-image img {
    width: 100%;
    height: 100%;
}
.dropzone.dz-started .dz-message {
 display: block !important;

}
.dropzone {
 border: 2px dashed #028AF4 !important;
}
.dropzone .dz-preview.dz-complete .dz-success-mark {
    opacity: 1;
}
.dropzone .dz-preview.dz-error .dz-success-mark {
    opacity: 0;
}
.dropzone .dz-preview .dz-error-message{
 top: 144px;
}
</style>
@section('content')
<div class="content-wrapper">
    <div class="row">
<div class="col-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Activity Images</h4>
        <form method="POST" action="{{route('admin.activity-images')}}"
        enctype="multipart/form-data"  class="dropzone" id="dropzone">
        <input type="hidden" value="{{ $activity->id }}" name="activity_id">
        @csrf
               <div class="dz-default dz-message"><h4>Drop Files here or click to upload</h4></div>

    </form>
      </div>
    </div>
  </div>
    </div>
</div>
@endsection
@include('admin.layouts.components.scripts')
<script src="{{asset('admin/plugins/validation/validate.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js" integrity="sha512-FvCXvGf01gAQqjiIR/q/9U6iGZGxeYujeh08ZhF8GYwWLuXT92pdcpCF6Q5uvcpzbbqjvOZEsb/n6ynodC8G/Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
Dropzone.options.dropzone =
         {
     maxFiles: 25,
            maxFilesize: 9,
            //~ renameFile: function(file) {
                //~ var dt = new Date();
                //~ var time = dt.getTime();
               //~ return time+"-"+file.name;    // to rename file name but i didn't use it. i renamed file with php in controller.
            //~ },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            init:function() {

    // Get images
    var myDropzone = this;
    $.ajax({
     url: '{{route('admin.activity-getimages',$activity->id)}}',
     headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
     dataType: 'json',
     success: function(data){
     //console.log(data);
     $.each(data, function (key, value) {

      var file = {name: value.name, size: value.size};
      myDropzone.options.addedfile.call(myDropzone, file);
      myDropzone.options.thumbnail.call(myDropzone, file, value.path);
      myDropzone.emit("complete", file);
     });
     }
    });
   },
            removedfile: function(file)
            {
    if (this.options.dictRemoveFile) {
      return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
     if(file.previewElement.id != ""){
      var name = file.previewElement.id;
     }else{
      var name = file.name;
     }
     //console.log(name);
     $.ajax({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
      type: 'POST',
      url: '{{route('admin.activity-deleteimages',$activity->id)}}',
      data: {filename: name},
      success: function (data){
       alert(data.success +" File has been successfully removed!");
      },
      error: function(e) {
       console.log(e);
      }});
      var fileRef;
      return (fileRef = file.previewElement) != null ?
      fileRef.parentNode.removeChild(file.previewElement) : void 0;
       });
       }
            },

            success: function(file, response)
            {
    file.previewElement.id = response.success;
    //console.log(file);
    // set new images names in dropzone’s preview box.
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
    file.previewElement.querySelector("img").alt = response.success;
    olddatadzname.innerHTML = response.success;
            },
            error: function(file, response)
            {
               if($.type(response) === "string")
     var message = response; //dropzone sends it's own error messages in string
    else
     var message = response.message;
    file.previewElement.classList.add("dz-error");
    _ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
    _results = [];
    for (_i = 0, _len = _ref.length; _i < _len; _i++) {
     node = _ref[_i];
     _results.push(node.textContent = message);
    }
    return _results;
            }

};
</script>


<script src="{{ URL::asset('js/dropzone.js')}}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/dropzone.css')}}">

<div class="row">
    <?php $files = File::allFiles('img/dashboard');?>
    @foreach ($files as $file_index => $file)
    <div class="col-sm-4" id="dz-preview{{$file_index}}">
            <form action="/image-upload/{{$file_index}}" class="dropzone" id="image-uploader-{{$file_index}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <!-- <img src="{{$file}}" width="200" height="200" alt="failed" style="object-fit: contain;"> -->
              <div class="fallback">
                <input name="file" type="file"/>
                <input name="fallback" type="hidden" value="isFallback"/>
                <input type="submit" value="Cargar"/>
              </div>
            </form>
    </div>

    <script>
    Dropzone.options.imageUploader{{$file_index}} = {
      paramName: "file", // The name that will be used to transfer the file
      maxFilesize: 2, // MB
      uploadMultiple: false,
      parallelUploads: 1,
      maxFiles: 1,
      acceptedFiles: "image/*",
      addRemoveLinks: false,
      renameFilename: "file",

      dictDefaultMessage: "Arrastrar una imagen para la posición {{$file_index+1}}",
      dictFallbackMessage: "Lo sentimos, tu navegador no soporta arrastrar archivos para cargarlos. Subir imagen {{$file_index+1}}",
      dictInvalidFileType: "Error: Debes cargar una imagen",
      dictFileTooBig: "Error: El archivo es muy grande",
      dictCancelUpload: "Cancelar carga",
      dictRemoveFile: "Quitar archivo",
      dictMaxFilesExceeded: "Error: No puedes subir más archivos",
      init: function(){
        var thisdropzone = this;
        var mockFile = { name: "Arrastra imagen para reemplazarla", size: 12345 };
        thisdropzone.emit("addedfile", mockFile);
        thisdropzone.emit("thumbnail", mockFile, "{{url('/img/dashboard-thumb/thumb'.$file_index.'.'.$file->getExtension())}}");
        thisdropzone.emit("complete", mockFile);
        var existingFileCount = 0; // The number of files already uploaded
        thisdropzone.options.maxFiles = thisdropzone.options.maxFiles - existingFileCount;
      },
      accept: function(file, done) {
        done();
        swal({
            title: "Listo",
            text: "Imagen actualizada",
            type: "success",
            showConfirmButton: true
        });
      }
    };
    </script>
    @endforeach
</div><!--.row-->

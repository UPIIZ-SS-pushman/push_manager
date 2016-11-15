<script src="js/dropzone.js"></script>
<link rel="stylesheet" href="css/dropzone.css">

<div class="row">
    <?php $files = File::allFiles("img/dashboard");?>
    @foreach ($files as $file_index => $file)
    <div class="col-sm-6">
            <!-- <div class="row">
              <div class="col-sm-6" >

              </div>
            </div> -->
            <form action="/image-upload/{{$file_index}}" class="dropzone" id="image-uploader-{{$file_index}}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="fallback">
                <input name="file" type="file"/>
                <input name="fallback" type="hidden" value="isFallback"/>
                <input type="submit" value="Cargar"/>
              </div>
            </form>
    </div><!--.col-->

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

      accept: function(file, done) {
        done();
      }
    };


    </script>
    @endforeach
</div><!--.row-->

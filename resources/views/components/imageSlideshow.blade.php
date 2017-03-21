<div id="div-gallery" class="w3-content" style="height:100%;">

    <?php $files = File::allFiles("img/dashboard");?>
    @foreach ($files as $file)
      <?php
        $filename = pathinfo($file);
        $validImg = $filename['extension'] == "jpg" || $filename['extension'] == "png";
      ?>
      @if($validImg)
      <img class="dashboard-gallery" src="{{$file}}" style='height: 100%; width: 100%; object-fit: contain'/>
      @endif
    @endforeach

  <a class="w3-btn-floating" style="position:absolute;top:45%;left:0" onclick="plusDivs(-1)">&#10094;</a>
  <a class="w3-btn-floating" style="position:absolute;top:45%;right:0" onclick="plusDivs(+1)">&#10095;</a>
</div>
<script>
var slideIndex = 1;
showDivs(slideIndex);
carousel();

function plusDivs(n) {
    showDivs(slideIndex += n);
}

function showDivs(n) {
    var i;
    var x = document.getElementsByClassName("dashboard-gallery");
    if (n > x.length) {slideIndex = 1}
    if (n < 1) {slideIndex = x.length} ;
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideIndex-1].style.display = "block";
}

function carousel() {
    var i;
    var x = document.getElementsByClassName("dashboard-gallery");
    for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > x.length) {slideIndex = 1}
    x[slideIndex-1].style.display = "block";
    setTimeout(carousel, 4000); // Change image every 2 seconds
}
</script>

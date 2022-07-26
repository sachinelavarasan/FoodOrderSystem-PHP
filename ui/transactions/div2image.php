<!DOCTYPE html> 
<html> 
  
<head> 
    <title> 
        How to convert an HTML element 
        or document into image ? 
    </title> 
    1
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"

	        integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT"

	        crossorigin="anonymous">

	</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js" integrity="sha512-jzL0FvPiDtXef2o2XZJWgaEpVAihqquZT/tT89qCVaxVuHwJ/1DFcJ+8TBMXplSJXE8gLbVAUv+Lj20qHpGx+A==" crossorigin="anonymous"></script>

	<script src="canvas2image.js"></script>
</head> 
  
<body> 
    <center> 
    <h2 class="toCanvas">
	  To Canvas

	</h2>
    <h2 class="toPic">

	  To Image

	</h2>
      
    <h2 style="color:purple"> 
        Convert div to image 
    </h2> 
      
    <div id="html-content-holder" style="background-color: #F0F0F1;  
                color: #00cc65; width: 500px;padding-left: 25px;  
                padding-top: 10px;"> 
        <label for="imgW">Image Width:</label>

	<input type="number" value="" id="imgW" placeholder="Image Width" />

	<label for="imgH">Image Height:</label>

	<input type="number" value="" id="imgH" placeholder="Image Height" />

	<label for="imgFileName">File Name:</label>

	<input type="text" placeholder="File Name" id="imgFileName" />

	<select id="sel">

	  <option value="png">png</option>

	  <option value="jpeg">jpeg</option>

	  <option value="bmp">bmp</option>

	</select>

	<button id="save">Save And Download</button>
    </div> 
  
    <input id="btn-Preview-Image" type="button"
                value="Preview" />  
          
    <a id="btn-Convert-Html2Image" href="#"> 
        Download 
    </a> 
  
    <br/> 
      
    <h3>Preview :</h3> 
      
    <div id="previewImage"></div> 
      
    <script> 
        // to canvas
$('.toCanvas').click(function(e) {
  html2canvas(test).then(function(canvas) {
    // canvas width
    var canvasWidth = canvas.width;
    // canvas height
    var canvasHeight = canvas.height;
    // render canvas
    $('.toCanvas').after(canvas);
    // show 'to image' button
    $('.toPic').show(1000);
    // convert canvas to image
    $('.toPic').click(function(e) {
      var img = Canvas2Image.convertToImage(canvas, canvasWidth, canvasHeight);
      // render image
      $(".toPic").after(img);
      // save
      $('#save').click(function(e) {
        let type = $('#sel').val(); // image type
        let w = $('#imgW').val(); // image width
        let h = $('#imgH').val(); // image height
        let f = $('#imgFileName').val(); // file name
        w = (w === '') ? canvasWidth : w; 
        h = (h === '') ? canvasHeight : h;
        // save as image
        Canvas2Image.saveAsImage(canvas, w, h, type, f);
      });
    });
  });
});

    </script> 
    </center> 
</body> 
  
</html> 
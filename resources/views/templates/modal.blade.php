<div id="myModal" class="modal">
    <span class="close" id="close" onclick="modalClose()">&times;</span>
    <img class="modal-content" id="img">
    <div id="caption"></div>
</div>

<script>
    function modalImage (id) {
        var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById('myImg'+id);
        var modalImg = document.getElementById("img");
        var captionText = document.getElementById("caption");
        modal.style.display = "block";
        modalImg.src = img.src;
        captionText.innerHTML = img.alt;
        var nav = document.getElementById('nav');
        nav.style.display = 'none';
    }
</script>

<script>
    function modalClose () {
        // Get the <span> element that closes the modal
        var x = document.getElementById("close");
        var modal = document.getElementById('myModal');
        modal.style.display = "none";
        var nav = document.getElementById('nav');
        nav.style.display = 'block';
    }
</script>
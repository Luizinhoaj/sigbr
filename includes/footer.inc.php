<script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
        <script src="js/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/script.js"></script>    
    </body>
</html>
<script>

<script>
    /* UPLOAD DE IMAGENS SRC */

    $(document).ready(function(){

    var readUrl = function(input){
    if(input.files && input.files[0]){
        
        var reader = new FileReader();
        
        reader.readAsDataURL(input.files[0]);
        
        reader.onload = function(e){
        $(".avatar").attr('src', e.target.result);
        }
    }
    }

    $(".file-upload").on('change',function(){
        readUrl(this);
    });

});

    function escolherArquivo(){
        // vamos obter uma referência ao elemento file
        var arquivo = document.getElementById("arquivo");
        // vamos disparar seu evento onclick()
        arquivo.click();  
    }
</script>


$(document).ready(function(){

    

    function loadData(){
        var tid = $("#tid").val();
        $.ajax({
            url: '../inc//commentpage.inc.getcomments.php',
            type: 'POST',
            data: {tid: tid},
            success: function(data){
                $("#comment-container").html(data);
            }
        });
    }

    loadData();

    $("#commentSubmit").on("click", function(e){
        
        e.preventDefault();
        var tid = $("#tid").val();
        var uid = $("#uid").val();
        var date = $("#date").val();
        var comment = $("#comment").val();
        var  errorMessage = $('#errorMessage');
        
        if(comment== '' || comment == null){
            $('#comment-form-control').removeClass('comment-form-control').addClass('form-control error');
            
        }else{
            $.ajax({
                url: '../inc/commentpage.inc.setcomments.php',
                type: 'POST',
                data: {tid: tid, uid: uid, date: date, comment: comment},
                success: function(data){
                    if (data == 1) {
                        loadData();
                        $("#commentForm").trigger("reset");

                    }else {
                        alert("failure");
                        //setErrorFor(comment, 'Comment cannot be blank');
                        //alert("Failure");
                    }
                }
            });
        }
        
        
    });
});


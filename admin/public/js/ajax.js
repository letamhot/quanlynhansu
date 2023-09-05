$(document).ready(function(){
    // Xử lý duyệt đơn
    $('#duyetdon').click(function() {
    //    alert($(this).parent().parent().find('td').first().text());
        $.ajax({
            url: 'process/processDuyetDon&HuyDon.php',
            method: 'post',
            dataType: 'html',
            data: {
                status: '1',
                id: $(this).parent().parent().find('td').first().text()
            },
            success: function(data) {
                $('.alerts').html('<div class="alert alert-primary alert-dismissible fade show" role="alert">'
                                    + data 
                                    + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                                    + '</div>');
                 location.reload();
            }
        })
    });

    // Xử lý huỷ đơn
    $('#huydon').click(function() {
        //    alert($(this).parent().parent().find('td').first().text());
            $.ajax({
                url: 'process/processDuyetDon&HuyDon.php',
                method: 'post',
                dataType: 'html',
                data: {
                    status: '2',
                    id: $(this).parent().parent().find('td').first().text()
                },
                success: function(data) {
                    $('.alerts').html('<div class="alert alert-primary alert-dismissible fade show" role="alert">'
                                        + data 
                                        + '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'
                                        + '</div>');
                    location.reload();
                }
            })
        });
});
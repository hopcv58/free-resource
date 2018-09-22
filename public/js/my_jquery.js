var resource = {
    data: {
        listEmployeeAvaiable: {},
        newsNumber: 0
    },
    extend: function (object) {
        $.extend(resource.data.listEmployeeAvaiable, object);
        console.log(resource.data.listEmployeeAvaiable);
    },
    showDetail: function(id) {
        $('#more-detail-employee-' + id).collapse('show')
        var htmlBtnHide = "<a class=\"link-expan-detail\" id=\"link-expan-detail-\"+ id + \"\" onclick=\"resource.hideDetail("+ id + ")\">Hide detail...</a>";
        $('#box-link-expan-detail-' + id).html(htmlBtnHide);
        console.log('id');
    },
    hideDetail: function(id) {
        $('#more-detail-employee-' + id).collapse('hide')
        var htmlShow = "<a class=\"link-expan-detail\" id=\"link-expan-detail-\"+ id + \"\" data-toggle=\"collapse\" data-target=\"#more-detail-employee-\"+ id + \"\" onclick=\"resource.showDetail("+ id +")\">View more detail...</a>";
        $('#box-link-expan-detail-' + id).html(htmlShow);
    },
    showChatBox: function(companyId) {
        $('.chat-box').css('display', 'block');
    },
    hideChatBox: function() {
        $('.chat-box').css('display', 'none');
    },
    confirmHired: function(employId) {
        // Hợp lắp action update status vào đây
        var actionPost = window.location.origin + "/employee/" + employId;
        $("#form-confirm-hire").attr('action', actionPost);
        $('#confirmHired').modal('show');
    },
    changeHiredEmployee: function(e) {

    }
};
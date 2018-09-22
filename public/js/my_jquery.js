var resource = {
    data: {
        listEmployeeAvailable: {},
        newsNumber: 0,
    },
    extend: function (object) {
        $.extend(resource.data.listEmployeeAvailable, object);
    },
    showDetail: function(id) {
        $('#more-detail-employee-' + id).collapse('show')
        var htmlBtnHide = "<a class=\"link-expan-detail\" id=\"link-expan-detail-\"+ id + \"\" onclick=\"resource.hideDetail("+ id + ")\">Hide detail...</a>";
        $('#box-link-expan-detail-' + id).html(htmlBtnHide);
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
    confirmHired: function (employId) {
        $('#id-employess-hired').attr('value', employId);
        $('#confirmHired').modal('show');
        $('#confirm-hired-btn').attr('onclick', 'resource.confirmHireSubmit()');
    },
    searchEmployByName: function () {
        var keySearch = $('#search-name').val().toLowerCase();
        var result = [];
        var arr = Object.values(resource.data.listEmployeeAvailable);
        var html = '';
        var number = 0;
        $.each(arr, function( key, element ) {
            var name = element.name.toLowerCase();
            if(name.indexOf(keySearch) != -1) {
                result.push(element);
                var exp = element['experience']['exp_num'] + ' ' + element['experience']['exp_unit'];
                var price = element['price']['price_num'] + '$/' + element['price']['price_unit'];
                var url = window.location.origin + "/employee/"+ element.id +"/edit?status=" + element.status;

                if(element.status == 0 || element.status == 1) {
                    number++;
                    html += "<tr>\n" +
                        "                            <th scope=\"row\">"+ number +"</th>\n" +
                        "                            <td>" + element.name + "</td>\n" +
                        "                            <td>" + element.position + "</td>\n" +
                        "                            <td>"+ element.level +"</td>\n" +
                        "                            <td> " + exp +"</td>\n" +
                        "                            <td>" + element.skill + "</td>\n" +
                        "                            <td>" + element.free_begin + "</td>\n" +
                        "                            <td>" + element.free_end + "</td>\n" +
                        "                            <td>"+ price + "</td>\n" +
                        "                            <td>\n" +
                        "                                <a href=\"" + url +"\"><span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></a>\n" +
                        "                                <a><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a>\n" +
                        "                            </td>\n" +
                        "                        </tr>";
                }else if (element.status == 2)
                {
                    number++;
                    html += "<tr>\n" +
                        "                            <th scope=\"row\">"+ number +"</th>\n" +
                        "                            <td>" + element.name + "</td>\n" +
                        "                            <td>" + element.position + "</td>\n" +
                        "                            <td>"+ element.level +"</td>\n" +
                        "                            <td> " + exp +"</td>\n" +
                        "                            <td>" + element.skill + "</td>\n" +
                        "                            <td>" + element.free_begin + "</td>\n" +
                        "                            <td>" + element.free_end + "</td>\n" +
                        "                            <td>"+ price + "</td>\n" +
                        "                            <td>\n" +
                        "                                    <a class=\"btn-approve\" onclick=\"resource.callTriggerApproveHire("+element.id +")\">Approve</a>\n" +
                        "                            </td>\n" +

                        "                        </tr>";
                } else {
                    number++;
                    html += "<tr>\n" +
                        "                            <th scope=\"row\">"+ number +"</th>\n" +
                        "                            <td>" + element.name + "</td>\n" +
                        "                            <td>" + element.position + "</td>\n" +
                        "                            <td>"+ element.level +"</td>\n" +
                        "                            <td> " + exp +"</td>\n" +
                        "                            <td>" + element.skill + "</td>\n" +
                        "                            <td>" + element.free_begin + "</td>\n" +
                        "                            <td>" + element.free_end + "</td>\n" +
                        "                            <td>"+ price + "</td>\n" +
                        "                            <td>\n" +
                        "                            </td>\n" +
                        "                        </tr>";
                }

            }
        });
        $('#result-search').html(html);
    },
    searchEmployByTitle: function () {
        var keySearch = $('#search-name').val().toLowerCase();
        var result = [];
        var arr = Object.values(resource.data.listEmployeeAvailable);
        var html = '';
        var number = 0;
        $.each(arr, function( key, element ) {
            var title = element.title.toLowerCase();
            if (title.indexOf(keySearch) != -1) {
                result.push(element);
                var exp = element['experience']['exp_num'] + ' ' + element['experience']['exp_unit'];
                var price = element['price']['price_num'] + '$/' + element['price']['price_unit'];
                var url = window.location.origin + "/employee/" + element.id + "/edit?status=" + element.status;

                if (element.status == 0) {
                    number++;
                    html += "<tr>\n" +
                        "                            <th scope=\"row\">" + number + "</th>\n" +
                        "                            <td>" + element.title + "</td>\n" +
                        "                            <td>" + element.position + "</td>\n" +
                        "                            <td>" + element.level + "</td>\n" +
                        "                            <td> " + exp + "</td>\n" +
                        "                            <td>" + element.free_begin + "</td>\n" +
                        "                            <td>" + element.free_end + "</td>\n" +
                        "                            <td>" + price + "</td>\n" +
                        "                            <td>\n" +
                        "                                <a href=\"" + url + "\"><span class=\"glyphicon glyphicon-edit\" aria-hidden=\"true\"></span></a>\n" +
                        "                                <a><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></a>\n" +
                        '                                <a href="#" onclick="resource.rendHintModal(' + element.id + ')"><span class="glyphicon glyphicon-expand" aria-hidden="true"></span></a>'
                        "                            </td>\n" +
                        "                        </tr>";
                } else if (element.status == 1) {
                    number++;
                    html += "<tr>\n" +
                        "                            <th scope=\"row\">" + number + "</th>\n" +
                        "                            <td>" + element.title + "</td>\n" +
                        "                            <td>" + element.position + "</td>\n" +
                        "                            <td>" + element.level + "</td>\n" +
                        "                            <td> " + exp + "</td>\n" +
                        "                            <td>" + element.free_begin + "</td>\n" +
                        "                            <td>" + element.free_end + "</td>\n" +
                        "                            <td>" + price + "</td>\n" +
                        "                            <td>\n" +
                        "                                    <a class=\"btn-approve\" onclick=\"resource.callTriggerApproveHire("+element.id +")\">Approve</a>\n" +
                        "                            </td>\n" +

                        "                        </tr>";
                } else {
                    number++;
                    html += "<tr>\n" +
                        "                            <th scope=\"row\">" + number + "</th>\n" +
                        "                            <td>" + element.title + "</td>\n" +
                        "                            <td>" + element.position + "</td>\n" +
                        "                            <td>" + element.level + "</td>\n" +
                        "                            <td> " + exp + "</td>\n" +
                        "                            <td>" + element.free_begin + "</td>\n" +
                        "                            <td>" + element.free_end + "</td>\n" +
                        "                            <td>" + price + "</td>\n" +
                        "                            <td>\n" +
                        "                            </td>\n" +
                        "                        </tr>";
                }
            }
        });
        $('#result-search').html(html);
    },
    rendHintModal: function (jobId) {
        $.ajax({
            method: 'GET',
            url: '/job/' + jobId + '/hint',
        }).done(function (res) {
            $("#hint-body").html(res);
        });
        $("#hint-modal").modal('show');
    },
    confirmHireSubmit: function () {
        $.ajax({
            method: 'POST',
            url: $("#form-confirm-hire").attr('action'),
            data: $("#form-confirm-hire").serialize()
        }).done(function (res) {
            if (res.meta.status = 200) {
                //     $("#employee" + employId).hide();
                // }
                // $('#confirmHired').modal('hide');
                location.reload()
            }
        });
    },
    confirmNegotiate: function(employee_id, company_id) {
        var conf = confirm("Are you sure to start negotiating with this employee?");
        if (conf) {
            $.ajax({
                method: 'POST',
                url: '/api/employee/update',
                data: {
                    id: employee_id,
                    company_id: company_id,
                    status: 2
                }
            }).done(function (res) {
                if (res.meta.status = 200) {
                    $("#btn_negotiate" + employee_id).attr('disabled', 'disabled').attr('onclick','');
                }
            });
        }
    },
    callTriggerApproveHire: function(idEmployee) {
        $('#id-employess-hired').attr('value', idEmployee);
        $('#confirmHired').modal('show');
    }
};